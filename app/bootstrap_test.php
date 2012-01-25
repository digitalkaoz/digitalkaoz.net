<?php

@require_once __DIR__.'/bootstrap.php.cache';
@require_once __DIR__.'/AppKernel.php';

$kernel = new AppKernel('test',true);
$app = new \Symfony\Bundle\FrameworkBundle\Console\Application($kernel);
$app->setAutoExit(false);        

runConsole($app,"doctrine:schema:drop", array("--force" => true));
runConsole($app,"doctrine:schema:create");
runConsole($app,"doctrine:fixtures:load");    
runConsole($app,"foq:elastica:populate");
runConsole($app,"cache:warmup");

function runConsole($app, $command, array $options = array())
{
    $options["-e"] = "test";
    //$options["-q"] = null;
    $options = array_merge($options, array('command' => $command));
    return $app->run(new \Symfony\Component\Console\Input\ArrayInput($options));
}    
