<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Subscription extends Model
{
    protected $fillable = ['email', 'product_id'];
    public function scopeActiveByProductId($query, $productId){
    	return $query->where('active', 0)->where('product_id', $productId);
    }
    public function product(){
    	return $this->belongsTo(Product::class);
    }

    public function sendEmailBySubscription(Product $product){
    		$subscriptions = self::activeByProductId($product->id)->get();
    		foreach ($subscriptions as $subscription) {
    			Mail::to($subscription->email)->send(new SendSubscriptionMessage($product));
    			$subscription->status = 1;
    			$subscription->save();
    		}
    }
}
