<?php

namespace rs\kaoz4Bundle\Github;

use Zend\Cache\Manager as CacheManager;
use \Github_Client;

class ZendCacheFetcher
{
    protected $cacheManager;
    protected $cacheName;
    protected $fetcher;

    public function __construct(Github_Client $fetcher, CacheManager $cacheManager, $cacheName)
    {
        $this->fetcher = $fetcher;
        $this->cacheManager = $cacheManager;
        $this->cacheName = $cacheName;
    }
    
    public function fetch($username, $forceRefresh = false)
    {        
        $cache = $this->cacheManager->getCache($this->cacheName);
        
        if (null === $cache) {
            throw new \Exception("Unknown Zend Cache '".$this->cacheName."'");
        }
        
        $cacheId = 'kaoz4_github_'.$username;
        
        if ($forceRefresh || false === ($repos = $cache->load($cacheId))) {
            $repos = $this->fetcher->getRepoApi()->getUserRepos('digitalkaoz');
            
            foreach($repos as $key=>$repo)
            {
                if($repo['fork'])
                {
                    unset($repos[$key]);
                }                    
            }
            
            usort($repos, function($a, $b){
                $a = $a['created_at'];
                $b = $b['created_at'];
                
                if(strtotime($a) == strtotime($b)){
                    return 0;
                }
                
                return strtotime($a) < strtotime($b) ? 1 : -1;
            });

            $cache->save($repos, $cacheId);
        }
        
        return $repos;
    }
    
    public function forceFetch($username)
    {
        return $this->fetch($username, true);
    }
}
