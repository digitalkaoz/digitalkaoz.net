<?php
/**
 * Created by PhpStorm.
 * User: caziel
 * Date: 27.10.13
 * Time: 23:08
 */

namespace digitalkaoz\GithubContributionsBundle\Factory;


use Github\Client;

class Contribution
{
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getContributions($user)
    {
        $this->client->authenticate('84bdbc0a50262e7cd53ba1b90fa97540097d6702', null, Client::AUTH_HTTP_TOKEN);

        $repos = $this->client->api('user')->repositories($user);
        $contributions = array();

        foreach ($repos as $repo) {
            /** @var  $repo */

            if (false === $repo['fork']) {
                $contributions[] = $repo;
                continue;
            }

            $details = $this->client->api('repo')->show($user, $repo['name']);
            $parent = explode('/',$details['parent']['full_name']);
            $contributors = $this->client->api('repo')->contributors($parent[0],$parent[1]);

            foreach ($contributors as $contributor) {
                if ($contributor['login'] == $user) {
                    $contributions[] = $details['parent'];
                    break;
                }
            }
        }

        return $contributions;
    }
} 