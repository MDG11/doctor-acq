@extends('layouts.app')
@section('title', 'Active appointments')
@section('content')
    <div class="container">
        @if ($appointments->first())
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Patient Name</th>
                            <th>Patient Email</th>
                            <th>Check appointment</th>
                            <th>End(Cancel) appointment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->id }}</td>
                                <td>{{ $appointment->user->name }}</td>
                                <td>{{ $appointment->user->email }}</td>
                                <td>    
                                    <div class="row">
                                            <form action="{{ route('doctor.appointment.show') }}" method="POST">
                                                @csrf
                                                <input type="text" value="{{ $appointment->appointment_code }}"
                                                    name="appointment_code" hidden>
                                                <button class="btn btn-primary">Check appointment</button>
                                            </form>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-danger"
                                        href="{{ route('doctor.appointment.end', ['appointment' => $appointment]) }}">End(Cancel)
                                        Appointment</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <h1 style="text-align: center">No appointments for today</h1>
        @endif
    </div>
@endsection
