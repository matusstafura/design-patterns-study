<?php

interface Shipping
{
    public function cost();
    public function description();
}

class Standard implements Shipping
{
    public function cost()
    {
        return 5;
    }
    public function description()
    {
        return "Standard shipping";
    }
}

abstract class ShippingDecorator implements Shipping
{
    public function __construct(protected Shipping $shipping)
    {
    }
    public function cost()
    {
        return $this->shipping->cost();
    }
    public function description()
    {
        return $this->shipping->description();
    }
}

class CashOnDelivery extends ShippingDecorator
{
    public function cost()
    {
        return parent::cost() + 2;
    }
    public function description()
    {
        return parent::description() . " with COD fee";
    }
}

$shipping = new Standard();
$cod = new CashOnDelivery($shipping);

echo $cod->description() . " costs " . $cod->cost();

