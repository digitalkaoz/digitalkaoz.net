<?php

namespace rs\kaoz4Bundle\DataFixtures\ORM;

class LoadPostData extends BaseFixtureLoader
{
    protected $file = '/../../Resources/fixtures/post_fixtures.yml';
    protected $orderno = 5;
    protected $cls = 'rs\kaoz4Bundle\Entity\Post';
}