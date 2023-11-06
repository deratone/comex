<?php

namespace Nelson\Comex\Service;

class Shipping
{
    public static function isFreeShipping(float $cartTotal): bool {
        return $cartTotal > 100;
    }
}