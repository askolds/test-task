<?php
declare(strict_types=1);

namespace Askolds\Infrastructure\Database;


use Askolds\Domain\DataContracts\DatabaseConnectionProviderInterface;
use Aura\Sql\ExtendedPdo;
use PDO;

class DatabaseConnectionFromPdoProvider implements DatabaseConnectionProviderInterface
{

    /** @var  ExtendedPdo */
    private $dbh;

    /**
     * DatabaseConnectionFromPdoProvider constructor.
     *
     * @param PDO|ExtendedPdo $pdo
     */
    public function __construct($pdo)
    {
        if (!($pdo instanceof ExtendedPdo)) {
            $this->dbh = new DatabaseConnectionProvider('dsn', 'username', 'password');
        }
    }

    /**
     * @inheritDoc
     */
    public function getConnection(): ExtendedPdo
    {
        return $this->dbh;
    }
}


