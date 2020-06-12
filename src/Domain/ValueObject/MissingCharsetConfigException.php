<?php
declare(strict_types=1);

namespace Askolds\Domain\ValueObject;

use LogicException;
use Throwable;

class MissingCharsetConfigException extends LogicException
{

    /** @var string */
    private $dsn;

    public function __construct(string $dsn = "", $code = 0, Throwable $previous = null)
    {
        $this->dsn = $dsn;
        parent::__construct($this->buildMessage(), $code, $previous);
    }

    public function buildMessage(): string
    {
        return 'Parameter "charset" is missing in the dsn: "' . $this->dsn . '"';
    }

}