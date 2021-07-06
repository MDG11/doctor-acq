@extends('layouts.app')
@section('title', 'Make an appointment')
@section('content')
    <div class="container" style="padding: 5vh 0;">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center;">Choose an Doctor Specialization</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('patient.appointment', ['specialization' => 'gynecology']) }}">Ginecologist</a></li>
                    <li class="list-group-item"><a href="{{ route('patient.appointment', ['specialization' => 'pediatrics']) }}">Pediatrics</a></li>
                    <li class="list-group-item"><a href="{{ route('patient.appointment', ['specialization' => 'pathology']) }}">Pathology</a></li>
                    <li class="list-group-item"><a href="{{ route('patient.appointment', ['specialization' => 'anesthesiology']) }}">Anesthesiology</a></li>
                    <li class="list-group-item"><a href="{{ route('patient.appointment', ['specialization' => 'ophthalmology']) }}">Ophthalmology</a></li>
                    <li class="list-group-item"><a href="{{ route('patient.appointment', ['specialization' => 'urology']) }}">Urology</a></li>
                    <li class="list-group-item"><a href="{{ route('patient.appointment', ['specialization' => 'surgery']) }}">Surgery</a></li>
                    <li class="list-group-item"><a href="{{ route('patient.appointment', ['specialization' => 'orthopedic-surgery']) }}">Orthopedic Surgery</a></li>
                    <li class="list-group-item"><a href="{{ route('patient.appointment', ['specialization' => 'plastic-surgery']) }}">Plastic Surgery</a></li>
                    <li class="list-group-item"><a href="{{ route('patient.appointment', ['specialization' => 'psychiatry']) }}">Psychiatry</a></li>
                    <li class="list-group-item"><a href="{{ route('patient.appointment', ['specialization' => 'neurology']) }}">Neurology</a></li>
                    <li class="list-group-item"><a href="{{ route('patient.appointment', ['specialization' => 'radiology']) }}">Radiology</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
