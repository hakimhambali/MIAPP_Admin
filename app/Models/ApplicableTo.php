<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicableTo extends Model
{
    use HasFactory;

    protected $table = 'applicable_to_';

    protected $fillable = [
        'product_id',
        'offer_id'
    ];

    // //get PK from Offer
    // public function applyOffer()
	// {
 	// 	return $this->belongsToMany('App\Models\Offer');
	// }

    // //get PK from Product
    // public function applyProduct()
	// {
 	// 	return $this->belongsToMany('App\Models\Product');
	// }
}