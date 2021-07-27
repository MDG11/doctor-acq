@extends('layouts.app')
@section('title', 'Check appointment')
@section('content')
    <div class="container" style="padding: 5vh 0;">
        <div class="form col-md-6" style="margin: 0 15vw;">
            <h1 style="text-align: center; padding-bottom: 10px;">Check appointment</h1>
            <form action="{{ route('doctor.appointment.show') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="appointment_code" placeholder="Enter appointment code">
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit" style="margin-left: 45%;" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
@section('custom-css')
@endsection
@section('custom-js')
@endsection
