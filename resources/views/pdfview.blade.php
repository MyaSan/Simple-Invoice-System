<form method="post">
{{ csrf_field() }}
	@foreach($indata as $idlist)
		<div>
			<h2>New Invoice</h2>
		</div>
		<div class="field has-addons has-addons-left">
			<p>
				Invoice Name
				{{ $idlist->invoice_name }}
			</p>
		</div>
		<div>
			<table>
				<thead>
					<tr>
						<th>Item Name</th>
						<th># of items</th>
						<th>Price</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					@foreach($itdata as $ilist)
					<tr>
						<td>{{ $ilist->item_name }}</td>
				        <td>{{ $ilist->items_no }}</td>
				        <td>{{ $ilist->price }}</td>
				        <td>{{ $ilist->items_no * $ilist->price }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="field-label">
			Tax
		</div>
		<div class="field-body">
			{{ $idlist->tax }}
		</div>
		<div class="field-label">
				Total
		</div>
		 <div class="field-body">
				{{ $idlist->total }}
		</div>
		</div>
		@endforeach
</form>