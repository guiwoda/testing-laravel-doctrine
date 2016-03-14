<?php
declare(strict_types = 1);

namespace App\Model;

class Tag
{
    private $id;

    private $parent;

    private $name;

    /**
     * Tag constructor.
     *
     * @param string $name
     * @param Tag $parent
     */
    public function __construct($name, Tag $parent = null)
    {
        $this->name   = $name;
        $this->parent = $parent;
    }
}
