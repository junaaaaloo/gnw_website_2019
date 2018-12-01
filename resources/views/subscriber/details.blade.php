@extends('subscriber.template', ['context' => 'subscriber.basic_info'])

@section('sublibraries')

@endsection

@section('substyles')
<style>
    div#basic_information_page {
        margin: 50px 0px 100px 0px;
        min-height: calc(100vh - 405px);
    }

    #message {
        display: none;
    }
</style>
@endsection

@section('content')
<div id = "basic_information_page" class = "ui container">
    <form id = "info" class = "ui form" method="POST" action="{{route('basic.save')}}">
        @if (Session::has('status'))
        <div class="ui blue message" role="alert">
            {{ Session::get('status') }}
        </div>
        @endif
        <button id = "edit" class="ui blue button">
            <i class="icon edit"> </i> 
            Edit
        </button>
        <button id = "save" disabled class="ui green button" type="submit">
            <i class="icon save"> </i> 
            Save
        </button>
        <button id = "discard" disabled class="ui red button">
            <i class="icon times"> </i> 
            Discard Changes
        </button>
        <div id="message" class="ui green message">
            You may now edit your information. Please ensure that your data is complete.
        </div>
        
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
                            <input type="text"  name="firstname" value="{{ $subbie->firstname }}" disabled  >
                        </div>
                        <div class="field">
                            <label for="middlename">Middle Name</label>
                            <input type="text"  name="middlename" disabled  value="{{ $subbie->middlename }}">
                        </div>
                        <div class="field">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" disabled  value="{{ $subbie->lastname }}" >
                        </div>
                        <div class="field">
                            <label for="suffix"> Suffix</label>
                            <input type="text"  name="suffix" disabled  value="{{ $subbie->suffix }}">
                        </div>
                    </div>
                </div>    
                <div class="field">
                    <div class="two fields">
                        <div class="field">
                            <label for="gender">Gender</label>
                            <div class="ui disabled dropdown selection">
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
                            <input type="text" placeholder="Nickname" id="nickname" disabled  name="nickname" value="{{ $subbie->nickname }}" >
                        </div>
                    </div>
                </div>   
                <div class = "field">
                    <label for="bday"> Birthday </label>
                    <div class = "three fields">
                        <div class="field">
                            <div class="ui disabled dropdown selection">
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
                            <div class="ui disabled dropdown selection">
                                <input type="hidden" name="day" value = "{{ $subbie->bday_day }}">
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
                            <input type="text" placeholder="Year" disabled  name="year" value="{{ $subbie->bday_year }}" >
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class = "two fields">
                        <div class = "field">
                            <label for="college">College</label>
                            <div class="ui disabled dropdown selection">
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
                            <input type="text" placeholder = "Degree" id = "degree" disabled  value = "{{$subbie -> degreeprogram}}"/>
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
                    <input type="text" id="idn" placeholder="e.g 11234567" name="idnum" value="{{ $subbie->idnum }}"  disabled >
                </div>
                <div class="field">
                    <div class="fields two">
                        <div class="field">
                            <label for="nde">Non-DLSU Email</label>
                            <input type="email" id="nde" name="nondlsu" value="{{ $subbie->non_dlsu_email }}" disabled  >
                        </div>
                        <div class="field">
                            <label for="de">DLSU Email</label>
                            <input type="email" id="de" name="dlsu" value="{{ $subbie->dlsu_email }}" disabled  >
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="fields two">
                        <div class="field">
                            <label for="mb">Mobile Number</label>
                            <input type="text" id="mb" name="mobile" value="{{ $subbie->mobile }}" disabled >
                        </div>
                        <div class="field">
                            <label for="pnb">Landline</label>
                            <input type="text" id="pnb" name="landline" value="{{ $subbie->landline }}" disabled >
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
                            <input id="province"  placeholder="Enter Province" style="width: 100%;" name="province" value="{{ $subbie->province }}" disabled  >
                        </div>
                        <div class="field">
                            <label for="city">City/Municipality</label>
                            <input id="city" name="city" value="{{ $subbie->city }}"  placeholder="" disabled  >
                        </div>
                    </div>
                    <div class="ui two fields"> 
                        <div class="field">
                            <label for="ufl">House No/Unit/Floor</label>
                            <input type="text"  id="ufl" placeholder="Enter House No/Unit/Floor" name="houseno" value="{{ $subbie->houseno }}" disabled >
                        </div>
                        <div class="field">
                            <label for="bldg">Building</label>
                            <input type="text"  id="bldg" placeholder="Enter Building" name="building" value="{{ $subbie->building }}"disabled >
                        </div>
                        <div class="field">
                            <label for="strt">Street</label>
                            <input type="text"  id="strt" placeholder="Enter Street" name="street" value="{{ $subbie->street }}" disabled >
                        </div>
                    </div>
                    <div class="ui two fields"> 
                        <div class="field">
                            <label for="subd">Subdivision</label>
                            <input type="text"  id="subd" placeholder="Enter Subdivision" name="subdivision" value="{{ $subbie->subdivision }}" disabled >
                        </div>
                        <div class="field">
                            <label for="bgy">Barangay</label>
                            <input type="text"  id="bgy" placeholder="Enter Barangay" name="barangay" value="{{ $subbie->barangay }}" disabled >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('subscripts')
<script>
function openform () {
    $("#save").attr('disabled', null)
    $("#discard").attr('disabled', null)

    $("#message").slideDown()
    $(".ui.dropdown").removeClass('disabled')
    $("input").attr('disabled', null)
    
    $("#edit").attr('disabled', '')
}


$("#edit").click((e) => {
    e.preventDefault
    openform()
})

$("#discard").click((e) => {
    e.preventDefault()
    location.reload()
})

</script>
@endsection