<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Barryvdh\DomPDF\PDF as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        if($method == 'download')
        return $pdf->download('test.pdf');
        elseif($method == 'stream')
        return $pdf->stream();
    }
}
