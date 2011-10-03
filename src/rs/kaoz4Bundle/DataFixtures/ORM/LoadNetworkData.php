<?php

namespace rs\kaoz4Bundle\DataFixtures\ORM;

class LoadNetworkData extends BaseFixtureLoader
{
    protected $file = '/../../Resources/fixtures/network_fixtures.yml';
    protected $orderno = 1;
    protected $cls = 'rs\kaoz4Bundle\Entity\Network';
}