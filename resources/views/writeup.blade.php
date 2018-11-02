@extends('layouts.dashboard')

@section('stylesheets')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.green.css') }}" id="theme-stylesheet">
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('navbar')
<li>
    <a href="{{ route('home') }}"><i class="fa fa-home"></i><span>Home</span></a>
</li>
<li>
    <a href="{{ route('sub.basic') }}"><i class="fa fa-user"></i><span>Basic Information</span></a>
</li>
<li>
    <a href="{{ route('sub.payment') }}"><i class="fa fa-credit-card"></i><span>Payment Information</span></a>
</li>
<li>
    <a href="{{ route('sub.affiliations') }}"><i class="fa fa-star"></i><span>Affiliations</span></a>
</li>
<li class="active">
    <a href="{{ route('sub.writeup') }}"><i class="fa fa-pencil-square-o"></i><span>Write Up</span></a>
</li>
<li>
    <a href="{{ route('sched.pictorial') }}"><i class="fa fa-calendar-check-o"></i><span>Schedule Pictorial &nbsp; 
        <span class="badge badge-primary">Now Available!</span></span></a>
</li>
@endsection

@section('content')
<section class="updates section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h2 class="h5 display display">Write Up</h2>
                    </div>
                    <div class="card-body">
                        <!--<div class="alert alert-info" role="alert">-->
                        <!--    Write-Up is already closed.-->
                        <!--</div>-->
                        @if (Session::has('status'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('status') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('writeup.save') }}">
                        {{ csrf_field() }}
                            <div class="form-group">   
                                <div class="row">
                                    <div class="col-lg-12">
                                        <textarea id="writeup-area" class="form-control" rows="3" name="writeup" disabled="disabled">{{ $writeup }}</textarea>
                                        <!--<small class="form-text text-muted" id="words-left">80 words left</small>-->
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">   
                                <div class="row d-flex flex-row-reverse">
                                </div>
                            </div>
                            <input type="hidden" name="status" id="status">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--    <div class="row">-->
    <!--            <div class="col-lg-12">-->
    <!--                <div class="card">-->
    <!--                    <div class="card-header d-flex align-items-center">-->
    <!--                        <h2 class="h5 display display">Comments for Write Up</h2>-->
    <!--                    </div>-->
    <!--                    <div class="card-body">-->
    <!--                        <div class="form-group">   -->
    <!--                            <div class="row">-->
    <!--                                <div class="col-lg-12">-->
    <!--                                    <textarea id="comment-writeup" class="form-control" rows="3" name="comment-writeup"></textarea>-->
    <!--                                    <small class="form-text text-muted" id="words-left">80 words left</small>-->
    <!--                                    <small class="form-text text-muted">Please be advised that if you exceed 80 words, the excess words will be deleted.</small>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="form-group">   -->
    <!--                            <div class="row d-flex flex-row-reverse">-->
    <!--                                <div class="p-2">-->
    <!--                                    <button type="button" class="btn btn-primary btn-md" id="sc-writeup">Submit Comment</button>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--</div>-->
</section>
@endsection

@section('javascripts')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"> </script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('js/front.js') }}"></script>
<script src="{{ asset('js/writeup.js') }}"></script>
<script src="{{ asset('js/gsheets.js') }}"></script>
@endsection
