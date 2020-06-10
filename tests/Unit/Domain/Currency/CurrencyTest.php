<?php
declare(strict_types=1);

namespace Askolds\Tests\Unit\Domain\Currency;

use Askolds\Domain\Currency\Currency;
use Askolds\Domain\ValueObject\InvalidCurrencyValue;
use Askolds\Tests\Unit\TestCase;

class CurrencyTest extends TestCase
{

    public function testThatCurrencyExceptionWillBeThrown(): void
    {
        try {
            new Currency('abc');
        } catch (InvalidCurrencyValue $exception) {
            $this->assertSame('"abc" is not a valid value for Currency. Valid values: EUR, GBP, USD.', $exception->getMessage());
        }
    }

    public function testEqual(): void
    {
        $currency1 = new Currency(Currency::EUR);
        $currency2 = new Currency(Currency::USD);

        $this->assertTrue($currency1->equals($currency1));
        $this->assertFalse($currency1->equals($currency2));
    }

    public function testValidValues(): void
    {
        $this->assertSame([Currency::EUR, Currency::GBP, Currency::USD], Currency::getValidValues());
    }

    public function testGetValue(): void
    {
        $currency1 = new Currency(Currency::EUR);
        $this->assertSame(Currency::EUR, $currency1->getValue());
    }

}