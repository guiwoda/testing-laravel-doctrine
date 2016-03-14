<?php
declare(strict_types = 1);

namespace App\Mappings;

use App\Model\Tag;
use App\Model\TagClosure;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

class TagClosureMapping extends EntityMapping
{
    /**
     * Returns the fully qualified name of the class that this mapper maps.
     *
     * @return string
     */
    public function mapFor()
    {
        return TagClosure::class;
    }

    /**
     * Load the object's metadata through the Metadata Builder object.
     *
     * @param Fluent $builder
     */
    public function map(Fluent $builder)
    {
        $builder->belongsTo(Tag::class, 'ancestor');
        $builder->belongsTo(Tag::class, 'descendant');
    }
}
