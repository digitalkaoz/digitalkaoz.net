<?php

namespace digitalkaoz\GithubContributionsBundle\Controller;

use digitalkaoz\GithubContributionsBundle\Factory\Contribution;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\HttpFoundation\Response;

class ContributionsController
{
    public function __construct(Contribution $factory, TwigEngine $templating)
    {
        $this->factory = $factory;
        $this->templating = $templating;
    }

    public function contributionsAction()
    {
        $contributions = $this->factory->getContributions('digitalkaoz');

        return new Response($this->templating->render('digitalkaozGithubContributionsBundle:Contributions:contributions.html.twig', array('contributions' => $contributions)));
    }
}
