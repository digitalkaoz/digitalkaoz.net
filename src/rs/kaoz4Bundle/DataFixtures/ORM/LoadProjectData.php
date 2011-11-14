<?php

namespace rs\kaoz4Bundle\DataFixtures\ORM;

class LoadProjectData extends BaseFixtureLoader
{
    protected $file = '/../../Resources/fixtures/project_fixtures.yml';
    protected $orderno = 4;
    protected $cls = 'rs\kaoz4Bundle\Entity\Project';
}