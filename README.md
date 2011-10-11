DigitalKaoz.net
========================

1) Installation
--------------------------------

### a) Check your System Configuration

Before you begin, make sure that your local system is properly configured
for Symfony. To do this, execute the following:

    php app/check.php

If you get any warnings or recommendations, fix these now before moving on.

### b) install node and less

    curl http://npmjs.org/install.sh | sh
    npm install less -g

### c) Install the Vendor Libraries

If you downloaded the archive "without vendors" or installed via git, then
you need to download all of the necessary vendor libraries. If you're not
sure if you need to do this, check to see if you have a ``vendor/`` directory.
If you don't, or if that directory is empty, run the following:

    php bin/vendors install

Note that you **must** have git installed and be able to execute the `git`
command to execute this script. If you don't have git available, either install
it or download Symfony with the vendor libraries already included.

### d) Access the Application via the Browser

Congratulations! You're now ready to use Symfony. If you've unzipped Symfony
in the web root of your computer, then you should be able to access the
web version of the Symfony requirements check via:

    http://localhost/Symfony/web/config.php

If everything looks good, click the "Bypass configuration and go to the Welcome page"
link to load up your first Symfony page.

You can also use a web-based configurator by clicking on the "Configure your
Symfony Application online" link of the ``config.php`` page.

### e) Load Fixtures

    app/console doctrine:fixtures:load

What's inside?
---------------

* **FrameworkBundle** - The core Symfony framework bundle
* **SensioFrameworkExtraBundle** - Adds several enhancements, including template
  and routing annotation capability ([documentation](http://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html))
* **DoctrineBundle** - Adds support for the Doctrine ORM
  ([documentation](http://symfony.com/doc/current/book/doctrine.html))
* **TwigBundle** - Adds support for the Twig templating engine
  ([documentation](http://symfony.com/doc/current/book/templating.html))
* **SecurityBundle** - Adds security by integrating Symfony's security component
  ([documentation](http://symfony.com/doc/current/book/security.html))
* **SwiftmailerBundle** - Adds support for Swiftmailer, a library for sending emails
  ([documentation](http://symfony.com/doc/2.0/cookbook/email.html))
* **MonologBundle** - Adds support for Monolog, a logging library
  ([documentation](http://symfony.com/doc/2.0/cookbook/logging/monolog.html))
* **AsseticBundle** - Adds support for Assetic, an asset processing library
  ([documentation](http://symfony.com/doc/2.0/cookbook/assetic/asset_management.html))
* **JMSSecurityExtraBundle** - Allows security to be added via annotations
  ([documentation](http://symfony.com/doc/current/bundles/JMSSecurityExtraBundle/index.html))
* **JMSAopBundle** - AOP for symfony2
  ([documentation](http://github.com/schmittjoh/JMSAopBundle))
* **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
  the web debug toolbar
* **SensioDistributionBundle** (in dev/test env) - Adds functionality for configuring
  and working with Symfony distributions
* **SensioGeneratorBundle** (in dev/test env) - Adds code generation capabilities
  ([documentation](http://symfony.com/doc/current/bundles/SensioGeneratorBundle/index.html))
* **AcmeDemoBundle** (in dev/test env) - A demo bundle with some example code
* **KnpMenuBundle** - provides OOP Menus
  ([documentation](http://github.com/knplabs/KnpMenuBundle))
* **DoctrineFixturesBundle** - load fixtures easily
  ([documentation](http://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html))
* **KnpLastTweetsBundle** - show latest tweets
  ([documentation](http://github.com/knplabs/KnpLastTweetsBundle))
* **KnpZendCacheBundle** - zend caching backend
  ([documentation](http://github.com/knplabs/KnpZendCacheBundle))
* **DisQusBundle** - easily integrate DisQUS plattform
  ([documentation](http://github.com/virtal/VirtalDisqusBundle))
* **WebProfilerExtraBundle** - more profiler infos
  ([documentation](http://github.com/Elao/WebProfilerExtraBundle))
* **DisqusBundle** - simple usage of disqus
  ([documentation](http://github.com/virtal/VirtalDisqusBundle))
* **ConsoleAutocompleteBundle** - sf2 autocompletion of tasks
  ([documentation](http://github.com/knplabs/KnpConsoleAutocompleteBundle))
* **ContactBundle** - raw contact form bundle
  ([documentation](http://github.com/ihqs/ContactBundle))
* **MopaBootstrapBundle** - integrates [twitter-bootstrap](http://twitter.github.com/bootstrap/)
  ([documentation](http://github.com/phiamo/MopaBootstrapBundle))

  
Enjoy!
