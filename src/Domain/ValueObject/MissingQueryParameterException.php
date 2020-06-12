<?php
declare(strict_types=1);

namespace Askolds\Domain\ValueObject;

use RuntimeException;
use Throwable;

class MissingQueryParameterException extends RuntimeException
{

    /** @var string */
    private $missingParam;

    public function __construct(string $missingParam = "", $code = 0, Throwable $previous = null)
    {
        $this->missingParam = $missingParam;
        parent::__construct($this->buildMessage(), $code, $previous);
    }

    public function buildMessage(): string
    {
        return 'Parameter "' . $this->getMissingParam() . '" is missing in the query';
    }

    public function getMissingParam(): string
    {
        return $this->missingParam;
    }

}