<?php

use Illuminate\Database\Seeder;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sentinel::getRoleRepository()
            ->createModel()
            ->create(
                [
                    'name'  => 'Admin',
                    'slug'  => 'admin',
                ]
            )
            ->addPermission('*')
            ->save();
        
        Sentinel::getRoleRepository()
            ->createModel()
            ->create(
                [
                    'name'  => 'Read only',
                    'slug'  => 'read-only',
                ]
            )
            ->setPermissions([
                'admin' => true,
                'admin.api.*' => true,
                'api.admin.clients.index' => true,
                'api.admin.clients.select' => true,
                'api.admin.companies.index' => true,
                'api.admin.companies.select' => true,
                'api.admin.employees.index' => true,
                'api.admin.employees.select' => true,
                'api.admin.products.index' => true,
                'api.admin.products.select' => true,
                'api.admin.providers.index' => true,
                'api.admin.providers.select' => true,
                'api.admin.transaction-clients.index' => true,
                'api.admin.transaction-clients.select' => true,
                'api.admin.transaction-providers.index' => true,
                'api.admin.transaction-providers.select' => true,
                'admin.clients.index' => true,
                'admin.companies.index' => true,
                'admin.employees.index' => true,
                'admin.products.index' => true,
                'admin.providers.index' => true,
                'admin.transaction-clients.index' => true,
                'admin.transaction-providers.index' => true,
            ])
            ->save();
    }
}
