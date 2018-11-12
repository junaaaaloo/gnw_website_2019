@extends('layouts.app', ["context" => "welcome"])

@section('libraries')
    <script src="{{ asset('lib/particles.min.js') }}"> </script>
@endsection

@section('styles')
    <style>
        #title_container {
            height: auto;
            padding: 30px;
            background: var(--kombu-green);
            flex-direction: column;
            border-radius: 3px;
            transition: .5s;
        }
        
        #part_of_gnw {
            height: auto;
            padding: 50px 0px;
        }

        #part_of_gnw .background {
            background: var(--kombu-green)
        }

        #title .brand.action {
            width: 100%;
            margin: 5px 0px;
        }

        #steps {
            height: auto;
            padding: 50px 0px;
        }
        
        #steps .steps_container {
            padding: 0px 100px;
        }

        .step {
            display: flex;
            align-items: center;
            margin: 0px 20px;
        }

        .step img {
            width: 120px;
        }

        .step .image {
            margin: 20px;
        }

        .step .title {
            text-align: left;
            font-size: 30px;
        }

        .step .message {
            text-align: left;
            font-size: 20px;
        }

        @media only screen and (max-width: 767px) {
          #steps .steps_container {
                margin: 0px;
                padding: 0px;
            }
        }

        @media only screen and (max-height: 600px) {
            #title {
                height: auto;
            }
    
            #title_container {
                margin: 10px 0px;
            }
        }
    </style>
@endsection

@section('content') 
<div class = "brand slide" id="title">
    <div class = "background" id = "particles"> </div>
    <div class = "overlay"> </div>
    <div class = "content flex-center flex-column"> 
        <div id="title_container">
              <img src="{{ asset('img/white-logo-compact.png')}}" width=120px>
              <h1 class = "ui inverted header">
                  <span style="font-size: 40px; letter-spacing: 0px; line-height: 40px"> CAPTURING IMAGES OF <br> <span style="color: var(--gwgreen)"> LASALLIAN EXCELLENCE </span> </span>
              </h1>
              <h3 class = "ui inverted header">
                  The official yearbook publication of De La Salle University.
              </h3>
              <div class = "ui basic segment">
                  <button class = "ui login_button brand action white button">
                      LOGIN
                  </button>
                  <a href="{{ route('register') }}" class = "ui brand action green button">
                      BE A SUBSCRIBER
                  </a>
              </div>
              
        </div>
    </div>
</div>
<div class = "brand slide" id = "part_of_gnw">
    <div class = "background"> </div>
    <div class = "overlay"> </div>
    <div class = "content flex-center flex-column"> 
        <h1 class = "ui inverted header">
            <span style="font-size: 40px; letter-spacing: 0px; line-height: 40px"> 
                Be a <span style="color: var(--gwgreen)">part</span> of the <br> <span style="color: var(--gwgreen)"> Green </span> 
                <span style="background: linear-gradient(98deg, var(--gwgreen) 0%, white 70%);
                              -webkit-background-clip: text;
                              -webkit-text-fill-color: transparent;">&</span>
                White Yearbook <br>
                Join the Journey!
            </span>
        </h1>
    </div>
</div>
<div class = "brand slide" id = "steps">
    <div class = "background"> </div>
    <div class = "overlay"> </div>
    <div class = "content flex-center flex-column"> 
        <div class = "steps_container">
            <div class="step"> 
                <div class="image"> 
                    <img src = "{{asset('img/steps/1.png')}}">
                </div>
                <div class="content">
                    <h1 class = "title"> Registration </h1>
                    <p class = "message"> 
                        Initial process for becoming a subscriber of Green & White, the official DLSU Yearbook. 
                        <a href = "{{ route('register') }}" class = "brand link inverted"> Click here to register. </a>
                    </p>
                </div>
            </div>
            <div class="step"> 
                <div class="image"> 
                    <img src = "{{asset('img/steps/2.png')}}"> 
                </div>
                <div class="content">
                    <h1 class = "title"> Settling of Accounts </h1>
                    <p class = "message"> 
                    Paying your Green & White fees in order to settle your accounts and avoid further issues that may arise.
                    </p>
                </div>
            </div>
            <div class="step"> 
                <div class="image"> 
                    <img src = "{{asset('img/steps/3.png')}}"> 
                </div>
                <div class="content">
                    <h1 class = "title"> Pictorial </h1>
                    <p class = "message"> 
                    Choose from the different timeslots offered to you depending on your college. After Scheduling your Graduation Pictorial and being present on the assigned date to have your photos taken
                    </p>
                </div>
            </div>
            <div class="step"> 
                <div class="image"> 
                    <img src = "{{asset('img/steps/4.png')}}"> 
                </div>
                <div class="content">
                    <h1 class = "title"> Claiming of Photos </h1>
                    <p class = "message"> 
                    Once the printing of all subscriber's photos, you may claim them on release.
                    </p>
                </div>
            </div>
            <div class="step"> 
                <div class="image"> 
                    <img src = "{{asset('img/steps/5.png')}}"> 
                </div>
                <div class="content">
                    <h1 class = "title"> Claiming of Yearbook </h1>
                    <p class = "message"> 
                    After a year-long process for the Green & White, wait for your yearbook to be delivered to said delivery addresses of our subscribers
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

var config = {
    "particles": {
      "number": {
        "value": 80,
        "density": {
          "enable": true,
          "value_area": 800
        }
      },
      "color": {
        "value": "#294936"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#000000"
        },
        "polygon": {
          "nb_sides": 5
        }
      },
      "opacity": {
        "value": 1,
        "random": true,
        "anim": {
          "enable": true,
          "speed": 1.4617389821424212,
          "opacity_min": 0,
          "sync": false
        }
      },
      "size": {
        "value": 30,
        "random": true,
        "anim": {
          "enable": false,
          "speed": 4,
          "size_min": 0.3,
          "sync": false
        }
      },
      "line_linked": {
        "enable": true,
        "distance": 112.2388442605866,
        "color": "#294936",
        "opacity": 0.4,
        "width": 1.5
      },
      "move": {
        "enable": true,
        "speed": 1,
        "direction": "none",
        "random": true,
        "straight": false,
        "out_mode": "out",
        "bounce": false,
        "attract": {
          "enable": false,
          "rotateX": 600,
          "rotateY": 600
        }
      }
    },
    "interactivity": {
      "detect_on": "window",
      "events": {
        "onhover": {
          "enable": true,
          "mode": "bubble"
        },
        "onclick": {
          "enable": true,
          "mode": "repulse"
        },
        "resize": true
      },
      "modes": {
        "grab": {
          "distance": 400,
          "line_linked": {
            "opacity": 1
          }
        },
        "bubble": {
          "distance": 250,
          "size": 0,
          "duration": 2,
          "opacity": 0,
          "speed": 3
        },
        "repulse": {
          "distance": 400,
          "duration": 0.4
        },
        "push": {
          "particles_nb": 4
        },
        "remove": {
          "particles_nb": 2
        }
      }
    },
    "retina_detect": true
}

particlesJS("particles", config)
</script>
@endsection