@extends('layout.master')
@section('title','Update Form')
@section('content')
<form method="post" action="<?= URL::to('update') ?>">
{{ csrf_field() }}
	<div class="container">
		<div class="section">
			<div class="field has-addons has-addons-left">
				<a href="<?= URL::to('invoice') ?>">Back</a>
			</div>
		@foreach($inlist as $idlist)
			<div class="field has-addons has-addons-right">
				<div class="field-label is-large">
					<label class="label">Edit Invoice</label>
				</div>
			</div>
			<div class="field has-addons has-addons-right">
				<div class="field-label">
					Invoice Name
				</div>
				<div class="field-body">
					<input type="hidden" name="invoice_id" value="{{ $idlist->invoice_id }}">
					<input class="input is-expanded" type="text" name="invoice_name" value="{{ $idlist->invoice_name }}" required>
				</div>
			</div>
			<div>
				<table class="table is-bordered is-striped">
					<thead>
						<tr>
							<th>Item Name</th>
							<th># of items</th>
							<th>Price</th>
							<th>Total</th>
							<th></th>
						</tr>
					</thead>
					<tbody class="authors-list1">
						@foreach($itlist as $ilist)
						<tr class="trclass">
							<td><input type="text" class="input" name="item_name[]" required value="{{ $ilist->item_name }}" /></td>
					        <td><input type="text" class="input val1" name="items_no[]" required onkeyup="add()" value="{{ $ilist->items_no }}" /></td>
					        <td><input type="text" class="input val2" onkeyup="add()" required name="price[]" value="{{ $ilist->price }}" /></td>
					        <td><input type="text" class="input plus"  name="item_total[]" required value="{{ $ilist->items_no * $ilist->price }}" readonly /></td>
					        <td><input type="button" value="Delete Row" class="button is-primary" onclick="SomeDeleteRowFunction(this)"/></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div>
				<button class="button is-success" type="submit" id="add-author1">Add Item</button>
			</div>
			<div class="field">
				<div class="field-body">
					<div class="field has-addons has-addons-right">
						<div class="field-label">Sub Total</div>
					    <input class="input subtotal" type="text" id="subtotal" name="subtotal" required readonly style="width:150px;">
					</div>
				</div>
			</div>
			<div class="field">
				<div class="field-body">
					<div class="field has-addons has-addons-right">
						<div class="field-label">Tax</div>
						<input class="input is-expanded tax" id="tax" value="{{ $idlist->tax }}" type="text" name="tax" required style="width:150px;">
					</div>
				</div>
			</div>
			<div class="field">
				<div class="field-body">
					<div class="field has-addons has-addons-right">
						<div class="field-label">  Total </div>
						<input class="input total" type="text" id="total" required name="total" readonly style="width:150px;">
					</div>
				</div>
			</div>
			<div>
				<button class="button is-success" type="submit">Update</button>	
			</div>
			@endforeach
		</div>
	</div>
</form>
<script type="text/javascript">
function add() {
    var mult = 0;
    $("tr.trclass").each(function () {
        var val1 = $('.val1', this).val();
        var val2 = $('.val2', this).val();
        var total = (val1 * val2 );
      
        $('.plus',this).val(total);
        mult += total;
    });

    $("#subtotal").text(mult);
    $('#subtotal').val(mult);  
    tax();
}

$('body').delegate('.tax','keyup',function(){
   tax();
});

function tax(){
   var tax=$('.tax').val()-0;
   var s=$('.subtotal').val()-0;
   var taxsub=s + (tax * 0.01);
   $("#total").html(taxsub);
   $('#total').val(taxsub);
} 
add();
</script>
@endsection