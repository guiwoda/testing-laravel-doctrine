<?php
declare(strict_types = 1);

namespace App\Mappings;

use App\Model\User;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

class UserMapping extends EntityMapping
{
    /**
     * {@inheritdoc}
     */
    public function mapFor()
    {
        return User::class;
    }

    /**
     * {@inheritdoc}
     */
    public function map(Fluent $builder)
    {
        $builder->increments('id');
        $builder->string('name');
        $builder->string('password');
        $builder->rememberToken();

        $builder->string('createdByUser')->nullable()->blameable()->onCreate();
        $builder->belongsTo(User::class, 'createdBy')->nullable()->blameable()->onCreate();
        $builder->belongsTo(User::class, 'updatedBy')->nullable()->blameable()->onUpdate();

        $builder->timestamps();
        $builder->string('ip')->ipTraceable()->onCreate();
    }
}
