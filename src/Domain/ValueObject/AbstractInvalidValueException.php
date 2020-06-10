<?php


namespace Askolds\Domain\ValueObject;

use InvalidArgumentException;
use Throwable;

abstract class AbstractInvalidValueException extends InvalidArgumentException
{

    private $value;

    public function __construct(string $value, int $code = 0, Throwable $previous = null)
    {
        $this->value = $value;
        parent::__construct($this->buildMessage(), $code, $previous);
    }

    abstract protected function getValueObjectClass(): ValueObjectInterface;


    public function buildMessage(): string
    {
        $validValues = $this->getValueObjectClass()::getValidValues();

        return '"' . $this->value . '" is not a valid value for ' . $this->getClassShortName() . '. Valid values: ' . implode(', ', $validValues) . '.';
    }


    public function getClassShortName(): string
    {
        $path = explode("\\", get_class($this->getValueObjectClass()));

        return array_pop($path);
    }


}


