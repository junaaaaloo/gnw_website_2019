@extends('layouts.dashboard')

@section('stylesheets')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
<link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/style.green.css') }}" id="theme-stylesheet">
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/admindb.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('navbar')
<li>
	<a href="{{ route('home') }}"><i class="fa fa-home"></i><span>Home</span></a>
</li>
<li> 
    <a href="#sub-list" data-toggle="collapse" aria-expanded="false"><i class="fa fa-users"></i><span>Subscriber</span>
    <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
    <ul id="sub-list" class="collapse list-unstyled">
        <li> <a href="{{ route('admin.manage.regid') }}">Manage Registered IDs</a></li>
        <li> <a href="{{ route('admin.manage.subs') }}">Manage Subscribers</a></li>
        <li class="active"> <a href="{{ route('admin.manage.payments') }}">Manage Payment</a></li>
        <li> <a href="{{ route('admin.manage.pictorial') }}">Manage Pictorial</a></li>
    </ul>
</li>
<li> 
    <a href="#announcement-list" data-toggle="collapse" aria-expanded="false"><i class="fa fa-paper-plane-o"></i><span>News</span>
    <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
    <ul id="announcement-list" class="collapse list-unstyled">
        <li> <a href="{{ route('admin.create') }}">Add News</a></li>
        <li> <a href="{{ route('admin.manage.news') }}">Manage News</a></li>
    </ul>
</li>
@if ($role === "Administrator")
<li> 
    <a href="#admin-list" data-toggle="collapse" aria-expanded="false"><i class="fa fa-group"></i><span>Admin</span>
    <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
    <ul id="admin-list" class="collapse list-unstyled">
        <li> <a href="{{ route('admin.manage.admin') }}">Manage Admin Accounts</a></li>
    </ul>
</li>
@endif
@endsection

@section('content')
<section class="dashboard-header section-padding">
    <div class="container-fluid">
        <h1>Manage Payment</h1>
        <small class="form-text text-muted">Data with Red Highlight have the "Pending" status and data with Gray highlight have the "Not Paid" status. <br>If the data with the "Not Paid" status have an OR, it means that the input OR of the user have been rejected.</small>
        <br>
        <table id="paymentTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="table-dark">
                <tr>
                    <th>ID Number</th>
                    <th>Yearbook OR</th>
                    <th>Partial Payment</th>
                    <th>Photo OR</th>
                    <th>Photo Package</th>
                    <th>Delivery OR</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                <tr class="payment-row" data-id="{!! $payment->idnum !!}" data-ybstatus="{!! $payment->yearbookStatus !!}" data-pstatus="{!! $payment->photoStatus !!}" data-dstatus="{!! $payment->deliveryStatus !!}">
                    <td>{!! $payment->idnum !!}</td>
                    @if($payment->yearbookStatus === 0)
                        <td class="payment-pending">{!! $payment->yearbookOR !!}</td>
                    @elseif ($payment->yearbookStatus === -1)
                        <td class="payment-none">{!! $payment->yearbookOR !!}</td>
                    @else
                        <td>{!! $payment->yearbookOR !!}</td>
                    @endif

                    @if($payment->isPartial === "yes")
                        <td>Yes</td>
                    @elseif($payment->isPartial === "no")
                        <td>No</td>
                    @else
                        <td>-</td>
                    @endif

                    @if($payment->photoStatus === 0)
                        <td class="payment-pending">{!! $payment->photoOR !!}</td>
                    @elseif ($payment->photoStatus === -1)
                        <td class="payment-none">{!! $payment->photoOR !!}</td>
                    @else
                        <td>{!! $payment->photoOR !!}</td>
                    @endif

                    @if($payment->photoPackage === "a" || $payment->photoPackage === "b" || $payment->photoPackage === "c")
                        <td>{!! $payment->photoPackage !!}</td>
                    @else
                        <td>-</td>
                    @endif

                    @if($payment->deliveryStatus === 0)
                        <td class="payment-pending">{!! $payment->deliveryOR !!}</td>
                    @elseif ($payment->deliveryStatus === -1)
                        <td class="payment-none">{!! $payment->deliveryOR !!}</td>
                    @else
                        <td>{!! $payment->deliveryOR !!}</td>
                    @endif
                    
                    @switch($payment->status)
                        @case(1)
                            <td>Paid</td>
                            @break

                        @case(-1)
                            <td>Not Paid</td>
                            @break

                        @case(0)
                            <td>Partial</td>
                            @break
                    @endswitch
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="paymentsModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" action="{{ route('payment.status.update') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="ybstatus" class="col-sm-2 col-form-label">Yearbook</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="yearbookStatus" id="ybstatus">
                                <option value="1">Paid</option>
                                <option value="0" disabled="true">Pending</option>
                                <option value="-1">Not Paid</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pstatus" class="col-sm-2 col-form-label">Photo</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="photoStatus" id="pstatus">
                                <option value="1">Paid</option>
                                <option value="0" disabled="true">Pending</option>
                                <option value="-1">Not Paid</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dstatus" class="col-sm-2 col-form-label">Delivery</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="deliveryStatus" id="dstatus">
                                <option value="1">Paid</option>
                                <option value="0" disabled="true">Pending</option>
                                <option value="-1">Not Paid</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idnum" id="idnum">
                    <button type="submit" class="btn btn-primary">Update Status</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@section('javascripts')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"> </script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/front.js') }}"></script>
<script src="{{ asset('js/admindb.js') }}"></script>
@endsection
