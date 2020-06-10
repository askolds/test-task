<?php


namespace Askolds\Domain\ValueObject;


use Askolds\Domain\Currency\Currency;
use Throwable;

class InvalidCurrencyValue extends AbstractInvalidValueException
{

    private $currency;

    public function __construct(Currency $currency, ?Throwable $previous = null)
    {
        $this->currency = $currency;
        parent::__construct($currency->getValue(), 0, $previous);

    }

    protected function getValueObjectClass(): ValueObjectInterface
    {
        return $this->currency;
    }
}