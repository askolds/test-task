<?php

declare(strict_types=1);

namespace Askolds\Domain\ValueObject;


interface ValueObjectInterface
{
    /**
     * @return array
     */
    public static function getValidValues(): array;

    /**
     * @return string
     */
    public function getValue(): string;

    /**
     * @param ValueObjectInterface $valueObject
     *
     * @return bool
     */
    public function equals(ValueObjectInterface $valueObject): bool;
}