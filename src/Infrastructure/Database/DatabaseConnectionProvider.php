<?php
declare(strict_types=1);

namespace Askolds\Infrastructure\Database;


use Askolds\Domain\DataContracts\DatabaseConnectionProviderInterface;
use Askolds\Domain\ValueObject\MissingCharsetConfigException;
use Aura\Sql\ExtendedPdo;

class DatabaseConnectionProvider implements DatabaseConnectionProviderInterface
{

    /** @var  ExtendedPdo */
    private $dbh;

    public function __construct(string $pdoDsn, string $username, string $password)
    {
        if (!strpos($pdoDsn, 'charset=')) {
            throw new MissingCharsetConfigException($pdoDsn);
        }

        $this->dbh = new ExtendedPdo($pdoDsn, $username, $password);
    }

    /**
     * @inheritDoc
     */
    public function getConnection(): ExtendedPdo
    {
        return $this->dbh;
    }
}