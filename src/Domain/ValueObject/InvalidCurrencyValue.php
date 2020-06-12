<?php
declare(strict_types=1);

namespace Askolds\Domain\ValueObject;


use Askolds\Domain\Currency\Currency;
use Throwable;

class InvalidCurrencyValue extends AbstractInvalidValueException
{

    /** @var Currency */
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