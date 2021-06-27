@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <div class="container" style="padding: 5vh 0;">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center;">Your Profile</h1>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{ route('doctor.submitprofile') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Specialization {{ ($doctor->specialization) ? '(Current: '.$doctor->specialization.')' : '(If you don`t choose your specialization, you`ll be hard to find for patients.)'}}</label>
                    <select name="specialization" class="form-control" id="exampleFormControlSelect1">
                        <option value="" selected>Select Specialization</option>
                        <option value="gynecology">Gynecology</option>
                        <option value="pediatrics">Pediatrics</option>
                        <option value="pathology">Pathology</option>
                        <option value="anesthesiology">Anesthesiology</option>
                        <option value="ophthalmology">Ophthalmology</option>
                        <option value="surgery">Surgery</option>
                        <option value="orthopedic surgery">Orthopedic surgery</option>
                        <option value="plastic surgery">Plastic surgery</option>
                        <option value="psychiatry">Psychiatry</option>
                        <option value="neurology">Neurology</option>
                        <option value="radiology">Radiology</option>
                        <option value="urology">Urology</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Photo</label>
                    <input type="file" onchange="previewFile(this);" name="photo" id="loadphoto" accept="image/*" class="form-control">
                    <img style="max-height: 100px; margin-top:10px" src="{{ ($doctor->photo) ? '/storage/uploads/DoctorPhoto/'.$doctor->photo : '' }}" id="previewImg">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="{{ ($doctor->description) ? $doctor->description : '' }}"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('custom-js')
    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
