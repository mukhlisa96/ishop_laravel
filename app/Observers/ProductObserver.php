<?php

namespace App\Observers;

use App\Product;

class ProductObserver
{
    public function updating(Product $product)
    {
        $oldCount = $product->getOriginal('key');

        if ($oldCount == 0 && $product->count > 0) {
            Subscription::sendEmailBySubscription($product);
        }
    }
}
