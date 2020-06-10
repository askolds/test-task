<?php
declare(strict_types=1);

namespace Askolds\Tests\Unit\Domain\DataContracts;

use Askolds\Domain\DataContracts\BasicFilter;
use Askolds\Domain\Product\Product;
use Askolds\Tests\Unit\TestCase;
use DateTime;

class BasicFilterTest extends TestCase
{

    public function testFirstAndLastDayOfYear(): void
    {
        $from = new DateTime(date('Y') . '-01-01');
        $to = new DateTime(date('Y') . '-12-31');

        $products = [
            new Product('POS'),
            new Product('ECOM'),
        ];

        $basicFilter = new BasicFilter($from, $to, ...$products);

        $this->assertTrue($basicFilter->isFirstDayOfYear());
        $this->assertTrue($basicFilter->isLastDayOfYear());

    }

    public function testFirstAndLastDayOfMonth(): void
    {
        $from = new DateTime(date('Y-m') . '-01');
        $to = new DateTime(date('Y-m-t'));

        $products = [];

        $basicFilter = new BasicFilter($from, $to, ...$products);

        $this->assertTrue($basicFilter->isFirstDayOfMonth());
        $this->assertTrue($basicFilter->isLastDayOfMonth());
    }


}