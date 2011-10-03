<?php

namespace rs\kaoz4Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * rs\kaoz4Bundle\Entity\Network
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="rs\kaoz4Bundle\Entity\NetworkRepository")
 */
class Network
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
     */
    private $name;

    /**
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var text $desc
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;
    
    /**
     * @var string $logo
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;
    
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
     * Set description
     *
     * @param text $desc
     */
    public function setDescription($desc)
    {
        $this->description = $desc;
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
}