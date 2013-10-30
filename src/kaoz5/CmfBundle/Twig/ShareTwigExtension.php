<?php
/**
 * Created by PhpStorm.
 * User: caziel
 * Date: 25.10.13
 * Time: 15:10
 */

namespace kaoz5\CmfBundle\Twig;


use Thujohn\Share\Share;

class ShareTwigExtension extends \Twig_Extension
{
    /**
     * @var Share
     */
    private $sharer;

    public function __construct(Share $sharer)
    {
        $this->sharer = $sharer;
    }

    /**
     * Get Twig functions defined in this extension.
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'sharer'  => new \Twig_Function_Method($this, 'getShareItems')
        );
    }

    /**
     *
     */
    public function getShareItems($url, $text, array $services)
    {
        $this->sharer->load($url, $text);

        return call_user_func_array(array($this->sharer, "services"), $services);
    }

    /**
     * Get the Twig extension name.
     *
     * @return string
     */
    public function getName()
    {
        return 'share_twig_extension';
    }
}