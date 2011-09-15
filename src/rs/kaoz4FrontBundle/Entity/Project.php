<?php

namespace rs\kaoz4FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * rs\kaoz4FrontBundle\Entity\Project
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="rs\kaoz4FrontBundle\Entity\ProjectRepository")
 */
class Project
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Gedmo\Sluggable
     */
    private $name;
    
    /**
     * @Gedmo\Slug
     * @ORM\Column(name="slug", type="string", length=128, unique=true)
     */
    private $slug;    

    /**
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var text $abstract
     *
     * @ORM\Column(name="abstract", type="text")
     */
    private $abstract;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string $logo
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * read object data from an array
     * 
     * @param array $data
     * @return Network 
     */
    public function fromArray($data)
    {
        $this->setName(array_key_exists('name', $data) ? $data['name'] : null);
        $this->setActive(array_key_exists('active', $data) ? $data['active'] : false);
        $this->setUrl(array_key_exists('url', $data) ? $data['url'] : null);
        $this->setDescription(array_key_exists('description', $data) ? $data['description'] : null);
        $this->setLogo(array_key_exists('logo', $data) ? $data['logo'] : null);
        $this->setCreatedAt(array_key_exists('created_at', $data) ? $data['created_at'] : new \DateTime());
        $this->setAbstract(array_key_exists('abstract', $data) ? $data['abstract'] : null);
        
        return $this;
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set abstract
     *
     * @param text $abstract
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;
    }

    /**
     * Get abstract
     *
     * @return text 
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set logo
     *
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set active
     *
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}