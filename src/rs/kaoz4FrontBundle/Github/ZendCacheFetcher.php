<?php

namespace rs\kaoz4FrontBundle\Github;

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

            $cache->save($repos, $cacheId);
        }
        
        return $repos;
    }
    
    public function forceFetch($username)
    {
        return $this->fetch($username, true);
    }
}
