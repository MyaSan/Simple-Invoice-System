@extends('layout.master')
@section('title','Invoice List')
@section('content')
<form method="post" action="<?= URL::to('invoice') ?>">
{{ csrf_field() }}
	<div class="container">
	<div class="section">
    <div class="field has-addons has-addons-left">
        <p class="control">
            <input type="text" class="input invoice_name" id="invoice_name" name="invoice_name">
        </p>
        <p class="control">
            <input class="button is-success" type="submit" id="search" value="Search">
        </p>
    </div>
    <div class="field has-addons has-addons-right">
        <p class="control">
            <a href="{{ url('/additem') }}" class="button is-success" type="submit">Add Invoice</a>
        </p>
    </div>
</form>
<form method="post">
    <table class="table is-bordered is-stripped">
        <thead>
            <tr>
                <th>Invoice name</th>
                <th>#of items</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	@foreach($invoicelist as $row)
        		<tr>
	                <td><a href="{{ URL::to('/updateitem/'.$row->invoice_id) }}" class="fa fa-user">{{ $row->invoice_name }}</a></td>
	                <td>{{ $row->item_count }}</td>
	                <td>{{ $row->total }}</td>
	                <td><a href="{{ URL::to('/pdfview/'.$row->invoice_id) }}">PDF</a>
	                <a href="{{ URL::to('/remove/'.$row->invoice_id) }}" onclick="SomeDeleteRowFunction(this)">Remove</a></td>
	            </tr>
        	@endforeach
        </tbody>
    </table>
    {{ $invoicelist->links() }}
    </div>
	</div>
</form>
@endsection