@extends('layouts.dashboard')

@section('stylesheets')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.green.css') }}" id="theme-stylesheet">
<link href="{{ asset('css/easy-autocomplete.min.css') }}" rel="stylesheet" type="text/css">
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
<li class="active">
    <a href="{{ route('sub.affiliations') }}"><i class="fa fa-star"></i><span>Affiliations</span></a>
</li>
<li>
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
                        <h2 class="h5 display display">Affiliations</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">   
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Organization</th>
                                                <th scope="col">Position</th>
                                                <th scope="col">Year</th>
                                                <!--<th scope="col">Year End</th>-->
                                                <!--<th scope="col"></th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($affiliations as $aff)
                                            <tr>
                                                <th scope="col">{{ $aff->organization }}</th>
                                                <th scope="col">{{ $aff->position }}</th>
                                                <th scope="col">{{ $aff->start_year }}</th>
                                                <!--<th scope="col">{{ $aff->end_year }}</th>-->
                                                <!--<th scope="col" class="delete" id="delete" data-id="{{ $aff->id }}">-->
                                                <!--    Delete-->
                                                <!--</th>-->
                                            </tr>
                                            @endforeach
                                        </tbody>


                                        <!--<form id="deleteAffMethod" method="POST" action="{{ route('aff.delete') }}">-->
                                        <!--    {{ csrf_field() }}-->
                                        <!--    <input type="hidden" id="deleteid" name="deleteid">-->
                                        <!--</form>-->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="row">-->
        <!--    <div class="col-lg-12">-->
        <!--        <div class="card">-->
        <!--            <div class="card-header d-flex align-items-center">-->
        <!--                <h2 class="h5 display display">Comments for Affiliations</h2>-->
        <!--            </div>-->
        <!--            <div class="card-body">-->
        <!--                <div class="form-group">   -->
        <!--                    <div class="row">-->
        <!--                        <div class="col-lg-12">-->
        <!--                            <textarea id="comment-aff" class="form-control" rows="3" name="comment-aff"></textarea>-->
        <!--                            <small class="form-text text-muted" id="words-left">Works best on Google Chrome.</small>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="form-group">   -->
        <!--                    <div class="row d-flex flex-row-reverse">-->
        <!--                        <div class="p-2">-->
        <!--                            <button type="button" class="btn btn-primary btn-md" id="sc-aff">Submit Comment</button>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        
        
        <!--<div class="row">-->
        <!--    <div class="col-lg-12">-->
        <!--        <div class="card">-->
        <!--            <div class="card-header d-flex align-items-center">-->
        <!--                <h2 class="h5 display display">Add New</h2>-->
        <!--            </div>-->
        <!--            <form id="addAffiliations" method="POST" action="{{ route('aff.add') }}">-->
        <!--                {{ csrf_field() }}-->
        <!--                <div class="card-body">-->
        <!--                    <div class="form-group">   -->
        <!--                        <div class="row">-->
        <!--                            <div class="col-lg-5">-->
        <!--                                <label for="org">Name of Organization</label>-->
        <!--                                <input id="org" class="form-control" placeholder="Enter Organization Name" name="organization" required />-->
        <!--                            </div>-->
        <!--                            <div class="col-lg-3">-->
        <!--                                <label for="pos">Position</label>-->
        <!--                                <input id="pos" class="form-control" placeholder="e.g Member" name="position" required/>-->
        <!--                            </div>-->
        <!--                            <div class="col-lg-2">-->
        <!--                                <label for="start">Year Start</label>-->
        <!--                                <select name="yearstart" id="start" class="form-control" required>-->
        <!--                                    <option value="2018">2018</option>-->
        <!--                                    <option value="2017">2017</option>-->
        <!--                                    <option value="2016">2016</option>-->
        <!--                                    <option value="2015">2015</option>-->
        <!--                                    <option value="2014">2014</option>-->
        <!--                                    <option value="2013">2013</option>-->
        <!--                                    <option value="2012">2012</option>-->
        <!--                                    <option value="2011">2011</option>-->
        <!--                                    <option value="2010">2010</option>-->
        <!--                                    <option value="2009">2009</option>-->
        <!--                                    <option value="2008">2008</option>-->
        <!--                                    <option value="2007">2007</option>-->
        <!--                                    <option value="2006">2006</option>-->
        <!--                                    <option value="2005">2005</option>-->
        <!--                                    <option value="2004">2004</option>-->
        <!--                                    <option value="2003">2003</option>-->
        <!--                                    <option value="2002">2002</option>-->
        <!--                                    <option value="2001">2001</option>-->
        <!--                                </select>-->
        <!--                            </div>-->
        <!--                            <div class="col-lg-2">-->
        <!--                                <label for="end">Year End</label>-->
        <!--                                <select name="yearend" id="end" class="form-control" required>-->
        <!--                                    <option value="2018">2018</option>-->
        <!--                                    <option value="2017">2017</option>-->
        <!--                                    <option value="2016">2016</option>-->
        <!--                                    <option value="2015">2015</option>-->
        <!--                                    <option value="2014">2014</option>-->
        <!--                                    <option value="2013">2013</option>-->
        <!--                                    <option value="2012">2012</option>-->
        <!--                                    <option value="2011">2011</option>-->
        <!--                                    <option value="2010">2010</option>-->
        <!--                                    <option value="2009">2009</option>-->
        <!--                                    <option value="2008">2008</option>-->
        <!--                                    <option value="2007">2007</option>-->
        <!--                                    <option value="2006">2006</option>-->
        <!--                                    <option value="2005">2005</option>-->
        <!--                                    <option value="2004">2004</option>-->
        <!--                                    <option value="2003">2003</option>-->
        <!--                                    <option value="2002">2002</option>-->
        <!--                                    <option value="2001">2001</option>-->
        <!--                                </select>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="form-group">   -->
        <!--                        <div class="row d-flex flex-row-reverse">-->
        <!--                            <div class="p-2">-->
        <!--                                <button type="submit" class="btn btn-primary btn-md">Add Affiliation</button>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </form>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
    </div>
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
<script src="{{ asset('js/jquery.easy-autocomplete.min.js') }}"></script>
<script src="{{ asset('js/res/data.js') }}"></script>
<script src="{{ asset('js/res/places.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/gsheets.js') }}"></script>
@endsection
