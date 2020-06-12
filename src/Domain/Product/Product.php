<?php
declare(strict_types=1);

namespace Askolds\Domain\Product;

use Askolds\Domain\ValueObject\InvalidProductValue;
use Askolds\Domain\ValueObject\ValueObjectInterface;

class Product implements ValueObjectInterface
{
    public const  ECOM = 'ECOM';
    public const  POS = 'POS';

    /** @var string */
    private $value;

    /**
     * Product constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;

        if (!in_array($value, self::getValidValues(), true)) {
            throw new InvalidProductValue($this);
        }
    }

    public static function getValidValues(): array
    {
        return [
            self::ECOM,
            self::POS,
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