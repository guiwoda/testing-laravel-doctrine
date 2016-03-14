<?php
declare(strict_types = 1);

namespace App\Model;

use Gedmo\Tree\Entity\MappedSuperclass\AbstractClosure;

class TagClosure extends AbstractClosure
{
    /**
     * @var Tag
     */
    protected $ancestor;

    /**
     * @var Tag
     */
    protected $descendant;
}
