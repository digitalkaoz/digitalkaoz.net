<?php

namespace rs\kaoz4FrontBundle\DataFixtures\ORM;

class LoadNetworkData extends BaseFixtureLoader
{
    protected $file = '/../../Resources/fixtures/network_fixtures.yml';
    protected $orderno = 1;
    protected $cls = 'rs\kaoz4FrontBundle\Entity\Network';
}