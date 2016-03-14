<?php
declare(strict_types = 1);

namespace App\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Category
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var int
     */
    private $lft;

    /**
     * @var int
     */
    private $lvl;

    /**
     * @var int
     */
    private $rgt;

    /**
     * @var string
     */
    private $path;

    /**
     * @var Category
     */
    private $root;

    /**
     * @var Category
     */
    private $parent;

    /**
     * @var Collection|Category[]
     */
    private $children;

    /**
     * @var \Carbon\Carbon
     */
    private $deletedAt;

    /**
     * @param string        $title
     * @param Category|null $parent
     */
    public function __construct($title, Category $parent = null)
    {
        $this->title  = $title;
        $this->parent = $parent;
        $this->children = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getRoot()
    {
        return $this->root;
    }

    public function setParent(Category $parent = null)
    {
        $this->parent = $parent;
    }

    public function getParent()
    {
        return $this->parent;
    }
}
