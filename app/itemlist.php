<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class itemlist extends Model
{
    public function invoicelist() {
    	return $this->belongsTo(InvoiceList::class);
    }
}
