<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Credentials
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     */
    private $login;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     * @return Credentials
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return Credentials
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }


}

