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
<li class="active">
    <a href="{{ route('sub.basic') }}"><i class="fa fa-user"></i><span>Basic Information</span></a>
</li>
<li>
    <a href="{{ route('sub.payment') }}"><i class="fa fa-credit-card"></i><span>Payment Information</span></a>
</li>
<li>
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
        @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('status') }}
        </div>
        @endif
        <!--<form method="POST" action="{{ route('basic.save') }}">-->
        <form>
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
                                        <input type="text" placeholder="First Name" class="form-control name-form" name="firstname" value="{{ $subbie->firstname }}" disabled required>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Middle Name" class="form-control name-form" name="middlename" disabled value="{{ $subbie->middlename }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" placeholder="Last Name" class="form-control name-form" name="lastname" disabled value="{{ $subbie->lastname }}" required>
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="text" placeholder="Suffix" class="form-control name-form" name="suffix" disabled value="{{ $subbie->suffix }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="nickname">Nickname</label>
                                        <input type="text" placeholder="Nickname" class="form-control" id="nickname" disabled name="nickname" value="{{ $subbie->nickname }}" required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="gender">Gender</label>
                                        <select name="gender" class="form-control" id="gender" data-gender="{{ $subbie->gender }}" disabled required>
                                            <option disabled selected>Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="bday">Birth Month</label>
                                        <select name="month" class="form-control" id="month" data-month="{{ $subbie->bday_month }}" disabled required>
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
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="bday">Birth Day</label>
                                        <select name="day" class="form-control" id="day" data-day="{{ $subbie->bday_day }}" disabled required>
                                            <option disabled>Day</option>
                                            <option value="1">1</option>       
                                            <option value="2">2</option>       
                                            <option value="3">3</option>       
                                            <option value="4">4</option>       
                                            <option value="5">5</option>       
                                            <option value="6">6</option>       
                                            <option value="7">7</option>       
                                            <option value="8">8</option>       
                                            <option value="9">9</option>       
                                            <option value="10">10</option>       
                                            <option value="11">11</option>       
                                            <option value="12">12</option>       
                                            <option value="13">13</option>       
                                            <option value="14">14</option>       
                                            <option value="15">15</option>       
                                            <option value="16">16</option>       
                                            <option value="17">17</option>       
                                            <option value="18">18</option>       
                                            <option value="19">19</option>       
                                            <option value="20">20</option>       
                                            <option value="21">21</option>       
                                            <option value="22">22</option>       
                                            <option value="23">23</option>       
                                            <option value="24">24</option>       
                                            <option value="25">25</option>       
                                            <option value="26">26</option>       
                                            <option value="27">27</option>       
                                            <option value="28">28</option>       
                                            <option value="29">29</option>       
                                            <option value="30">30</option>       
                                            <option value="31">31</option>         
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="bday">Birth Year</label>
                                        <input type="text" placeholder="Year" class="form-control" name="year" value="{{ $subbie->bday_year }}" disabled required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">   
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="college">College</label>
                                        <!--<input id="college" class="form-control" placeholder="Enter your College" name="college" value="{{ $subbie->college }}" required>-->
                                        <select id="college" class="form-control" name="college" disabled>
                                            <option value="" selected disabled>Select your College</option>
                                            @if ($subbie->college === "College of Liberal Arts (CLA)")
                                            <option value="College of Liberal Arts (CLA)" selected>College of Liberal Arts (CLA)</option>
                                            @else
                                            <option value="College of Liberal Arts (CLA)">College of Liberal Arts (CLA)</option>
                                            @endif
                                            
                                            @if ($subbie->college === "Ramon V. del Rosario College of Business (RVR-COB)")
                                            <option value="Ramon V. del Rosario College of Business (RVR-COB)" selected>Ramon V. del Rosario College of Business (RVR-COB)</option>
                                            @else
                                            <option value="Ramon V. del Rosario College of Business (RVR-COB)">Ramon V. del Rosario College of Business (RVR-COB)</option>
                                            @endif
                                            
                                            @if ($subbie->college === "School of Economics (SOE)")
                                            <option value="School of Economics (SOE)" selected>School of Economics (SOE)</option>
                                            @else
                                            <option value="School of Economics (SOE)">School of Economics (SOE)</option>
                                            @endif
                                            
                                            @if ($subbie->college === "Gokongwei College of Engineering (GCOE)")
                                            <option value="Gokongwei College of Engineering (GCOE)" selected>Gokongwei College of Engineering (GCOE)</option>
                                            @else
                                            <option value="Gokongwei College of Engineering (GCOE)">Gokongwei College of Engineering (GCOE)</option>
                                            @endif
                                            
                                            @if ($subbie->college === "College of Computer Studies (CCS)")
                                            <option value="College of Computer Studies (CCS)" selected>College of Computer Studies (CCS)</option>
                                            @else
                                            <option value="College of Computer Studies (CCS)">College of Computer Studies (CCS)</option>
                                            @endif
                                            
                                            @if ($subbie->college === "College of Science (COS)")
                                            <option value="College of Science (COS)" selected>College of Science (COS)</option>
                                            @else
                                            <option value="College of Science (COS)">College of Science (COS)</option>
                                            @endif
                                            
                                            @if ($subbie->college === "Br. Andrew Gonzalez FSC College of Education (BAGCED)")
                                            <option value="Br. Andrew Gonzalez FSC College of Education (BAGCED)" selected>Br. Andrew Gonzalez FSC College of Education (BAGCED)</option>
                                            @else
                                            <option value="Br. Andrew Gonzalez FSC College of Education (BAGCED)">Br. Andrew Gonzalez FSC College of Education (BAGCED)</option>
                                            @endif
                                            
                                            @if ($subbie->college === "College of Law (COL)")
                                            <option value="College of Law (COL)" selected>College of Law (COL)</option>
                                            @else
                                            <option value="College of Law (COL)">College of Law (COL)</option>
                                            @endif
                                            
                                            @if ($subbie->college === "Graduate Studies (GS)")
                                            <option value="Graduate Studies (GS)" selected>Graduate Studies (GS)</option>
                                            @else
                                            <option value="Graduate Studies (GS)">Graduate Studies (GS)</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">   
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="degree">Degree Program</label>
                                        <input id="degree" class="form-control" placeholder="Enter your Degree Program" name="degree" value="{{ $subbie->degreeprogram }}" disabled required>
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
                                        <input type="text" id="idn" placeholder="e.g 11234567" class="form-control" name="idnum" value="{{ $subbie->idnum }}" required disabled="true">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="nde">Non-DLSU Email</label>
                                        <input type="email" id="nde" placeholder="example@domain.com" class="form-control" name="nondlsu" value="{{ $subbie->non_dlsu_email }}" disabled required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="nde">DLSU Email</label>
                                        <input type="email" id="nde" placeholder="example@dlsu.edu.ph" class="form-control" name="dlsu" value="{{ $subbie->dlsu_email }}" disabled required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="pnb">Mobile Number</label>
                                        (+63) <input type="text" class="form-control" id="pnb" placeholder="9221234567" name="mobile" value="{{ $subbie->mobile }}"disabled>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="pnb">Landline</label>
                                        <input type="text" class="form-control" id="pnb" placeholder="123 4567" name="landline" value="{{ $subbie->landline }}" disabled>
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
                                        <input id="province" class="form-control" placeholder="Enter Province" style="width: 100%;" name="province" value="{{ $subbie->province }}" disabled required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="nde">City/Municipality</label>
                                        <input id="city" name="city" value="{{ $subbie->city }}" class="form-control" placeholder="Enter City" disabled required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="ufl">House No/Unit/Floor</label>
                                        <input type="text" class="form-control" id="ufl" placeholder="Enter House No/Unit/Floor" name="houseno" value="{{ $subbie->houseno }}" disabled>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="bldg">Building</label>
                                        <input type="text" class="form-control" id="bldg" placeholder="Enter Building" name="building" value="{{ $subbie->building }}"disabled>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="strt">Street</label>
                                        <input type="text" class="form-control" id="strt" placeholder="Enter Street" name="street" value="{{ $subbie->street }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="subd">Subdivision</label>
                                        <input type="text" class="form-control" id="subd" placeholder="Enter Subdivision" name="subdivision" value="{{ $subbie->subdivision }}" disabled>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="bgy">Barangay</label>
                                        <input type="text" class="form-control" id="bgy" placeholder="Enter Barangay" name="barangay" value="{{ $subbie->barangay }}" disabled>
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
            <!--                <h2 class="h5 display display">What is your delivery address?</h2>-->
            <!--            </div>-->
            <!--            <div class="card-body">-->
            <!--                <div class="form-group">   -->
            <!--                    <div class="row">-->
            <!--                        <div class="col-lg-12">-->
            <!--                            <textarea id="comment-deladd" class="form-control" rows="3" name="comment-deladd"></textarea>-->
            <!--                            <small class="form-text text-muted" id="words-left">Delivery is available on Luzon areas only.</small>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="form-group">   -->
            <!--                    <div class="row d-flex flex-row-reverse">-->
            <!--                        <div class="p-2">-->
            <!--                            <button type="button" class="btn btn-primary btn-md" id="sc-deladd">Submit Comment</button>-->
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
            <!--                <h2 class="h5 display display">Comments for Basic Information</h2>-->
            <!--            </div>-->
            <!--            <div class="card-body">-->
            <!--                <div class="form-group">   -->
            <!--                    <div class="row">-->
            <!--                        <div class="col-lg-12">-->
            <!--                            <textarea id="comment-basinf" class="form-control" rows="3" name="comment-basinf"></textarea>-->
            <!--                            <small class="form-text text-muted" id="words-left">Works best on Google Chrome.</small>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="form-group">   -->
            <!--                    <div class="row d-flex flex-row-reverse">-->
            <!--                        <div class="p-2">-->
            <!--                            <button type="button" class="btn btn-primary btn-md" id="sc-basinf">Submit Comment</button>-->
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
            <!--            <div class="card-body">-->
            <!--                <div class="form-group">   -->
            <!--                    <div class="row d-flex flex-row-reverse">-->
            <!--                        <div class="p-2">-->
            <!--                            <button type="submit" class="btn btn-primary btn-md">Save Information</button>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
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
<script src="{{ asset('js/front.js') }}"></script>
<script src="{{ asset('js/jquery.easy-autocomplete.min.js') }}"></script>
<script src="{{ asset('js/res/data.js') }}"></script>
<script src="{{ asset('js/res/places.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/basicinfo.js') }}"></script>
<script src="{{ asset('js/gsheets.js') }}"></script>
@endsection