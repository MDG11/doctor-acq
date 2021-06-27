<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorProfileController extends Controller
{
    public function index()
    {
        $doctor = Doctor::where('user_id', auth()->id())->first();
        return view('Doctor.profile', compact('doctor',));
    }
    public function submit(Request $request)
    {
        $input = $request->validate([
            'specialization' => '',
            'photo' => 'image',
            'description' => '',
        ]);
        if (isset($input['photo'])) {
            $imageName = Carbon::now()->timestamp . '.' . $input['photo']->extension();
            $input['photo']->storeAs('public/uploads/DoctorPhoto', $imageName);
            $input['photo'] = $imageName;
        }
        if (auth()->user()->doctor) {
            $input = array_filter($input);
            $doctor = auth()->user()->doctor;
            $doctor->update($input);
            return back()->with('success', 'Your profile was updated successfully!');
        } else {
            $doctor = new Doctor($input);
            $doctor->user_id = auth()->id();
            $doctor->doctor_code_id = DoctorCode::where('code', auth()->user()->doctor_code)->first()->id;
            $doctor->save();
            return back()->with('success', 'Your profile was created successfully!');
        }
    }
}
