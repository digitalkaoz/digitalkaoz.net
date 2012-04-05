<?php
namespace rs\kaoz4Bundle\Github;

use FOQ\ElasticaBundle\Provider\ProviderInterface;
use Elastica_Document;
use Elastica_Type;
use rs\kaoz4Bundle\Github\ZendCacheFetcher;
use Closure;

class SearchProvider implements ProviderInterface
{
    protected $githubType;
    protected $fetcher;
    protected $userName;
    
    public function __construct(Elastica_Type $githubType, ZendCacheFetcher $fetcher, $userName = null)
    {
        $this->githubType = $githubType;
        $this->fetcher = $fetcher;
        $this->userName = $userName;
    }

    /**
     * Insert the repository objects in the type index
     *
     * @param Closure $loggerClosure
     */
    public function populate(\Closure $loggerClosure = null)
    {
        if(!$this->userName){
            return;
        }
        
        $repos = $this->fetcher->fetch($this->userName);

        $docs = array();

        foreach($repos as $repo){
            $docs[] = new Elastica_Document(null, $repo);
        }
        $this->githubType->addDocuments($docs);

        $loggerClosure(sprintf('%d object/s for %s', count($docs),$this->userName));
    }
}
