<?php

namespace App\Persister;

use Doctrine\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\ManagerRegistry;

abstract class AbstractPersister
{
    protected ObjectManager $objectManager;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->objectManager = $managerRegistry->getManager('default');
    }
}