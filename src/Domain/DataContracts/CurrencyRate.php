<?php
declare(strict_types=1);

namespace Askolds\Domain\DataContracts;


use Askolds\Domain\Currency\Currency;

class CurrencyRate
{
    /** @var Currency */
    public $targetCurrency;
    /** @var string */
    public $baseCurrency;
    /** @var string */
    public $exchangeRate;

}