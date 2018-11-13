@extends('layouts.app', ["context" => "about"])

@section('styles')
<style>
    div#about {
        margin: 40px 0px;
        min-height: calc(100vh - 335px);
    }

    .flex-column {
        margin: 50px 0px 50px 0px !important;
    }
	
	p {
		font-size: 18px;
	}

</style>
@endsection

@section('content') 
<div id = "about" class = "ui container">
    <h1> About Green & White </h1>
    <h1 class="ui horizontal divider header">
        HISTORY
    </h1>
    <div class="flex-center flex-column">
        <img src="{{ asset('img/logo.png') }}" width="200px" /><br>
        <p>
        Founded in 1924 as the first student organization of De La Salle College, Green & White came to be the official yearbook publication of DLSC in 1938. Over ninety years since its birth, we continue the legacy of capturing images of Lasallian excellence and providing the Lasallian community a testimonial of its brilliant history.
        </p>
    </div>
    <h1 class="ui horizontal divider header">
        WHAT WE DO?
    </h1>
    <div class="flex-center flex-column">
        <p>
        Green & White composes of seven (7) different committees subdivided into two: Non-Technical and Technical, all lead by its respective Section Heads. These Section Head are under to the Top 3 (Editor in Chief, Associate Editor, and Managing Editor). The Top 3 along with Section Heads made up Green & White’s Editorial Board.
        </p>
    </div>
    <div class="ui stackable centered grid">
		<div class="three column row">
			<div class = "column">
				<h2> 
					<i class = "icon user"> </i>
					Customer Care Committee 
				</h2>
				<p> Handles the concerns of the subscribers. Interacting and communicating with the subscribers, may it be through email, text messages, or personally. </p>
			</div>
			<div class = "column">
				<h2> <i class = "icon wpforms"> </i> Office Committee </h2>
				<p> Organizing and collecting all information of the subscribers through manual arranging and creating master lists. Responsible for the cleanliness and orderliness of the office, maintaining good atmosphere for the members, subscribers, and guests </p>

			</div>
			<div class = "column">
				<h2> <i class = "icon chart line"> </i> Marketing Committee </h2>
				<p> In charge of the publicity of Green &amp; White through announcement posts in social networking sites. Contacts different companies who might be interested in sponsoring and organizing events and other activities. </p>
			</div>
		</div>
		
		<div class = "four wide column">
			<h2> <i class = "icon newspaper outline"> </i> Layout Committee </h2>
			<p> Responsible for all designs related to Green &amp; White—from publicity posters to the whole yearbook. </p>
        </div>
        <div class = "four wide column">
        	<h2> <i class = "icon pencil"> </i> Literary Committee </h2>
			<p> Responsible for all literary pieces and contacting different important people in the university for their messages that would be published in the yearbook. Edits the write-ups of the subscribers before placing them in the yearbook. </p>

        </div>
        <div class = "four wide column">
			<h2> <i class = "icon photo"> </i> Photo Committee </h2>
			<p> Keeps track of the yearbook graduation pictorials and photo distribution, and contacting the photo suppliers. </p>
        </div>
        <div class = "four wide column">
			<h2> <i class = "icon code"> </i> Web Committee </h2>
			<p> Creates and maintains the official website of Green &amp; White. Makes sure that all data information of the subscribers are secured. </p>
        </div>
    </div>
    <h1 class="ui horizontal divider header">
        THE TEAM
    </h1>
    
    <div class="ui stackable centered grid">
        <div class = " center aligned eight wide column">
            <i class="icon massive user"> </i>
            <h1>Danielle Mari Sandrino
                <div class="class sub header">
                    <h3>Editor in Chief</h3>   
                </div>
            </h1>
        </div>
        <div class = " center aligned eight wide column">
            <i class="icon massive user"> </i>
            <h1>
                Priscila Marie Franco
                <div class="class sub header">
                    <h3>Associate Editor</h3>   
                </div>
            </h1>
        </div>
        <div class = " center aligned four wide column">
            <i class="icon massive user"> </i>
            <h1>
                Michael Jeffrey Chuaunsu
                <div class="class sub header">
                    <h3>Offfice Manager</h3>   
                </div>
            </h1>
        </div>
        <div class = " center aligned four wide column">
            <i class="icon massive user"> </i>
            <h1>
                Alaisa Amparo
                <div class="class sub header">
                    <h3>Customer Care Manager</h3>   
                </div>
            </h1>
        </div>
        <div class = " center aligned four wide column">
            <i class="icon massive user"> </i>
            <h1>
                Andrae Joseph Yap
                <div class="class sub header">
                    <h3>Photo Editor</h3>   
                </div>
            </h1>
        </div>
        <div class = " center aligned four wide column">
            <i class="icon massive user"> </i>
            <h1>
                Jonal Ray Ticug
                <div class="class sub header">
                    <h3>Web Manager</h3>   
                </div>
            </h1>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection