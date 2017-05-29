<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\InvoiceList;
use App\ItemList;
use PDF;

class InvoicelistController extends Controller
{
	//View Invoice list function
    public function index()
    {
        $invoicelist = InvoiceList::latest('invoice_id')->paginate(5);

        return view('invoice',['invoicelist' => $invoicelist]);
    }

    //Add new invoice function
    public function add(Request $request) {
    	
		$itemdata = $request->get('item_name');
		$no = count($itemdata);
		
		$insertdata = new InvoiceList;
    	$insertdata->invoice_name = request('invoice_name');
    	$insertdata->item_count = $no;
    	$insertdata->tax = request('tax');
    	$insertdata->total = request('total');
    	$insertdata->save();
		$ind = InvoiceList::latest('invoice_id')->first();
		$id = $ind->invoice_id;

    	$item = array();

    	for ($i=0; $i < $no ; $i++) {
    		$item[$i]['item_name'] = $request->get('item_name')[$i];
    		$item[$i]['items_no'] = $request->get('items_no')[$i];
    		$item[$i]['price'] = $request->get('price')[$i];
    		$item[$i]['invoice_id'] = $id;
    	}

    	ItemList::insert($item);

    	return redirect('/invoice');
    }

    //delete invoice function
    public function delete($invoice_id) {

    	InvoiceList::where('invoice_id', $invoice_id)->delete();

    	ItemList::where('invoice_id',$invoice_id)->delete();

        return redirect('invoice')->with('message','Delete Successful.');
    }

    //edit invoice function
    public function dataupdate($invoice_id) {

    	$inlist = InvoiceList::where('invoice_id',$invoice_id)->get();

    	$itlist = ItemList::where('invoice_id',$invoice_id)->get();
    	
    	return view('updateitem',compact('inlist','itlist'));
    }

    //update data invoice function
    public function updateitem(Request $request) {
    	$invoice_id = $request->get('invoice_id');

    	InvoiceList::where('invoice_id',$invoice_id)->update(array(
    		'invoice_name' => $request->get('invoice_name'),
    		'item_count' => count($request->get('item_name')),
    		'tax' => $request->get('tax'),
    		'total' => $request->get('total')
    		));

    	$checkdata = ItemList::where('invoice_id',$invoice_id)->first();

    	if(!is_null($checkdata)) {
    		ItemList::where('invoice_id',$invoice_id)->delete();
    	}

    	$items = array();

    	for ($i=0; $i < count(request()->get('item_name')) ; $i++) {
    		$items[$i]['item_name'] = $request->get('item_name')[$i];
    		$items[$i]['items_no'] = $request->get('items_no')[$i];
    		$items[$i]['price'] = $request->get('price')[$i];
    		$items[$i]['invoice_id'] = $request->get('invoice_id');
    	}

    	ItemList::insert($items);

    	return redirect('invoice');
    }

    //search function
    public function search(Request $request) {
    	$invoicename = $request->get('invoice_name');

    	if(isset($invoicename)) {
    		$invoicelist = InvoiceList::where('invoice_name','LIKE','%'.$invoicename.'%')->paginate(10);
    	} else {
			$invoicelist = InvoiceList::latest('invoice_id')->paginate(5);
    	}

    	return view('invoice', ['invoicelist' => $invoicelist]);
    }

    //pdf file download function
    public function pdfview($invoice_id) {
    	$indata = InvoiceList::where('invoice_id',$invoice_id)->get();

    	$itdata = ItemList::where('invoice_id',$invoice_id)->get();

        view()->share('indata',$indata);
        view()->share('itdata',$itdata);

        $pdf = \PDF::loadView('pdfview');
        return $pdf->download('viewpdf.pdf');

        return view('invoice');
    }

}
