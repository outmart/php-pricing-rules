<?php

namespace OutMart\PricingRules;

class Lay
{
    private int $total;
    private string $shippingMethod;
    private string $paymentMethod;

    /**
     * Get the value of total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * Get the value of shipping_method
     */
    public function getShippingMethod()
    {
        return $this->shippingMethod;
    }

    /**
     * Set the value of shipping_method
     *
     * @return  self
     */
    public function setShippingMethod($shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;
    }

    /**
     * Get the value of paymentMethod
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Set the value of paymentMethod
     *
     * @return  self
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * Set the value of paymentMethod
     *
     * @return  self
     */
    public function rule(callable $case, callable $acion = null)
    {
        $attributes = [
            'total' => $this->total,
            'shipping_method' => $this->shippingMethod,
            'payment_method' => $this->paymentMethod,
        ];

        if ($case($attributes) && $acion) {
            $acion($this);
        }
    }
}
