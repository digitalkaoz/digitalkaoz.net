<?php

namespace rs\kaoz4FrontBundle\DataFixtures\ORM;

class LoadPostData extends BaseFixtureLoader
{
    protected $file = '/../../Resources/fixtures/post_fixtures.yml';
    protected $orderno = 4;
    protected $cls = 'rs\kaoz4FrontBundle\Entity\Post';
}