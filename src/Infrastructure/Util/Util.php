<?php
declare(strict_types=1);

namespace Askolds\Infrastructure\Util;


use Askolds\Domain\Currency\Currency;
use Askolds\Domain\Product\Product;
use Askolds\Domain\ValueObject\MissingQueryParameterException;

class Util
{

    /**
     * @param array $params
     *
     * @return Currency
     */
    public static function baseCurrencyFromRequestQuery(array $params): Currency
    {
        $currency = null;
        $hasValidCurrency = false;
        foreach ($params as $param) {
            if (in_array($param, Currency::getValidValues(), true)) {
                $currency = new Currency($param);
            }
        }

        if (!$hasValidCurrency) {
            throw new MissingQueryParameterException('Missing currency value');
        }

        return $currency;
    }

    /**
     * @param array $params
     *
     * @return Product[]
     */
    public static function productsFromRequestQuery(array $params): array
    {
        $products = [];
        foreach ($params as $param) {
            if (in_array($param, Product::getValidValues(), true)) {
                $products[] = new Product($param);
            }
        }

        return $products;
    }
}