#!/usr/bin/env php
<?php

$rootDir = getcwd();
// php on windows can't use the shebang line from system()
$interpreter = PHP_OS == 'WINNT' ? 'php.exe' : '';
$composer = $rootDir.'/composer.phar';

//get composer
if(file_exists($composer)){
    system(sprintf('php %s', $composer.' self-update'));
}else{
    system(sprintf('curl %s | php -d=phar.readonly=Off -d=phar.require_hash=Off', 'http://getcomposer.org/installer'));
}
//system(sprintf('php %s', $composer.' update'));


// Update the bootstrap files
system(sprintf('%s %s', $interpreter, escapeshellarg($rootDir.'/vendor/sensio/distribution-bundle/Sensio/Bundle/DistributionBundle/Resources/bin/build_bootstrap.php')));

//replace twitter bootstrap with real version
system(sprintf('%s %s mopa:bootstrap:install', $interpreter, escapeshellarg($rootDir.'/app/console')));

// Update assets
echo ">".sprintf("Updating Assets\n");
system(sprintf('%s %s assets:install %s --symlink', $interpreter, escapeshellarg($rootDir.'/app/console'), escapeshellarg($rootDir.'/web/')));

// Update assets
echo ">".sprintf("Updating Assets\n");
system(sprintf('%s %s assetic:dump', $interpreter, escapeshellarg($rootDir.'/app/console')));

echo "\n>".sprintf("Clearing Cache\n");
// Remove the cache
system(sprintf('%s %s cache:clear --no-warmup', $interpreter, escapeshellarg($rootDir.'/app/console')));

