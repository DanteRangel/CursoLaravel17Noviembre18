<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'Admin']);
        Permission::create(['name'=>'Vendedor']);
        Permission::create(['name'=>'Comprador']);
    }
}
