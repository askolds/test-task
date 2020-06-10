<?php
declare(strict_types=1);

namespace Askolds\Domain\Currency;

use Askolds\Domain\ValueObject\InvalidCurrencyValue;
use Askolds\Domain\ValueObject\ValueObjectInterface;

class Currency implements ValueObjectInterface
{
    public const  EUR = 'EUR';
    public const  GBP = 'GBP';
    public const  USD = 'USD';

    private $value;

    /**
     * Currency constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;

        if (!in_array($value, self::getValidValues(), true)) {
            throw new InvalidCurrencyValue($this);
        }
    }

    public static function getValidValues(): array
    {
        return [
            self::EUR,
            self::GBP,
            self::USD,
        ];
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function equals(ValueObjectInterface $valueObject): bool
    {
        return $this->getValue() === $valueObject->getValue();
    }

}