@extends('layouts.dashboard')

@section('stylesheets')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.green.css') }}" id="theme-stylesheet">
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('navbar')
<li>
    <a href="{{ route('home') }}"><i class="fa fa-home"></i><span>Home</span></a>
</li>
<li>
    <a href="{{ route('sub.basic') }}"><i class="fa fa-user"></i><span>Basic Information</span></a>
</li>
<li class="active">
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
        <span class="badge badge-primary">Coming Soon</span></span></a>
</li>
@endsection

@section('content')
<section class="updates section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h2 class="h5 display display">Payment Information</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">   
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="idn">Yearbook</label>
                                    @switch($payment->yearbookStatus)
                                        @case(1)
                                            <div class="alert alert-primary" role="alert">
                                                Status: Paid<br>
                                                OR: {{ $payment->yearbookOR }}<br>
                                                @if($payment->isPartial === "yes")
                                                    Is Partial: Yes
                                                @else
                                                    Is Partial: No
                                                @endif
                                                <br>
                                                Partial OR: {{ $payment->partialOR }}
                                            </div>
                                            <input type="text" class="form-control" placeholder="Yearbook OR" disabled required><br>
                                            <form method="POST" action="{{ route('payment.submit.yearbook') }}">
                                                {{ csrf_field() }}
                                                @if($payment->isPartial === "yes")
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="isPartial" value="partial" checked>Is this a partial payment?
                                                </label>
                                                <input type="text" class="form-control" placeholder="Partial OR" name="partialOR">
                                                @else
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="isPartial" value="partial">Is this a partial payment?
                                                </label>
                                                <input type="text" class="form-control" placeholder="Partial OR" name="partialOR" disabled>
                                                @endif
                                                <br>
                                                <button type="submit" class="btn btn-block btn-success">Update</button>
                                            </form>
                                            @break

                                        @case(-1)
                                            <div class="alert alert-primary" role="alert">
                                                Status: Not Paid<br>
                                                OR: {{ $payment->yearbookOR }}<br>
                                                @if($payment->isPartial === "yes")
                                                    Is Partial: Yes
                                                @else
                                                    Is Partial: No
                                                @endif
                                                <br>
                                                Partial OR: {{ $payment->partialOR }}
                                            </div>
                                            <form method="POST" action="{{ route('payment.submit.yearbook') }}">
                                                {{ csrf_field() }}
                                                <input type="text" class="form-control" placeholder="Yearbook OR" name="yearbookOR" required>
                                                <br>
                                                @if($payment->isPartial === "yes")
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="isPartial" value="partial" checked>Is this a partial payment?
                                                </label>
                                                <input type="text" class="form-control" placeholder="Partial OR" name="partialOR">
                                                @else
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="isPartial" value="partial">Is this a partial payment?
                                                </label>
                                                <input type="text" class="form-control" placeholder="Partial OR" name="partialOR" disabled>
                                                @endif
                                                <br>
                                                <button type="submit" class="btn btn-block btn-success">Update</button>
                                            </form>
                                            @break

                                        @case(0)
                                            <div class="alert alert-primary" role="alert">
                                                Status: Pending<br>
                                                OR: {{ $payment->yearbookOR }}<br>
                                                @if($payment->isPartial === "yes")
                                                    Is Partial: Yes
                                                @else
                                                    Is Partial: No
                                                @endif
                                                <br>
                                                Partial OR: {{ $payment->partialOR }}
                                            </div>
                                            <form method="POST" action="{{ route('payment.submit.yearbook') }}">
                                                {{ csrf_field() }}
                                                <input type="text" class="form-control" placeholder="Yearbook OR" name="yearbookOR" value="{{ $payment->yearbookOR }}">
                                                <br>
                                                @if($payment->isPartial === "yes")
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="isPartial" value="partial" checked>Is this a partial payment?
                                                </label>
                                                <input type="text" class="form-control" placeholder="Partial OR" name="partialOR">
                                                @else
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="isPartial" value="partial">Is this a partial payment?
                                                </label>
                                                <input type="text" class="form-control" placeholder="Partial OR" name="partialOR" disabled>
                                                @endif
                                                <br>
                                                <button type="submit" class="btn btn-block btn-success">Update</button>
                                            </form>
                                            @break
                                    @endswitch
                                </div>
                                <div class="col-lg-4">
                                    <label for="nde">Photo</label>
                                    @switch($payment->photoStatus)
                                        @case(1)
                                            <div class="alert alert-primary" role="alert">
                                                Status: Paid<br>
                                                OR: {{ $payment->photoOR }}<br>
                                                @if($payment->photoPackage === "a")
                                                Photo Package: Package A
                                                @elseif($payment->photoPackage === "b")
                                                Photo Package: Package B
                                                @elseif($payment->photoPackage === "c")
                                                Photo Package: Package C
                                                @elseif($payment->photoPackage === "d")
                                                Photo Package: Package D
                                                @else
                                                Photo Package:
                                                @endif
                                            </div>
                                            <input type="text" class="form-control" placeholder="Photo OR" disabled required>
                                            <form method="POST" action="{{ route('payment.submit.photo') }}">
                                                {{ csrf_field() }}
                                                <select class="form-control" id="package" name="package" required>
                                                    @if($payment->photoPackage === "a")
                                                    <option value="" disabled>Photo Package</option>
                                                    <option value="a" selected>Package A</option>
                                                    <option value="b">Package B</option>
                                                    <option value="c">Package C</option>
                                                    <option value="d">Package D</option>
                                                    @elseif($payment->photoPackage === "b")
                                                    <option disabled>Photo Package</option>
                                                    <option value="a">Package A</option>
                                                    <option value="b" selected>Package B</option>
                                                    <option value="c">Package C</option>
                                                    <option value="d">Package D</option>
                                                    @elseif($payment->photoPackage === "c")
                                                    <option value="" disabled>Photo Package</option>
                                                    <option value="a">Package A</option>
                                                    <option value="b">Package B</option>
                                                    <option value="c" selected>Package C</option>
                                                    <option value="d">Package D</option>
                                                    @elseif($payment->photoPackage === "d")
                                                    <option value="" disabled>Photo Package</option>
                                                    <option value="a">Package A</option>
                                                    <option value="b">Package B</option>
                                                    <option value="c">Package C</option>
                                                    <option value="d" selected>Package D</option>
                                                    @else
                                                    <option value="" disabled selected>Photo Package</option>
                                                    <option value="a">Package A</option>
                                                    <option value="b">Package B</option>
                                                    <option value="c">Package C</option>
                                                    <option value="d">Package D</option>
                                                    @endif
                                                </select>
                                                <br>
                                                <button type="submit" class="btn btn-block btn-success">Update</button>
                                            </form>
                                            @break

                                        @case(-1)
                                            <div class="alert alert-primary" role="alert">
                                                Status: Not Paid<br>
                                                OR: {{ $payment->photoOR }}<br>
                                                @if($payment->photoPackage === "a")
                                                Photo Package: Package A
                                                @elseif($payment->photoPackage === "b")
                                                Photo Package: Package B
                                                @elseif($payment->photoPackage === "c")
                                                Photo Package: Package C
                                                @elseif($payment->photoPackage === "d")
                                                Photo Package: Package D
                                                @else
                                                Photo Package:
                                                @endif
                                            </div>
                                            <form method="POST" action="{{ route('payment.submit.photo') }}">
                                                {{ csrf_field() }}
                                                <input type="text" class="form-control" placeholder="Photo OR" name="photoOR" required>
                                                <select class="form-control" id="package" name="package" required>
                                                    @if($payment->photoPackage === "a")
                                                    <option value="" disabled>Photo Package</option>
                                                    <option value="a" selected>Package A</option>
                                                    <option value="b">Package B</option>
                                                    <option value="c">Package C</option>
                                                    <option value="d">Package D</option>
                                                    @elseif($payment->photoPackage === "b")
                                                    <option disabled>Photo Package</option>
                                                    <option value="a">Package A</option>
                                                    <option value="b" selected>Package B</option>
                                                    <option value="c">Package C</option>
                                                    <option value="d">Package D</option>
                                                    @elseif($payment->photoPackage === "c")
                                                    <option value="" disabled>Photo Package</option>
                                                    <option value="a">Package A</option>
                                                    <option value="b">Package B</option>
                                                    <option value="c" selected>Package C</option>
                                                    <option value="d">Package D</option>
                                                    @elseif($payment->photoPackage === "d")
                                                    <option value="" disabled>Photo Package</option>
                                                    <option value="a">Package A</option>
                                                    <option value="b">Package B</option>
                                                    <option value="c">Package C</option>
                                                    <option value="d" selected>Package D</option>
                                                    @else
                                                    <option value="" disabled selected>Photo Package</option>
                                                    <option value="a">Package A</option>
                                                    <option value="b">Package B</option>
                                                    <option value="c">Package C</option>
                                                    <option value="d">Package D</option>
                                                    @endif
                                                </select>
                                                <br>
                                                <button type="submit" class="btn btn-block btn-success">Update</button>
                                            </form>
                                            @break

                                        @case(0)
                                            <div class="alert alert-primary" role="alert">
                                                Status: Pending<br>
                                                OR: {{ $payment->photoOR }}<br>
                                                @if($payment->photoPackage === "a")
                                                Photo Package: Package A
                                                @elseif($payment->photoPackage === "b")
                                                Photo Package: Package B
                                                @elseif($payment->photoPackage === "c")
                                                Photo Package: Package C
                                                @elseif($payment->photoPackage === "d")
                                                Photo Package: Package D
                                                @else
                                                Photo Package:
                                                @endif
                                            </div>
                                            <form method="POST" action="{{ route('payment.submit.photo') }}">
                                                {{ csrf_field() }}
                                                <input type="text" class="form-control" placeholder="Photo OR" name="photoOR" value="{{ $payment->photoOR }}" required>
                                                <select class="form-control" id="package" name="package" required>
                                                    @if($payment->photoPackage === "a")
                                                    <option value="" disabled>Photo Package</option>
                                                    <option value="a" selected>Package A</option>
                                                    <option value="b">Package B</option>
                                                    <option value="c">Package C</option>
                                                    <option value="d">Package D</option>
                                                    @elseif($payment->photoPackage === "b")
                                                    <option disabled>Photo Package</option>
                                                    <option value="a">Package A</option>
                                                    <option value="b" selected>Package B</option>
                                                    <option value="c">Package C</option>
                                                    <option value="d">Package D</option>
                                                    @elseif($payment->photoPackage === "c")
                                                    <option value="" disabled>Photo Package</option>
                                                    <option value="a">Package A</option>
                                                    <option value="b">Package B</option>
                                                    <option value="c" selected>Package C</option>
                                                    <option value="d">Package D</option>
                                                    @elseif($payment->photoPackage === "d")
                                                    <option value="" disabled>Photo Package</option>
                                                    <option value="a">Package A</option>
                                                    <option value="b">Package B</option>
                                                    <option value="c">Package C</option>
                                                    <option value="d" selected>Package D</option>
                                                    @else
                                                    <option value="" disabled selected>Photo Package</option>
                                                    <option value="a">Package A</option>
                                                    <option value="b">Package B</option>
                                                    <option value="c">Package C</option>
                                                    <option value="d">Package D</option>
                                                    @endif
                                                </select>
                                                <br>
                                                <button type="submit" class="btn btn-block btn-success">Update</button>
                                            </form>
                                            @break
                                    @endswitch
                                </div>
                                <div class="col-lg-4">
                                    <label for="nde">Delivery</label>
                                    @switch($payment->deliveryStatus)
                                        @case(1)
                                            <div class="alert alert-primary" role="alert">
                                                Status: Paid<br>
                                                OR: {{ $payment->deliveryOR }}
                                            </div>
                                            <input type="text" class="form-control" placeholder="Delivery OR" disabled required>
                                            <br>
                                            <button class="btn btn-block btn-success" disabled>Update</button>
                                            @break

                                        @case(-1)
                                            <div class="alert alert-primary" role="alert">
                                                Status: Not Paid<br>
                                                OR: {{ $payment->deliveryOR }}
                                            </div>
                                            <form method="POST" action="{{ route('payment.submit.delivery') }}">
                                                {{ csrf_field() }}
                                                <input type="text" class="form-control" placeholder="Delivery OR" name="deliveryOR" required>
                                                <br>
                                                <button type="submit" class="btn btn-block btn-success">Update</button>
                                            </form>
                                            @break

                                        @case(0)
                                            <div class="alert alert-primary" role="alert">
                                                Status: Pending<br>
                                                OR: {{ $payment->deliveryOR }}
                                            </div>
                                            <form method="POST" action="{{ route('payment.submit.delivery') }}">
                                                {{ csrf_field() }}
                                                <input type="text" class="form-control" placeholder="Delivery OR" name="deliveryOR" value="{{ $payment->deliveryOR }}" required>
                                                <br>
                                                <button type="submit" class="btn btn-block btn-success">Update</button>
                                            </form>
                                            @break
                                    @endswitch
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
@endsection
