@extends('admin.template', ["context"=>"admin.manage.subscribers"])

@section('substyles')
<style>
    div#managesubscribers {
        margin: 50px 0px 100px 0px;
        min-height: calc(100vh - 405px);
    }
</style>
@endsection

@section('content')
<div id="managesubscribers" class="ui container brand page">
    <form class = "ui form" route="{{route('admin.subscriber.save')}}">
        {{ csrf_field() }}
        <div class = "ui accordion">
            <div class="active title">
                <i class="dropdown icon"></i>
                <span class = "ui header"> Basic Information </span>
            </div>
            <div class = "active content">
                <div class="field">
                    <div class="four fields">
                        <div class="field">
                            <label for="firstname">First Name</label>
                            <input type="text"  name="firstname" value="{{ $subbie->firstname }}"  required>
                        </div>
                        <div class="field">
                            <label for="middlename">Middle Name</label>
                            <input type="text"  name="middlename"  value="{{ $subbie->middlename }}">
                        </div>
                        <div class="field">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname"  value="{{ $subbie->lastname }}" required>
                        </div>
                        <div class="field">
                            <label for="suffix"> Suffix</label>
                            <input type="text"  name="suffix"  value="{{ $subbie->suffix }}">
                        </div>
                    </div>
                </div>    
                <div class="field">
                    <div class="two fields">
                        <div class="field">
                            <label for="gender">Gender</label>
                            <div class="ui dropdown selection">
                                <input type="hidden" name="gender" value = "{{ $subbie->gender }}">
                                <div class="text"> </div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class="item" data-value="Male">Male</div>
                                    <div class="item" data-value="Female">Female</div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label for="nickname">Nickname</label>
                            <input type="text" placeholder="Nickname" id="nickname"  name="nickname" value="{{ $subbie->nickname }}" required>
                        </div>
                    </div>
                </div>   
                <div class = "field">
                    <label for="bday"> Birthday </label>
                    <div class = "three fields">
                        <div class="field">
                            <div class="ui dropdown selection">
                                <input type="hidden" name="month" value = "{{ $subbie->bday_month }}">
                                <div class="text"> </div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class = "item" data-value="1">January</div>
                                    <div class = "item" data-value="2">February</div>
                                    <div class = "item" data-value="3">March</div>
                                    <div class = "item" data-value="4">April</div>
                                    <div class = "item" data-value="5">May</div>
                                    <div class = "item" data-value="6">June</div>
                                    <div class = "item" data-value="7">July</div>
                                    <div class = "item" data-value="8">August</div>
                                    <div class = "item" data-value="9">September</div>
                                    <div class = "item" data-value="10">October</div>
                                    <div class = "item" data-value="11">November</div>
                                    <div class = "item" data-value="12">December</div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui dropdown selection">
                                <input type="hidden" name="month" value = "{{ $subbie->bday_day }}">
                                <div class="text"> </div>
                                <i class="dropdown icon"></i>
                                <div class="menu">
                                    <div class = "item" data-value="1">1</div>       
                                    <div class = "item" data-value="2">2</div>       
                                    <div class = "item" data-value="3">3</div>       
                                    <div class = "item" data-value="4">4</div>       
                                    <div class = "item" data-value="5">5</div>       
                                    <div class = "item" data-value="6">6</div>       
                                    <div class = "item" data-value="7">7</div>       
                                    <div class = "item" data-value="8">8</div>       
                                    <div class = "item" data-value="9">9</div>       
                                    <div class = "item" data-value="10">10</div>       
                                    <div class = "item" data-value="11">11</div>       
                                    <div class = "item" data-value="12">12</div>       
                                    <div class = "item" data-value="13">13</div>       
                                    <div class = "item" data-value="14">14</div>       
                                    <div class = "item" data-value="15">15</div>       
                                    <div class = "item" data-value="16">16</div>       
                                    <div class = "item" data-value="17">17</div>       
                                    <div class = "item" data-value="18">18</div>       
                                    <div class = "item" data-value="19">19</div>       
                                    <div class = "item" data-value="20">20</div>       
                                    <div class = "item" data-value="21">21</div>       
                                    <div class = "item" data-value="22">22</div>       
                                    <div class = "item" data-value="23">23</div>       
                                    <div class = "item" data-value="24">24</div>       
                                    <div class = "item" data-value="25">25</div>       
                                    <div class = "item" data-value="26">26</div>       
                                    <div class = "item" data-value="27">27</div>       
                                    <div class = "item" data-value="28">28</div>       
                                    <div class = "item" data-value="29">29</div>       
                                    <div class = "item" data-value="30">30</div>       
                                    <div class = "item" data-value="31">31</div>  
                                </div>       
                            </div>
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Year"  name="year" value="{{ $subbie->bday_year }}" required>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class = "two fields">
                        <div class = "field">
                            <label for="college">College</label>
                            <div class="ui dropdown selection">
                                <input type="hidden" name="college" value = "{{ $subbie->college }}">
                                <div class="text"> </div>
                                <i class="dropdown icon"></i>
                                <div class = "menu">
                                    <div class = "item" data-value="College of Liberal Arts (CLA)">College of Liberal Arts (CLA)</div>
                                    <div class = "item" data-value="Ramon V. del Rosario College of Business (RVR-COB)">Ramon V. del Rosario College of Business (RVR-COB)</div>
                                    <div class = "item" data-value="School of Economics (SOE)">School of Economics (SOE)</div>
                                    <div class = "item" data-value="Gokongwei College of Engineering (GCOE)">Gokongwei College of Engineering (GCOE)</div>
                                    <div class = "item" data-value="College of Computer Studies (CCS)">College of Computer Studies (CCS)</div>
                                    <div class = "item" data-value="College of Science (COS)">College of Science (COS)</div>
                                    <div class = "item" data-value="Br. Andrew Gonzalez FSC College of Education (BAGCED)">Br. Andrew Gonzalez FSC College of Education (BAGCED)</div>
                                    <div class = "item" data-value="College of Law (COL)">College of Law (COL)</div>
                                    <div class = "item" data-value="Graduate Studies (GS)">Graduate Studies (GS)</div>
                                </div>
                            </div>
                        </div>
                        <div class = "field">
                            <label for = "degree">
                                Program
                            </label>
                            <input type="text" placeholder = "Degree" id = "degree"  value = "{{$subbie -> degreeprogram}}"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "ui accordion">        
            <div class = "active title">
                <i class="dropdown icon"></i>
                <span class = "ui header"> Contact Information </span>
            </div>
            <div class="active content">
                <div class="field">
                    <label for="idn">ID Number</label>
                    <input type="text" id="idn" placeholder="e.g 11234567" name="idnum" value="{{ $subbie->idnum }}" required >
                </div>
                <div class="field">
                    <div class="fields two">
                        <div class="field">
                            <label for="nde">Non-DLSU Email</label>
                            <input type="email" id="nde" placeholder="example@domain.com" name="nondlsu" value="{{ $subbie->non_dlsu_email }}"  required>
                        </div>
                        <div class="field">
                            <label for="nde">DLSU Email</label>
                            <input type="email" id="nde" placeholder="example@dlsu.edu.ph" name="dlsu" value="{{ $subbie->dlsu_email }}"  required>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="fields two">
                        <div class="field">
                            <label for="pnb">Mobile Number</label>
                            <input type="text" id="pnb" placeholder="9221234567" name="mobile" value="{{ $subbie->mobile }}" >
                        </div>
                        <div class="field">
                            <label for="pnb">Landline</label>
                            <input type="text" id="pnb" placeholder="123 4567" name="landline" value="{{ $subbie->landline }}" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "ui accordion">        
            <div class = "active title">
                <i class="dropdown icon"></i>
                <span class = "ui header"> Address </span>
            </div>
            <div class="active content">
                <div class="field">
                    <div class="ui two fields">   
                        <div class="field">
                            <label for="province">Province</label>
                            <input id="province"  placeholder="Enter Province" style="width: 100%;" name="province" value="{{ $subbie->province }}"  required>
                        </div>
                        <div class="field">
                            <label for="city">City/Municipality</label>
                            <input id="city" name="city" value="{{ $subbie->city }}"  placeholder=""  required>
                        </div>
                    </div>
                    <div class="ui two fields"> 
                        <div class="field">
                            <label for="ufl">House No/Unit/Floor</label>
                            <input type="text"  id="ufl" placeholder="Enter House No/Unit/Floor" name="houseno" value="{{ $subbie->houseno }}" >
                        </div>
                        <div class="field">
                            <label for="bldg">Building</label>
                            <input type="text"  id="bldg" placeholder="Enter Building" name="building" value="{{ $subbie->building }}">
                        </div>
                        <div class="field">
                            <label for="strt">Street</label>
                            <input type="text"  id="strt" placeholder="Enter Street" name="street" value="{{ $subbie->street }}" >
                        </div>
                    </div>
                    <div class="ui two fields"> 
                        <div class="field">
                            <label for="subd">Subdivision</label>
                            <input type="text"  id="subd" placeholder="Enter Subdivision" name="subdivision" value="{{ $subbie->subdivision }}" >
                        </div>
                        <div class="field">
                            <label for="bgy">Barangay</label>
                            <input type="text"  id="bgy" placeholder="Enter Barangay" name="barangay" value="{{ $subbie->barangay }}" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('status'))
        <div class="ui blue message" role="alert">
            {{ Session::get('status') }}
        </div>
        @endif
        <button class="ui green right floated button" type="submit">
            <i class="icon save"> </i> 
            Save
        </button>
        <div id = "edit" class="ui blue right floated button">
            <i class="icon edit"> </i> 
            Edit
        </div>
    </form>
</div>
@endsection

@section('subscripts')
@endsection
