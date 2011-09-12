<?php

namespace rs\kaoz4FrontBundle\DataFixtures\ORM;

class LoadProjectData extends BaseFixtureLoader
{
    protected $file = '/../../Resources/fixtures/project_fixtures.yml';
    protected $orderno = 3;
    protected $cls = 'rs\kaoz4FrontBundle\Entity\Project';
}