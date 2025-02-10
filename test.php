<?php

interface DiscountStrategy {
    public function calculate($order);
}

class FirstTimeCustomerDiscount implements DiscountStrategy {
    public function calculate($order) {
        return $order->getTotal() * 0.10;  // 10% discount for first-time customers
    }
}

class LoyalCustomerDiscount implements DiscountStrategy {
    public function calculate($order) {
        return $order->getTotal() * 0.20;  // 20% discount for loyal customers
    }
}

class DiscountCalculator {
    private $strategy;

    public function __construct(DiscountStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function calculateDiscount($order) {
        return $this->strategy->calculate($order);
    }
}



