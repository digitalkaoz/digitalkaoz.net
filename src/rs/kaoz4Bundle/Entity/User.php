<?php

namespace rs\kaoz4Bundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }    
    
    
    /**
     * read object data from an array
     * 
     * @param array $data
     * @return Network 
     */
    public function fromArray($data)
    {
        $this->setUsername(array_key_exists('username', $data) ? $data['username'] : null);
        $this->setEmail(array_key_exists('email', $data) ? $data['email'] : false);
        $this->setEnabled(array_key_exists('enabled', $data) ? $data['enabled'] : null);
        $this->setPlainPassword(array_key_exists('password', $data) ? $data['password'] : null);
        $this->setRoles(array_key_exists('roles', $data) ? $data['roles'] : null);
        //$this->setAlgorithm(array_key_exists('algorith', $data) ? $data['algoritm'] : 'sha512');
        $this->setLocked(array_key_exists('locked', $data) ? $data['locked'] : false);
        $this->setExpired(array_key_exists('expired', $data) ? $data['expired'] : null);
        
        return $this;
    }    
}