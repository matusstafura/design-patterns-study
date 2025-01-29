<?php

interface PaymentGateway
{
    public function pay(): void;
}

class BankTransfer implements PaymentGateway
{
    public function pay(): void
    {
        echo "Paid by bank transfer";
    }
}

class Card implements PaymentGateway
{
    public function pay(): void
    {
        echo "Paid by card";
    }
}

abstract class Checkout
{
    abstract protected function createPaymentGateway(): PaymentGateway;

    public function processPayment(): void
    {
        $paymentGateway = $this->createPaymentGateway();
        $paymentGateway->pay();
    }
}

class PayByBankTransfer extends Checkout
{
    protected function createPaymentGateway(): PaymentGateway
    {
        return new BankTransfer();
    }
}

class PayByCard extends Checkout
{
    protected function createPaymentGateway(): PaymentGateway
    {
        return new Card();
    }
}

function run(Checkout $checkout): void
{
    $checkout->processPayment();
}

run(new PayByBankTransfer());
run(new PayByCard());

