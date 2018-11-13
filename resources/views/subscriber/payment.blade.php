@extends('subscriber.template', ['context' => 'subscriber.payment_info'])

@section('subsections')

@endsection
@section('substyles')
<style>
    div#payment_info {
        min-height: calc(100vh - 332px);
    }
</style>
@endsection

@section('subcontent')
<div id = "payment_info" class = "ui brand page container">
    <h2 class = "ui header">
        Payment Information
    </h2>
    <div class="ui centered  cards">
        <div class="centered card">
            <div class="content">
                <div class="header"> Yearbook </div>
                <form method = "POST" class = "ui form" action = "{{ route('payment.submit.yearbook')}}">
                    {{csrf_field()}}
                    <div class="field">
                        <label for="yearbookStatus"> Status </label>
                        <div class="ui disabled dropdown selection">
                            <input type="hidden" name="yearbookStatus" value = "{{ $payment->yearbookStatus }}">
                            <div class="text"> </div>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <div class="item" data-value="1"> 
                                    <i class="icon green check"> </i>
                                    Paid
                                </div>
                                <div class="item" data-value="0">
                                    <i class="icon yellow clock"> </i>
                                    Pending
                                </div>
                                <div class="item" data-value="-1">
                                    <i class="icon red times"> </i>
                                    Not yet Paid
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label for="yearbookOR"> Yearbook OR# </label>
                        <input type="text" type = "text" name="yearbookOR" value = "{{$payment->yearbookOR}}">
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" value = "{{$payment->isPartial === 'yes'}}">
                            <label>Is this partial payment?</label>
                        </div>
                    </div>
                    <div class="field">
                        <label for="partialOR"> Partial OR# </label>
                        <input type="text" type = "text" placeholder="Partial OR#" value = "{{$payment->partialOR}}">
                    </div>
                    <button class="ui right floated green button">
                        <i class="icon save"></i>
                        Update
                    </button>
                </form>
            </div>
        </div>
        <div class="centered card">
            <div class="content">
                <div class="header"> Photo </div>
                <form method = "POST" class = "ui form" action = "{{ route('payment.submit.photo')}}">
                    {{csrf_field()}}
                    <div class="field">
                        <label for="photoStatus"> Status </label>
                        <div class="ui disabled dropdown selection">
                            <input type="hidden" name="photoStatus" value = "{{ $payment->photoStatus }}">
                            <div class="text"> </div>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <div class="item" data-value="1"> 
                                    <i class="icon green check"> </i>
                                    Paid
                                </div>
                                <div class="item" data-value="0">
                                    <i class="icon yellow clock"> </i>
                                    Pending
                                </div>
                                <div class="item" data-value="-1">
                                    <i class="icon red times"> </i>
                                    Not yet Paid
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label for="photoOR"> Photo OR# </label>
                        <input type="text" type = "text" name="photoOR" value = "{{$payment->photoOR}}">
                    </div>
                    <div class="field">
                        <label for="photoPackage"> Photo Package </label>
                        <div class="ui disabled dropdown selection">
                            <input type="hidden" name="photoPackage" value = "{{ $payment->photoPackage }}">
                            <div class="text"> </div>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <div class="item" data-value="a"> 
                                    Package A
                                </div>
                                <div class="item" data-value="b">
                                    Package B
                                </div>
                                <div class="item" data-value="c">
                                    Package C
                                </div>
                                <div class="item" data-value="d">
                                    Package D
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="ui right floated green button">
                        <i class="icon save"></i>
                        Update
                    </button>
                </form>
            </div>
        </div>
        <div class="centered card">
            <div class="content">
                <div class="header"> Delivery </div>
                <form method = "POST" class = "ui form" action = "{{ route('payment.submit.delivery')}}">
                    {{csrf_field()}}
                    <div class="field">
                        <label for="deliveryStatus"> Status </label>
                        <div class="ui disabled dropdown selection">
                            <input type="hidden" name="deliveryStatus" value = "{{ $payment->deliveryStatus }}">
                            <div class="text"> </div>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <div class="item" data-value="1"> 
                                    <i class="icon green check"> </i>
                                    Paid
                                </div>
                                <div class="item" data-value="0">
                                    <i class="icon yellow clock"> </i>
                                    Pending
                                </div>
                                <div class="item" data-value="-1">
                                    <i class="icon red times"> </i>
                                    Not yet Paid
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label for="deliveryOR"> Delivery OR# </label>
                        <input type="text" type = "text" name="deliveryOR" value = "{{$payment->deliveryOR}}">
                    </div>
                    <button class="ui right floated green button">
                        <i class="icon save"></i>
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('subscripts')

@endsection
