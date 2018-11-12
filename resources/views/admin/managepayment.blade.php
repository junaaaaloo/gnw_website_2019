@extends('admin.template', ["context"=>"admin.manage.payments"])

@section('substyles')
<style>
    div#managepayments {
        min-height: calc(100vh - 321px);
    }
</style>
@endsection

@section('content')
<div id="managepayments" class = "brand page ui container">
    <h2>Manage Payments</h2>
    <p> Data with Red Highlight have the "Pending" status and 
    data with Gray highlight have the "Not Paid" status. <br>
    If the data with the "Not Paid" status have an OR, 
    it means that the input OR of the user have been rejected.
    </p>
    <form id = "filtersort" method="GET">
        <input name = "direction" type="hidden" value = "{{Request::get('direction')}}">
        <input name = "sort" type="hidden" value = "{{Request::get('sort')}}">
        <div class="ui action input">
            <input name = "filter" type="text" value="{{Request::get('filter')}}">
            <button type = "submit" class="ui button">
                <i class="icon search"> </i>
                Search
            </button>
        </div>
    </form>
    <table class="ui celled selectable padded sortable stackable table">
        <thead class="table-dark">
            <tr>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'created_at' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'created_at' ? 'sorted' : ''}} " data-column="created_at">Created At</th>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'idnum' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'idnum' ? 'sorted' : ''}} " data-column="idnum">ID Number</th>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'yearbookOR' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'yearbookOR' ? 'sorted' : ''}} " data-column="yearbookOR">Yearbook OR</th>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'isPartial' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'isPartial' ? 'sorted' : ''}} " data-column="isPartial">Partial Payment</th>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'photoOR' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'photoOR' ? 'sorted' : ''}} " data-column="photoOR">Photo OR</th>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'photoPackage' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'photoPackage' ? 'sorted' : ''}} " data-column="photoPackage">Photo Package</th>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'deliveryOR' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'deliveryOR' ? 'sorted' : ''}} " data-column="deliveryOR">Delivery OR</th>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'status' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'status' ? 'sorted' : ''}} " data-column="status">Status</th>
            </tr>
            
        </thead>
        <tbody>
            @foreach ($payments as $payment)
            <tr onclick = "accessPayment({{$payment}})">
                <td>{!! $payment->created_at !!}</td>
                <td>{!! $payment->idnum !!}</td>
                @if($payment->yearbookStatus === 0)
                    <td class="warning">{!! $payment->yearbookOR !!}</td>
                @elseif ($payment->yearbookStatus === -1)
                    <td class="negative">{!! $payment->yearbookOR !!}</td>
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
                    <td class="warning">{!! $payment->photoOR !!}</td>
                @elseif ($payment->photoStatus === -1)
                    <td class="negative">{!! $payment->photoOR !!}</td>
                @else
                    <td> {!! $payment->photoOR !!}</td>
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
        <tfoot>
            <tr>
                @if ($payments->count() == 0) 
                <th colspan = 8">
                    No results returned. 
                </th>
                @else
                <th colspan = 8">
                    {{ $payments->appends(["filter" => Request::get('filter'), "direction" => Request::get('direction'), "sort" => Request::get('sort')])->links('layouts.pagination')}} 
                </th>
                @endif
            </tr>
        </tfoot>
    </table>
</div>

<div id = "payment_modal" class="ui small modal">  
    <i class="close icon"></i> 
    <div class = "icon header">                    
        UPDATE PAYMENT
    </div>
    <div class="content"> 
        <form class = "ui large form" method="POST" action="{{ route('payment.status.update') }}">
            {{ csrf_field() }}
            <div class = "ui three fields">
                <div class="field">
                    <label for="yearbookStatus"> Yearbook </label>
                    <div id="yearbookStatus" class="ui dropdown selection">
                        <input type="hidden" name="yearbookStatus">
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
                                Not Paid
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label for="photoStatus"> Photo </label>
                    <div id="photoStatus" class="ui dropdown selection">
                        <input type="hidden" name="photoStatus">
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
                                Not Paid
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label for="deliveryStatus"> Delivery </label>
                    <div id="deliveryStatus" class="ui  dropdown selection">
                        <input type="hidden" name="deliveryStatus">
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
                                Not Paid
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="ui green button"> 
                <i class="icon credit card"></i>
                UPDATE PAYMENT 
            </button>
            @if ($errors->any())
            <div class="ui red message">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @endif
        </form>
    </div>
</div>
@endsection

@section('subscripts')
<script>    
$("th.header").on('click', (evt) => {
    let column = $(evt.target).data('column')
    let direction = $(evt.target).hasClass('ascending') ? "DESC" : "ASC"
    $('form#filtersort input[name="sort"]').val(column)
    $('form#filtersort input[name="direction"]').val(direction)
    $("form#filtersort").submit()
});


function accessPayment (payment) {
    $("#yearbookStatus").dropdown('set selected', payment.yearbookStatus)
    $("#photoStatus").dropdown('set selected', payment.photoStatus)
    $("#deliveryStatus").dropdown('set selected', payment.deliveryStatus)

    $("#payment_modal").modal('show')
}
</script>
@endsection
