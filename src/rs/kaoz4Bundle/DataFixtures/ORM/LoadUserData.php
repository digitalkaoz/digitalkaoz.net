<?php

namespace rs\kaoz4Bundle\DataFixtures\ORM;

class LoadUserData extends BaseFixtureLoader
{
    protected $file = '/../../Resources/fixtures/user_fixtures.yml';
    protected $orderno = 1;
    protected $cls = 'rs\kaoz4Bundle\Entity\User';
}