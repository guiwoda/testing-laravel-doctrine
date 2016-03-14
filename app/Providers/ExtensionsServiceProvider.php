<?php
declare(strict_types = 1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use LaravelDoctrine\Fluent\Extensions\Gedmo\Blameable;
use LaravelDoctrine\Fluent\Extensions\Gedmo\IpTraceable;
use LaravelDoctrine\Fluent\Extensions\Gedmo\Timestampable;
use LaravelDoctrine\Fluent\Extensions\Gedmo\Tree;

class ExtensionsServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Blameable::enable();
        Timestampable::enable();
        IpTraceable::enable();
        Tree::enable();
    }
}
