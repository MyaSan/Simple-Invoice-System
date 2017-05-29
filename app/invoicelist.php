<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoicelist extends Model
{
    protected $fillable = ['invoice_name','item_count','tax','total'];

    public function itemlist() {
    	return $this->hasMany(ItemList::class);
    }
}
