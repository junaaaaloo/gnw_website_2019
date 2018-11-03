@extends('layouts.app')

@section('styles')
<style>
    .column {
        text-align: initial;
    }

    #contact_form .button {
        float: right;
    }

    .contact.item {
        margin: 5px 0px;
    }

    @media only screen and (max-height: 600px) {
        #contact_us {
            height: auto;
        }

        #contact_container {
            margin: 10px 0px;
        }
    }
    
</style>
@endsection

@section('content') 
<div id = "contact_us" class = "brand slide flex-center">
    <div id = "contact" class="ui basic segment">
        <div class="ui two column stackable grid">
            <div class="ten wide column" id = "contact_form">
                <h3 class = "brand istok_web"> Contact Form </h3>
                <p> We'd like to hear from you! Send us a message. </p>
                <form class="ui form">
                    <div class="field">
                        <label>Name</label>
                        <input type="text" name="name">
                    </div>
                    <div class="field">
                        <label>Subject</label>
                        <input type="text" name="subject">
                    </div>
                    <div class="field">
                        <label>Message</label>
                        <textarea rows = "3" type="text" name="message"></textarea>
                    </div>
                    <button class="ui green floated button" type="submit">
                        <i class="icon paper plane"></i>
                        Submit
                    </button>
                </form>
            </div>
            <div class="four wide column">
                <h1 class = "brand istok_web fitted"> GREEN & WHITE 2019 </h1>
                <h3 class = "brand istok_web fitted"> You can also contact us through here: </h3>
                <div class = "contact item">
                    <i class="icon location arrow"></i>
                    503-B Br. Gabriel Connon FSC Hall, 2401 Taft Avenue, De La Salle University, Manila, Philippines
                </div>
                <div class = "contact item">
                    <a class = "brand link inverted" href = "https://www.facebook.com/GnW2019"> 
                        <i class = "icon facebook"> </i>
                        Green and White 2019
                    </a> 
                </div>
                <div class = "contact item">
                    <a class = "brand link inverted" href = "mailto:gnw2019@gmail.com">
                        <i class = "icon envelope"> </i>
                        gnw2019@gmail.com 
                    </a>
                </div>
                <div class = "contact item">
                    <i class="icon phone"></i>
                    524-46-11 loc 205
                </div>


            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection