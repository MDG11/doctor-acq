@extends('layouts.app')
@section('title', 'Main')
@section('custom-css')
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <style>
        .btn-heading {
            color: #fff;
            background-color: #b9212d;
            border-color: #b9212d;
        }
    </style>
@endsection
@section('custom-js')
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
@endsection
@section('content')
    <div class="content">
        <header class="masthead">
            <div class="backheader" >
                <div class="container" style="padding: 10vh 0px; background-color: white;">
                    <div class="masthead-subheading">Welcome To eHealth!</div>
                    <div class="masthead-heading text-uppercase">Log in to your account to get an appointment</div>
                    <a class="btn btn-heading btn-xl text-uppercase" href="#services">Tell Me More</a>
                </div>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">How to get appointment</h2>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i style="color:#b9212d;" class="fas fa-circle fa-stack-2x"></i>
                            <i style="color:white;" class="fas fa-shopping-cart fa-stack-1x fa-sign-in-alt"></i>
                        </span>
                        <h4 class="my-3">Log in to your account</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                            architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i style="color:#b9212d;" class="fas fa-circle fa-stack-2x"></i>
                            <i style="color:white;" class="fas fa-laptop fa-stack-1x fa-calendar-alt"></i>
                        </span>
                        <h4 class="my-3">Choose doctor and time</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                            architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i style="color:#b9212d;" class="fas fa-circle fa-stack-2x"></i>
                            <i style="color:white;" class="fas fa-lock fa-stack-1x fa-file-alt"></i>
                        </span>
                        <h4 class="my-3">Show your appointment code to doctor</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam
                            architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                </div>
            </div>
        </section>
    @endsection
