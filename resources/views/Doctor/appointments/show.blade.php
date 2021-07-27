@extends('layouts.app')
@section('title', 'Appointment')
@section('custom-js')
@endsection
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/preview.css') }}">
@endsection
@section('content')
    <div class="container" style="margin: 5vh 15vw">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center">Appointment #<i
                        style="color: gray">{{ $appointment->appointment_code }}</i></h1>
                @include('Doctor.appointments.book')
                <div class="row">
                    <div class="col-md-12" style="margin: 0 40%">
                        <a class="btn btn-primary"
                        href="{{ route('doctor.appointment.pdf', ['method' => 'download', 'appointment' => $appointment]) }}"
                        id="download">Download</a>
                    <a class="btn btn-primary"
                        href="{{ route('doctor.appointment.pdf', ['method' => 'stream', 'appointment' => $appointment]) }}"
                        id="stream">Stream</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
