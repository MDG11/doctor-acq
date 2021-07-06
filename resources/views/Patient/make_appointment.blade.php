@extends('layouts.app')
@section('title', 'Make an appointment')
@section('content')
    <div class="container" style="padding: 5vh 0;">
        @if ($doctors->first())
            <div class="row">
                <div class="col-md-12">
                    <h1 style="text-align: center;">Make an appointment</h1>
                </div>
            </div>
            <div class="row">
                <div class="card-body">
                    <div class="row">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{ implode('', $errors->all(':message')) }}
                            </div>
                        @endif
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                    </div>
                </div>
                <form method="POST" action="{{ route('appointment.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="doctorPicker">Doctor</label>
                        <select required name="doctor" class="form-control" id="doctorPicker">
                            <option value="" selected>Select Specialist</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->user->name }}</option>
                            @endforeach
                        </select>
                        @error('doctor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message[0] }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <div class="row">
                            <div class="col-md-12">
                                <input name="date" min="{{ date("Y-m-d") }}" max="{{ date('Y-m-d', mktime(date("Y"),date("m")+1,date("d"))); }}" type="date" class="form-control" name="start_date" required>
                            </div>
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message[0] }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="date">Time</label>
                            <div class="row">
                                <div class="col-md-6">
                                    Start-Time
                                    <input type="time" id="start_time" name="start_time" min="08:00" max="18:00" required>
                                </div>
                                @error('start_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message[0] }}</strong>
                                    </span>
                                @enderror
                                <div class="col-md-6">
                                    End-Time
                                    <input type="time" id="finish_time" name="finish_time" min="08:00" max="18:00" required>
                                </div>
                                @error('finish_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comments">Comments (optional)</label><br>
                            <textarea name="comments" id="comments" cols="123" rows="5"></textarea>
                            @error('comments')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message[0] }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                </form>
            </div>
        @else
            <div class="row">
                <div class="col-md-6" style="margin: 0 15vw;">
                    <h1 style="text-align: center;">No doctors found</h1>
                    <a style="margin-left: 45%" class="btn btn-success" href="javascript:history.back()">Go back</a>
                </div>
            </div>
        @endif
    </div>
@endsection
