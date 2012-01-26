<?php

namespace rs\kaoz4Bundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

/**
 * Fetch last tweets and cache them.
 *
 */
class ForceFetchGithubCommand extends ContainerAwareCommand
{
    private $generator;

    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setDefinition(array(
                new InputArgument('username', InputArgument::REQUIRED, 'github username'),
            ))
            ->setDescription('Fetch the github repos for a user')
            ->setHelp(<<<EOT
The <info>kaoz4:force-fetch-github</info> command fetches the github repos of a user.

It is useful to force the caching via a cron job rather than letting a visitor request do it.

<info>php app/console kaoz4:force-fetch-github digitalkaoz</info>
EOT
            )
            ->setName('kaoz4:force-fetch-github')
        ;
    }

    /**
     * @see Command
     *
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $github = $this->getContainer()->get('kaoz4.github.fetcher.zend_cache');
       
        $username = $input->getArgument('username');
        
        $output->writeln('Fetching the github repos of <info>'.$username.'</info>');

        try {
            $github->forceFetch($username, true);
        } catch (\Exception $e) {
            $output->writeln('<error>Unable to fetch github: '.$e->getMessage().'</error>');
        }
    }

}
