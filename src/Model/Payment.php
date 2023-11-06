<?php

namespace Nelson\Comex\Model;

interface Payment
{
    public function displayReceipt();
    public function processPayment(float $totalSpent);
}