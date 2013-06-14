<?php

namespace rs\kaoz4Bundle\Github;

use Doctrine\Common\Cache\Cache;
use Github\Client;

class CacheFetcher
{
    protected $cacheManager;
    protected $fetcher;

    public function __construct(Client $fetcher, Cache $cacheManager)
    {
        $this->fetcher = $fetcher;
        $this->cacheManager = $cacheManager;
    }
    
    public function fetch($username, $forceRefresh = false)
    {
        $cacheId = 'kaoz4_github_'.$username;
        $repos = $this->cacheManager->fetch($cacheId);

        if ($forceRefresh || false === $repos) {
            $repos = $this->fetcher->api('user')->repositories($username);
            
            /*foreach($repos as $key=>$repo)
            {
                if(isset($repo['fork']) &&  $repo['fork'] === true)
                {
                    unset($repos[$key]);
                }                    
            }*/
            
            usort($repos, function($a, $b){
                $a = $a['created_at'];
                $b = $b['created_at'];
                
                if(strtotime($a) == strtotime($b)){
                    return 0;
                }
                
                return strtotime($a) < strtotime($b) ? 1 : -1;
            });

            $this->cacheManager->save($cacheId, $repos);
        }
        
        return $repos;
    }
    
    public function forceFetch($username)
    {
        return $this->fetch($username, true);
    }
}
