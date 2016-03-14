<?php

namespace App\Model;

use Illuminate\Contracts\Auth\Authenticatable;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping AS ORM;
use Illuminate\Support\Str;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;

class User implements Authenticatable
{
    use \LaravelDoctrine\ORM\Auth\Authenticatable;
    use Timestamps;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var User
     */
    protected $createdBy;

    /**
     * @var string
     */
    protected $createdByUser;

    /**
     * @var User
     */
    protected $updatedBy;

    /**
     * @var string
     */
    protected $ip;

    public function __construct($name)
    {
        $this->name     = $name;
        $this->password = 'test';
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getUsername()
    {
        return Str::slug($this->name);
    }

    public function whoCreatedYou()
    {
        return $this->createdBy->getUsername();
    }
}
