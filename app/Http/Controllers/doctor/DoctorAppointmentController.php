<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class DoctorAppointmentController extends Controller
{
    public function show(Request $request)
    {
        $appointment = Appointment::where('appointment_code', $request->appointment_code)->first();
        return view('Doctor.appointments.show', compact('appointment'));
    }

    public function make_pdf($method, Appointment $appointment)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('Doctor.appointments.book', compact('appointment'))->render());
        if ($method == 'download')
            return $pdf->download($appointment->appointment_code . '.pdf');
        elseif ($method == 'stream')
            return $pdf->stream();
    }

    public function today()
    {
        $doctor = auth()->user()->doctor;
        $appointments =
        Appointment::where(function ($query) {
            $query->where('start_time', '>', Carbon::today())
                ->where('start_time', '<', Carbon::tomorrow());
        })->orWhere(function ($query) {
            $query->where('finish_time', '>', Carbon::today())
                ->where('finish_time', '<', Carbon::tomorrow());
        })
        ->where('doctor_id',$doctor->id)
        ->get();
        return view('Doctor.appointments.today', compact('appointments'));
    }

    public function end(Appointment $appointment)
    {
        $appointment->delete();
        return redirect(URL::to('/doctor/appointments/today'));
    }
}
