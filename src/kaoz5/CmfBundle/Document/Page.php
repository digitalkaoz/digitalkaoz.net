<?php

namespace kaoz5\CmfBundle\Document;

use Sonata\BlockBundle\Model\BlockInterface;
use Symfony\Cmf\Bundle\SimpleCmsBundle\Model\Page as BasePage;

class Page extends BasePage
{
    public $node;

    /**
     * @var \Sonata\BlockBundle\Model\BlockInterface
     */
    protected $sideBlock;

    /**
     * @var \Sonata\BlockBundle\Model\BlockInterface
     */
    protected $topBlock;

    /**
     * @var \Sonata\BlockBundle\Model\BlockInterface
     */
    protected $bottomBlock;

    /**
     * @param \Sonata\BlockBundle\Model\BlockInterface $bottomBlock
     */
    public function setBottomBlock(BlockInterface $bottomBlock)
    {
        $this->bottomBlock = $bottomBlock;
    }

    /**
     * @return \Sonata\BlockBundle\Model\BlockInterface
     */
    public function getBottomBlock()
    {
        return $this->bottomBlock;
    }

    /**
     * @param \Sonata\BlockBundle\Model\BlockInterface $sideBlock
     */
    public function setSideBlock(BlockInterface $sideBlock)
    {
        $this->sideBlock = $sideBlock;
    }

    /**
     * @return \Sonata\BlockBundle\Model\BlockInterface
     */
    public function getSideBlock()
    {
        return $this->sideBlock;
    }

    /**
     * @param \Sonata\BlockBundle\Model\BlockInterface $topBlock
     */
    public function setTopBlock(BlockInterface $topBlock)
    {
        $this->topBlock = $topBlock;
    }

    /**
     * @return \Sonata\BlockBundle\Model\BlockInterface
     */
    public function getTopBlock()
    {
        return $this->topBlock;
    }
} 