<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use App\Rules\WorkingTime;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class UserAppointmentController extends Controller
{
    public function index($specialization)
    {
        $specialization = str_replace('-', ' ', $specialization);
        $doctors = Doctor::where('specialization', $specialization)->get();
        return view('Patient.make_appointment', compact('doctors'));
    }
    public function submit(Request $request)
    {
        $request->validate([
            'doctor' => 'required|exists:doctors,id',
            'date' => 'required',
            'start_time' => ['required', new WorkingTime],
            'finish_time' => ['required', new WorkingTime],
            'comments' => 'string',
        ]);
        $start_time = strtotime($request->date . $request->start_time);
        $finish_time = strtotime($request->date . $request->finish_time);
        if ($finish_time - $start_time <= 1800) {
            throw ValidationException::withMessages(['finish_time' => 'Finish time must be after the start time (Minimal appointment time is 30 minutes)']);
        }
        foreach (Appointment::where('start_time','>', Carbon::today())->where('doctor_id', $request->doctor)->get() as $slot) {
            $another_meeting = ($start_time >= strtotime($slot->start_time) && $start_time <= strtotime($slot->finish_time)) ||
                (strtotime($slot->start_time) >= $start_time && strtotime($slot->start_time) <= $finish_time);
            if ($another_meeting) {
                throw ValidationException::withMessages(['date' => 'Time overlaps']);
            }
        }
        do {
            $appointment_code = bin2hex(random_bytes(12)) . count(Appointment::all());
        } while (Appointment::where("appointment_code", "=", $appointment_code)->first() != null);
        $appointment = new Appointment();
        $appointment->doctor_id = $request->doctor;
        $appointment->start_time = Carbon::parse($start_time);
        $appointment->finish_time = Carbon::parse($finish_time);
        $appointment->comments = $request->comments;
        $appointment->appointment_code = $appointment_code;
        $appointment->user_id = auth()->id();
        $appointment->save();
        return back()->with('success', 'Appointment created successfully!');
    }
}
