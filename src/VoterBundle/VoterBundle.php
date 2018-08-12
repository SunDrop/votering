<?php

namespace VoterBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VoterBundle extends Bundle
{
    public function boot()
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $conn = $em->getConnection();
        $conn->getDatabasePlatform()
            ->registerDoctrineTypeMapping('enum', 'string');

        parent::boot();
    }

}
