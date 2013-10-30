<?php

namespace digitalkaoz\GithubContributionsBundle\Controller;

use digitalkaoz\GithubContributionsBundle\Factory\Contribution;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;

class ContributionsController
{
    /**
     * @var Contribution
     */
    private $factory;
    /**
     * @var TwigEngine
     */
    private $templating;
    /**
     * @var string
     */
    private $user;
    /**
     * @var array
     */
    private $templates;

    /**
     * @param Contribution $factory
     * @param TwigEngine   $templating
     * @param array        $templates
     */
    public function __construct(Contribution $factory, TwigEngine $templating, array $templates)
    {
        $this->factory = $factory;
        $this->templating = $templating;
        $this->templates = $templates;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function contributionsAction($username = null)
    {
        if (!$username && !$this->user) {
            throw new NotAcceptableHttpException('either set username or pass a username');
        }

        $contributions = $this->factory->getContributions($username ?: $this->user);

        return new Response($this->templating->render($this->templates['contributions'], array('contributions' => $contributions)));
    }

    public function userReposAction($username = null)
    {
        if (!$username && !$this->user) {
            throw new NotAcceptableHttpException('either set username or pass a username');
        }

        $repos = $this->factory->getUserRepos($username ?: $this->user);

        usort($repos, function($a, $b) {
            if (strtotime($a['pushed_at']) == strtotime($b['pushed_at'])) {
                return 0;
            }

            return strtotime($a['pushed_at']) > strtotime($b['pushed_at']) ? -1 : 1;
        });

        return new Response($this->templating->render($this->templates['user_repos'], array('repos' => $repos)));
    }

    public function activityStreamAction($username = null)
    {
        if (!$username && !$this->user) {
            throw new NotAcceptableHttpException('either set username or pass a username');
        }

        $data = $this->factory->getActivityStream($username ?: $this->user);
        $formatted = array();
        $min = time();
        foreach ($data as $set) {
            if (strtotime($set[0]) < $min) {
                $min = strtotime($set[0]);
            }
            $formatted[strtotime($set[0])] = $set[1];
        }

        return new Response($this->templating->render($this->templates['activity_stream'], array('data' => $formatted, 'min' => $min)));
    }

}
