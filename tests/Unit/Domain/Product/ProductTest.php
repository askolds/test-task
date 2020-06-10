<?php
declare(strict_types=1);

namespace Askolds\Tests\Unit\Domain\Product;

use Askolds\Domain\Product\Product;
use Askolds\Domain\ValueObject\InvalidProductValue;
use Askolds\Tests\Unit\TestCase;

class ProductTest extends TestCase
{

    public function testThatProductExceptionWillBeThrown(): void
    {
        try {
            new Product('abc');
        } catch (InvalidProductValue $exception) {
            $this->assertSame('"abc" is not a valid value for Product. Valid values: ECOM, POS.', $exception->getMessage());
        }
    }

    public function testEqual(): void
    {
        $product1 = new Product(Product::POS);
        $product2 = new Product(Product::ECOM);

        $this->assertTrue($product1->equals($product1));
        $this->assertFalse($product1->equals($product2));
    }

    public function testValidValues(): void
    {
        $this->assertSame([Product::ECOM, Product::POS], Product::getValidValues());
    }

    public function testGetValue(): void
    {
        $product1 = new Product(Product::POS);
        $this->assertSame(Product::POS, $product1->getValue());
    }

}