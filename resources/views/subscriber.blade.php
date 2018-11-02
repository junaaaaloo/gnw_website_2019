@extends('layouts.dashboard')

@section('stylesheets')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
<link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/style.green.css') }}" id="theme-stylesheet">
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/admindb.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('navbar')
<li>
	<a href="{{ route('home') }}"><i class="fa fa-home"></i><span>Home</span></a>
</li>
<li> 
    <a href="#sub-list" data-toggle="collapse" aria-expanded="false"><i class="fa fa-users"></i><span>Subscriber</span>
    <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
    <ul id="sub-list" class="collapse list-unstyled">
        <li> <a href="{{ route('admin.manage.regid') }}">Manage Registered IDs</a></li>
        <li> <a href="{{ route('admin.manage.subs') }}">Manage Subscribers</a></li>
        <li> <a href="{{ route('admin.manage.payments') }}">Manage Payment</a></li>
    </ul>
</li>
<li> 
    <a href="#announcement-list" data-toggle="collapse" aria-expanded="false"><i class="fa fa-paper-plane-o"></i><span>News</span>
    <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
    <ul id="announcement-list" class="collapse list-unstyled">
        <li> <a href="{{ route('admin.create') }}">Add News</a></li>
        <li> <a href="{{ route('admin.manage.news') }}">Manage News</a></li>
    </ul>
</li>
<li> 
    <a href="#admin-list" data-toggle="collapse" aria-expanded="false"><i class="fa fa-group"></i><span>Admin</span>
    <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
    <ul id="admin-list" class="collapse list-unstyled">
        <li> <a href="{{ route('admin.manage.admin') }}">Manage Admin Accounts</a></li>
    </ul>
</li>
@endsection

@section('content')
<section class="updates section-padding">
    <div class="container-fluid">
        @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('status') }}
        </div>
        @endif
        <form method="POST" action="{{ route('admin.subscriber.save') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h2 class="h5 display display">Basic Information</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Full Name</label>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input type="text" placeholder="First Name" class="form-control name-form" name="firstname" value="{{ $subbie->firstname }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Middle Name" class="form-control name-form" name="middlename" value="{{ $subbie->middlename }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" placeholder="Last Name" class="form-control name-form" name="lastname" value="{{ $subbie->lastname }}">
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="text" placeholder="Suffix" class="form-control name-form" name="suffix" value="{{ $subbie->suffix }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="nickname">Nickname</label>
                                        <input type="text" placeholder="Nickname" class="form-control" id="nickname" name="nickname" value="{{ $subbie->nickname }}">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="gender">Gender</label>
                                        <input type="text" name="gender" class="form-control" id="gender" value="{{ $subbie->gender }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="bday">Birth Month</label>
                                        @if ($subbie->bday_month === "1")
                                            <select name="month" class="form-control" id="month" data-month="{{ $subbie->bday_month }}">
                                                <option disabled>Month</option>
                                                <option value="1" selected>January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        @elseif ($subbie->bday_month === "2")
                                            <select name="month" class="form-control" id="month" data-month="{{ $subbie->bday_month }}">
                                                <option disabled>Month</option>
                                                <option value="1">January</option>
                                                <option value="2" selected>February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        @elseif ($subbie->bday_month === "3")
                                            <select name="month" class="form-control" id="month" data-month="{{ $subbie->bday_month }}">
                                                <option disabled>Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3" selected>March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        @elseif ($subbie->bday_month === "4")
                                            <select name="month" class="form-control" id="month" data-month="{{ $subbie->bday_month }}">
                                                <option disabled>Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4" selected>April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        @elseif ($subbie->bday_month === "5")
                                            <select name="month" class="form-control" id="month" data-month="{{ $subbie->bday_month }}">
                                                <option disabled>Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5" selected>May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        @elseif ($subbie->bday_month === "6")
                                            <select name="month" class="form-control" id="month" data-month="{{ $subbie->bday_month }}">
                                                <option disabled>Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6" selected>June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        @elseif ($subbie->bday_month === "7")
                                            <select name="month" class="form-control" id="month" data-month="{{ $subbie->bday_month }}">
                                                <option disabled>Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7" selected>July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        @elseif ($subbie->bday_month === "8")
                                            <select name="month" class="form-control" id="month" data-month="{{ $subbie->bday_month }}">
                                                <option disabled>Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8" selected>August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        @elseif ($subbie->bday_month === "9")
                                            <select name="month" class="form-control" id="month" data-month="{{ $subbie->bday_month }}">
                                                <option disabled>Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9" selected>September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        @elseif ($subbie->bday_month === "10")
                                            <select name="month" class="form-control" id="month" data-month="{{ $subbie->bday_month }}">
                                                <option disabled>Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10" selected>October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        @elseif ($subbie->bday_month === "11")
                                            <select name="month" class="form-control" id="month" data-month="{{ $subbie->bday_month }}">
                                                <option disabled>Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11" selected>November</option>
                                                <option value="12">December</option>
                                            </select>
                                        @elseif ($subbie->bday_month === "12")
                                            <select name="month" class="form-control" id="month" data-month="{{ $subbie->bday_month }}">
                                                <option disabled>Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12" selected>December</option>
                                            </select>
                                        @endif
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="bday">Birth Day</label>
                                        <input type="text" name="day" class="form-control" id="day" value="{{ $subbie->bday_day }}">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="bday">Birth Year</label>
                                        <input type="text" placeholder="Year" class="form-control" name="year" value="{{ $subbie->bday_year }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">   
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="college">College</label>
                                        <input id="college" class="form-control" placeholder="Enter your College" name="college" value="{{ $subbie->college }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">   
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="degree">Degree Program</label>
                                        <input id="degree" class="form-control" placeholder="Enter your Degree Program" name="degree" value="{{ $subbie->degreeprogram }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">   
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="degree">Write Up</label>
                                        <textarea class="form-control" rows="3" name="writeup">{{ $subbie->writeup }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h2 class="h5 display display">Contact Information</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">   
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="idn">ID Number</label>
                                        <input type="text" id="idn" placeholder="e.g 11234567" class="form-control" name="idnum" value="{{ $subbie->idnum }}" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="nde">Non-DLSU Email</label>
                                        <input type="email" id="nde" placeholder="example@domain.com" class="form-control" name="nondlsu" value="{{ $subbie->non_dlsu_email }}" disabled>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="nde">DLSU Email</label>
                                        <input type="email" id="nde" placeholder="example@dlsu.edu.ph" class="form-control" name="dlsu" value="{{ $subbie->dlsu_email }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="pnb">Mobile Number</label>
                                        (+63) <input type="text" class="form-control" id="pnb" placeholder="9221234567" name="mobile" value="{{ $subbie->mobile }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="pnb">Landline</label>
                                        <input type="text" class="form-control" id="pnb" placeholder="123 4567" name="landline" value="{{ $subbie->landline }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h2 class="h5 display display">Address</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">   
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="idn">Province</label>
                                        <input id="province" class="form-control" placeholder="Enter Province" style="width: 100%;" name="province" value="{{ $subbie->province }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="nde">City/Municipality</label>
                                        <input id="city" name="city" value="{{ $subbie->city }}" class="form-control" placeholder="Enter City">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="ufl">House No/Unit/Floor</label>
                                        <input type="text" class="form-control" id="ufl" placeholder="Enter House No/Unit/Floor" name="houseno" value="{{ $subbie->houseno }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="bldg">Building</label>
                                        <input type="text" class="form-control" id="bldg" placeholder="Enter Building" name="building" value="{{ $subbie->building }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="strt">Street</label>
                                        <input type="text" class="form-control" id="strt" placeholder="Enter Street" name="street" value="{{ $subbie->street }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="subd">Subdivision</label>
                                        <input type="text" class="form-control" id="subd" placeholder="Enter Subdivision" name="subdivision" value="{{ $subbie->subdivision }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="bgy">Barangay</label>
                                        <input type="text" class="form-control" id="bgy" placeholder="Enter Barangay" name="barangay" value="{{ $subbie->barangay }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                                    <th scope="col">Year Start</th>
                                                    <th scope="col">Year End</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($affiliations as $aff)
                                                <tr>
                                                    <th scope="col">{{ $aff->organization }}</th>
                                                    <th scope="col">{{ $aff->position }}</th>
                                                    <th scope="col">{{ $aff->start_year }}</th>
                                                    <th scope="col">{{ $aff->end_year }}</th>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">   
                                <div class="row d-flex flex-row-reverse">
                                    <div class="p-2">
                                        <button type="submit" class="btn btn-primary btn-md">Save Information</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/front.js') }}"></script>
<script src="{{ asset('js/admindb.js') }}"></script>
@endsection
