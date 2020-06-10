<?php


namespace Askolds\Domain\ValueObject;


use Askolds\Domain\Product\Product;
use Throwable;

class InvalidProductValue extends AbstractInvalidValueException
{

    private $product;

    public function __construct(Product $product, ?Throwable $previous = null)
    {
        $this->product = $product;
        parent::__construct($product->getValue(), 0, $previous);

    }

    protected function getValueObjectClass(): ValueObjectInterface
    {
        return $this->product;
    }
}