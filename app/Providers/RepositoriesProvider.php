<?php

namespace App\Providers;

use App\Http\Repositories\Admin\AdminRepository;
use App\Http\Repositories\Dashboard\Admin\AdminInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminInterface::class, AdminRepository::class);
    }
}
