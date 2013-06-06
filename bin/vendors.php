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
system(sprintf('php %s', $composer.' update'));