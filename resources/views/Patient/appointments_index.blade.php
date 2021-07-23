@extends('layouts.app')
@section('title', 'My Appointments')
@section('content')
    <div class="container" style="padding: 5vh 0;">
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Doctor Specialization</th>
                    <th scope="col">Specialist</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    @php
                        $date = explode(' ', $appointment->start_time)[0];
                        $start_time = explode(' ', $appointment->start_time)[1];
                        $finish_time = explode(' ', $appointment->finish_time)[1];
                    @endphp
                    <tr>
                        <th scope="row">{{ $appointment->id }}</th>
                        <td>{{ $appointment->doctor->specialization }}</td>
                        <td>{{ $appointment->doctor->user->name }}</td>
                        <td>{{ $date }}</td>
                        <td>{{ $start_time . ' - ' . $finish_time }}</td>
                        <td><a onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"
                                href="{{ route('patient.appointment.delete', ['id' => $appointment->id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $appointments->links() }}
        <a href="{{ route('patient.appointments.all') }}" class="btn btn-primary">Show expired appointments</a>
    </div>
@endsection
