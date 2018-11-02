@extends('layouts.app')

@section('libraries')
    <script src="{{ asset('lib/particles.min.js') }}"> </script>
@endsection

@section('styles')
    <style>
        .brand.slide .background {
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            margin: 0;
            padding: 0;
            z-index: 0;
            position: absolute;
        }

        .flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .brand.slide {
            position: relative;
            display: block;
            margin: 0;
            padding: 0;
            display: flex;
            width: 100vw;
            height: 100vh;
        }

        .brand.slide .content {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            top: 0;
            left: 0;
            z-index: 1;
            position: absolute;
        }

    </style>
@endsection

@section('content') 
    <div class = "brand slide">
        <div class = "background" id = "particles"> </div>
        <div class = "content flex-center"> 
            <h2>
                <span style="color: var(--gwgreen)"> GREEN </span> 
                <span style="background: linear-gradient(98deg, var(--gwgreen) 0%, black 70%);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;">&</span>
                WHITE<br>
            <h2>
            <h1>
                <span style="font-size: 40px; letter-spacing: 0px; line-height: 40px"> CAPTURING IMAGES OF <br> <span style="color: var(--gwgreen)"> LASALLIAN EXCELLENCE </span> </span>
            </h1>
        </div>
    </div>
    <div class = "brand slide">
        <div class = "background" id = "particles"> </div>
        <div class = "content flex-center"> 
            <h2>
                <span style="color: var(--gwgreen)"> GREEN </span> 
                <span style="background: linear-gradient(98deg, var(--gwgreen) 0%, black 70%);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;">&</span>
                WHITE<br>
            <h2>
            <h1>
                <span style="font-size: 40px; letter-spacing: 0px; line-height: 40px"> CAPTURING IMAGES OF <br> <span style="color: var(--gwgreen)"> LASALLIAN EXCELLENCE </span> </span>
            </h1>
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