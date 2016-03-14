<?php
declare(strict_types = 1);

namespace App\Mappings;

use App\Model\Category;
use Gedmo\Tree\Entity\Repository\NestedTreeRepository;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Extensions\Gedmo\TreePath;
use LaravelDoctrine\Fluent\Fluent;

class CategoryMapping extends EntityMapping
{
    /**
     * {@inheritdoc}
     */
    public function mapFor()
    {
        return Category::class;
    }

    /**
     * {@inheritdoc}
     */
    public function map(Fluent $builder)
    {
        $builder->entity()->setRepositoryClass(NestedTreeRepository::class);
        $builder->tree()->asMaterializedPath()->path('path', '/', function(TreePath $path){
            $path->endsWithSeparator(false);
            $path->startsWithSeparator(true);
        });

        $builder->increments('id');
        $builder->string('title');
        // $builder->string('slug')->sluggable('title');
        // $builder->integer('lft')->treeLeft();
        // $builder->integer('lvl')->treeLevel();
        // $builder->integer('rgt')->treeRight();
        $builder->belongsTo(Category::class, 'root')->nullable()
            ->onDelete('CASCADE')->treeRoot();
        $builder->belongsTo(Category::class, 'parent')->nullable()
            ->onDelete('CASCADE')->treeParent();
        $builder->hasMany(Category::class, 'children')->mappedBy('parent')
            ->orderBy('lft');

        $builder->softDelete();
    }
}
