<?php

declare(strict_types=1);

use OutMart\PricingRules\Lay;
use PHPUnit\Framework\TestCase;

final class LayTest extends TestCase
{
    public function testTotalBasket(): void
    {
        $lay = new Lay;

        $lay->setTotal(100);

        $lay->rule(function ($attributes) {
            return ($attributes['total'] >= 100) ? true : false;
        }, function ($operations) {
            $total = $operations->getTotal();
            $total = $total * 0.9;
            $operations->setTotal($total);
        });

        $this->assertEquals($lay->getTotal(), 90);
    }

    public function testShippingMethodBasket(): void
    {
        $lay = new Lay;

        $lay->setTotal(100);
        $lay->setShippingMethod('COD');

        $lay->rule(function ($attributes) {
            return ($attributes['shipping_method'] == 'COD') ? true : false;
        }, function ($operations) {
            $total = $operations->getTotal();
            $total = $total * 0.9;
            $operations->setTotal($total);
        });

        $this->assertEquals($lay->getTotal(), 90);
    }

    public function testPaymentMethodBasket(): void
    {
        $lay = new Lay;

        $lay->setTotal(100);
        $lay->setPaymentMethod('PayPal');

        $lay->rule(function ($attributes) {
            return ($attributes['payment_method'] == 'PayPal') ? true : false;
        }, function ($operations) {
            $total = $operations->getTotal();
            $total = $total * 0.9;
            $operations->setTotal($total);
        });

        $this->assertEquals($lay->getTotal(), 90);
    }
}
