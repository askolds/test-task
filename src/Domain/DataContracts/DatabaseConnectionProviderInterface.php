<?php
declare(strict_types=1);

namespace Askolds\Domain\DataContracts;


use Aura\Sql\ExtendedPdo;

interface DatabaseConnectionProviderInterface
{

    /**
     * @return ExtendedPdo
     */
    public function getConnection(): ExtendedPdo;

}