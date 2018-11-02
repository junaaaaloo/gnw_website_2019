@extends('layouts.logsub')

@section('content')
<div class="container">
    <div class="loginrow">
        <div class="sub-section">
            <h3 class="sub-head">Green &amp; White 2018 &nbsp;|&nbsp; <span class="sub-text">Survey</span>
            <button onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default" style="float:right;">Logout</button></h3>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <hr/>
            <form method="POST" action="{{ route('survey.submit') }}">
                {{ csrf_field() }}
                <small class="form-text text-muted">Kindly indicate your level of agreement or disagreement to each statement by choosing the number that represents your opinion.<br> 1 being the LOWEST and 5 being the HIGHEST</small><br>
                <div class="form-group row">
                    <label for="q1" class="col-sm-10 col-form-label lbl">1. I know that Green and White is an organization of DLSU.</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="q1" name ="q1" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="q2" class="col-sm-10 col-form-label lbl">2. I know that Green and White is part of the Student Media organizations.</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="q2" name ="q2" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="q3" class="col-sm-10 col-form-label lbl">3. I know that Green and White is the official yearbook organization of DLSU.</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="q3" name ="q3" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="q4" class="col-sm-10 col-form-label lbl">4. I know the yearbook process of Green &amp; White.</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="q4" name ="q4" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="q5" class="col-sm-10 col-form-label lbl">5. I always get informed by the organization when they have announcements.</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="q5" name ="q5" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="q6" class="col-sm-10 col-form-label lbl">6. The Facebook page of Green &amp; White is an effective tool in disseminating information.</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="q6" name ="q6" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="q7" class="col-sm-10 col-form-label lbl">7. My college is well informed about the yearbook processes of Green &amp; White.</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="q7" name ="q7" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="q8" class="col-sm-10 col-form-label lbl">8. The staffers are very helpful in giving out information in terms of the yearbook processes.</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="q8" name ="q8" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="q9" class="col-sm-10 col-form-label lbl">9. The organization is very systematic in sharing online pubs.</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="q9" name ="q9" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="q10" class="col-sm-10 col-form-label lbl">10. I understand every statement that the organization is trying to inform the students about.</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="q10" name ="q10" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div><br>
                <small class="form-text text-muted">Please put a check mark (<i class="fa fa-check"></i>) in the blank space provided corresponding your answer.  (Check as many as you want.)</small><br>
                <div class="form-group row">
                    <label for="q10" class="col-sm-3 col-form-label lbl">1. Social Media Use</label>
                    <div class="col-sm-9">
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="Facebook" value="Facebook">Facebook
                        </label> &nbsp;&nbsp;
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="Twitter" value="Twitter">Twitter
                        </label> &nbsp;&nbsp;
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="Instagram" value="Instagram">Instagram
                        </label> &nbsp;&nbsp;
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="Youtube" value="Youtube">Youtube
                        </label> <br>
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="other" value="other"><input name="otherbox" type="text" placeholder="other" class="form-control">
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="q10" class="col-sm-3 col-form-label lbl">2. Class Building</label>
                    <div class="col-sm-9">
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="ls" value="ls">LS Hall
                        </label> &nbsp;&nbsp;
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="yuch" value="yuch">Yuchengco Building
                        </label> &nbsp;&nbsp;
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="joseph" value="joseph">St. Joseph Hall
                        </label> &nbsp;&nbsp;
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="miguel" value="miguel">Miguel Hall
                        </label> &nbsp;&nbsp;
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="mutien" value="mutien">Mutien Marie Building
                        </label> &nbsp;&nbsp;
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="william" value="william">William Hall
                        </label> &nbsp;&nbsp;
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="velasco" value="velasco">Velasco Building
                        </label> &nbsp;&nbsp;
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="strc" value="strc">STRC
                        </label> &nbsp;&nbsp;
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="andrew" value="andrew">Bro. Andrew Gonzales Building
                        </label> &nbsp;&nbsp;
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="razon" value="razon">E. Razon Sports Complex
                        </label> &nbsp;&nbsp;
                        <label class="form-check-label lbl col-form-label">
                            <input class="form-check-input" type="checkbox" name="gokongwei" value="gokongwei">Gokongwei Building
                        </label> &nbsp;&nbsp;
                    </div>
                </div><br>
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        - {{ $error }}<br>
                    @endforeach
                </div>
                @endif
                <hr/>
                <div class="d-flex flex-row-reverse">
                    <div class="p-2">
                        <button type="submit" class="btn btn-primary btn-md">Submit &nbsp;<span class="fa fa-paper-plane"></span></button>
                    </div>
                    <div class="p-2">
                        <button onclick="window.location.href='{{ route('index') }}'" type="button" class="btn btn-secondary btn-md">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
