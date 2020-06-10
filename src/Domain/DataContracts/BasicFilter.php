<?php
declare(strict_types=1);

namespace Askolds\Domain\DataContracts;


use Askolds\Domain\Product\Product;
use DateInterval;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;

class BasicFilter
{

    public const TIME_FORMAT = 'Y-m-d';

    public $from;
    public $to;

    public $previousFrom;
    public $previousTo;

    public $products;

    public function __construct(DateTimeInterface $from, DateTimeInterface $to, Product ...$products)
    {

        $this->from = (new DateTimeImmutable($from->format(self::TIME_FORMAT)))->setTime(0, 0, 0);
        $this->to = (new DateTimeImmutable($to->format(self::TIME_FORMAT)))->setTime(23, 59, 59);
        $this->products = $products;

        $this->calculatePreviousDates();

    }

    public function calculatePreviousDates(): void
    {
        if ($this->isSameYear() && $this->isFirstDayOfYear() && $this->isLastDayOfYear()) {
            $this->previousFrom = $this->from->sub(new DateInterval('P1Y'));
            $this->previousTo = $this->to->sub(new DateInterval('P1Y'));
        }

        if ($this->isSameMonth() && $this->isFirstDayOfMonth() && $this->isLastDayOfMonth()) {
            $this->previousFrom = $this->from->sub(new DateInterval('P1M'));
            $this->previousTo = $this->to->sub(new DateInterval('P1M'));
        }
    }

    public function isSameYear(): bool
    {
        return $this->from->format('Y') === $this->to->format('Y');
    }

    public function isFirstDayOfYear(): bool
    {
        $firstDayOfYear = (new DateTime(date("Y") . "-01-01"))->format(self::TIME_FORMAT);

        return $this->from->format(self::TIME_FORMAT) === $firstDayOfYear;
    }

    public function isLastDayOfYear(): bool
    {
        $lastDayOfYear = (new DateTime(date("Y") . "-12-31"))->format(self::TIME_FORMAT);

        return $this->to->format(self::TIME_FORMAT) === $lastDayOfYear;
    }

    public function isSameMonth(): bool
    {
        return $this->from->format('m') === $this->to->format('m');
    }

    public function isFirstDayOfMonth(): bool
    {
        $firstDayOfMonth = (new DateTime(date("Y-m") . "-01"))->format(self::TIME_FORMAT);

        return $this->from->format(self::TIME_FORMAT) === $firstDayOfMonth;
    }

    public function isLastDayOfMonth(): bool
    {
        $lastDayOfMonth = (new DateTime(date("Y-m-t")))->format(self::TIME_FORMAT);

        return $this->to->format(self::TIME_FORMAT) === $lastDayOfMonth;
    }

}