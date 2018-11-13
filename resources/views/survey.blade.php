@extends('layouts.app', ["context" => "survey"])

@section('styles')
<style>
div#survey_page {
    margin: 50px 0px 100px 0px;
    min-height: calc(100vh - 405px);
}
</style>
@endsection

@section('content')
<div id="survey_page" class="page brand ui container">
    <h2 class="ui header">Survey</h2>
    <p>
        Kindly indicate your level of agreement or disagreement to each statement by choosing 
        the number that represents your opinion.
        <br>
        <small> 
            1 being the LOWEST and 5 being the HIGHEST
        </small>
    </p>
    <form action="{{route('survey.submit')}}" method = "POST" class = "ui form">
        {{ csrf_field() }}
        <div class="field">
            <label for="q1"> 1. I know that Green &amp; White is an organization of DLSU.</label>
            <div class="inline fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q1" value = "5" tabindex="0" class="hidden">
                        <label>5</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q1" value = "4" tabindex="0" class="hidden">
                        <label>4</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q1" value = "3" tabindex="0" class="hidden">
                        <label>3</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q1" value = "2" tabindex="0" class="hidden">
                        <label>2</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q1" value = "1" tabindex="0" class="hidden">
                        <label>1</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <label for="q2"> 2. I know that Green &amp; White is part of the Student Media organizations.</label>
            <div class="inline fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q2"   value = "5" tabindex="0" class="hidden">
                        <label>5</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q2"  value = "4" tabindex="0" class="hidden">
                        <label>4</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q2"  value = "3" tabindex="0" class="hidden">
                        <label>3</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q2"  value = "2" tabindex="0" class="hidden">
                        <label>2</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q2"  value = "1" tabindex="0" class="hidden">
                        <label>1</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <label for="q3"> 3. I know that Green &amp; White is the   official yearbook organization of DLSU.</label>
            <div class="inline fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q3" value = "5" tabindex="0" class="hidden">
                        <label>5</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q3" tabindex="0"  value = "4"  class="hidden">
                        <label>4</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q3" tabindex="0"  value = "3"  class="hidden">
                        <label>3</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q3" tabindex="0"  value = "2"  class="hidden">
                        <label>2</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <in value = "1" put type="radio" name="q3" tabindex="0"  class="hidden">
                        <label>1</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="field" >
            <label class ="ui eight column" for="q4"> 4. I know the yearbook process of Green &amp; White.</label>
            <div class="inline fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q4"  value = "5" tabindex="0" class="hidden">
                        <label>5</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q4" value = "4" tabindex="0" class="hidden">
                        <label>4</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q4" value = "3" tabindex="0" class="hidden">
                        <label>3</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q4" value = "2" tabindex="0" class="hidden">
                        <label>2</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q4" value = "1" tabindex="0" class="hidden">
                        <label>1</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <label class ="ui eight column" for="q5"> 5. I always get informed by the organization when they have announcements.</label>
            <div class="inline fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q5"  tabindex="0"  value = "5" class="hidden">
                        <label>5</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q5" tabindex="0" value = "4" class="hidden">
                        <label>4</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q5" tabindex="0" value = "3" class="hidden">
                        <label>3</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q5" tabindex="0" value = "2" class="hidden">
                        <label>2</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q5" tabindex="0" value = "1" class="hidden">
                        <label>1</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <label class ="ui eight column" for="q6"> 6. The Facebook page of Green &amp; White is an effective tool in disseminating information.</label>
            <div class="inline fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q6"  tabindex="0"   value = "5" class="hidden">
                        <label>5</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q6" tabindex="0" value = "4"  class="hidden">
                        <label>4</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q6" tabindex="0" value = "3"  class="hidden">
                        <label>3</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q6" tabindex="0" value = "2"  class="hidden">
                        <label>2</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q6" tabindex="0" value = "1"  class="hidden">
                        <label>1</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <label class ="ui eight column" for="q7"> 7. My college is well informed about the yearbook processes of Green &amp; White.</label>
            <div class="inline fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q7"   value = "5"  tabindex="0" class="hidden">
                        <label>5</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q7" value = "4"  tabindex="0" class="hidden">
                        <label>4</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q7" value = "3"  tabindex="0" class="hidden">
                        <label>3</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q7" value = "2"  tabindex="0" class="hidden">
                        <label>2</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q7" value = "1"  tabindex="0" class="hidden">
                        <label>1</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <label class ="ui eight column" for="q8"> 8. The staffers are very helpful in giving out information in terms of the yearbook processes.</label>
            <div class="inline fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q8"   value = "5"  tabindex="0" class="hidden">
                        <label>5</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q8" value = "4"  tabindex="0" class="hidden">
                        <label>4</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q8" value = "3"  tabindex="0" class="hidden">
                        <label>3</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q8" value = "2"  tabindex="0" class="hidden">
                        <label>2</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q8" value = "1"  tabindex="0" class="hidden">
                        <label>1</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <label class ="ui eight column" for="q9"> 9. The organization is very systematic in sharing online pubs.</label>
            <div class="inline fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q9" value = "5" tabindex="0" class="hidden">
                        <label>5</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q9" value = "4" tabindex="0" class="hidden">
                        <label>4</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q9" value = "3" tabindex="0" class="hidden">
                        <label>3</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q9" value = "2" tabindex="0" class="hidden">
                        <label>2</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q9" value = "1" tabindex="0" class="hidden">
                        <label>1</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <label for="q10" class="col-sm-10 col-form-label lbl">10. I understand every statement that the organization is trying to inform the students about.</label>
            <div class="inline fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q10" value = "5" tabindex="0" class="hidden">
                        <label>5</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q10" value = "4" tabindex="0" class="hidden">
                        <label>4</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q10" value = "3" tabindex="0" class="hidden">
                        <label>3</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q10" value = "2" tabindex="0" class="hidden">
                        <label>2</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="q10" value = "1" tabindex="0" class="hidden">
                        <label>1</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <label for="q11">11. Social Media Use</label>
            <div class="grouped fields">
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" name="Facebook" value="Facebook">
                        <label>Facebook</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" name="Twitter" value="Twitter">
                        <label>Twitter</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" name="Instagram" value="Instagram">
                        <label>Instagram</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" name="Youtube" value="Youtube">
                        <label>Youtube</label>
                    </div>
                </div>
                <div class="inline field">
                    <div class="ui checkbox">
                        <input id = "other_button" class="form-check-input" type="checkbox" name="other" value="other">
                        <label>Others</label>
                    </div>
                    <input id = "other_field" name="otherbox" type="text" placeholder="other" class="form-control" disabled>
                </div>
            </div>
        </div>
        <div class="field">
            <label for="q12" class="col-sm-3 col-form-label lbl">12. Class Building</label>
            <div class="grouped fields">
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" name="ls" value="ls">
                        <label>LS Hall</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" name="yuch" value="yuch">
                        <label>Yuchengco Building</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" name="joseph" value="joseph">
                        <label>St. Joseph Hall</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" name="miguel" value="miguel">
                        <label>Miguel Hall</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" name="mutien" value="mutien">
                        <label>Mutien Marie Building</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" name="william" value="william">
                        <label>William Hall</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" name="velasco" value="velasco">
                        <label>Velasco Building</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" name="strc" value="strc">
                        <label>STRC</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" name="andrew" value="andrew">
                        <label>Bro. Andrew Gonzales Building</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" name="razon" value="razon">
                        <label>E. Razon Sports Complex</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" name="gokongwei" value="gokongwei">
                        <label>Gokongwei Building</label>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
        <div class="ui red message" role="alert">
            @foreach ($errors->all() as $error)
                - {{ $error }} <br>
            @endforeach
        </div>
        @endif
        <button type="submit" class="ui right floated green button">Submit &nbsp; <i class="icon paper plane"></i></button>
    </form>
</div>
@endsection

@section('scripts')
<script>
var other = true;
$("#other_button").click(() => {
    other = !other;
    $("#other_field").attr('disabled', other)
    $("#other_field").val("")
})
</script>
@endsection
