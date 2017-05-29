@extends('layout.master')
@section('title','Add Form')
@section('content')
<form method="post" action="<?= URL::to('save') ?>">
{{ csrf_field() }}
	<div class="container">
		<div class="section">
		<div class="field has-addons has-addons-left">
				<a href="<?= URL::to('invoice') ?>">Back</a>
			</div>
			<div class="field has-addons has-addons-left">
				<div class="field-label is-large">
					<label class="label">New Invoice</label>
				</div>
			</div>
			<div class="field has-addons has-addons-left">
				<div class="field-label">
					Invoice Name
				</div>
				<div class="field-body">
					<input class="input is-expanded" type="text" name="invoice_name" required>
				</div>
			</div>
			<div>
				<table class="table is-striped is-bordered">
					<thead>
						<tr>
							<th>Item Name</th>
							<th># of items</th>
							<th>Price</th>
							<th>Total</th>
							<th></th>
						</tr>
					</thead>
					<tbody class="authors-list">
						<tr>
							<td><input type="text" class="input item_name" required name="item_name[]" /></td>
					        <td><input type="text" class="input items_no" required name="items_no[]"  /></td>
					        <td><input type="text" class="input price" required name="price[]" /></td>
					        <td><input type="text" class="input item_total" required readonly name="item_total[]" /></td>
					        <td><input type="button" value="Delete Row" class="button is-primary" onclick="SomeDeleteRowFunction(this)"/></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div>
				<button class="button is-success" type="submit" id="add-author">Add Item</button>
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
						<input class="input is-expanded tax" id="tax" type="text" name="tax" required style="width:150px;">
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
				<button class="button is-success" type="submit">Create</button>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
$('body').delegate('.item_name,.items_no,.price,.item_total','keyup',function(){
          
    var tr=$(this).parent().parent();
    var num=tr.find('.items_no').val();
    var price=tr.find('.price').val();
    amount=num*price;
    tr.find('.item_total').val(amount);              
    subTotal();
});

$('body').delegate('.tax,.subtotal','keyup',function(){
   tax();
});

function subTotal(){ 
    var sub_t=0;
    $('.item_total').each(function(k,v){
       var subt=$(this).val()-0;            
        sub_t+=subt;               
    });
   
   $('.subtotal').val(sub_t);
   
} 
function tax(){
   var tax=$('.tax').val()-0;
   var s=$('.subtotal').val()-0;
   var taxsub=s + (tax * 0.01);
   $(".total").html(taxsub);
   $('.total').val(taxsub);
} 
</script>
@endsection