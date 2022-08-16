<?php

use Illuminate\Database\Seeder;
// use Illuminate\Database\Seeder\AdminSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(PostUpdate::class);

        

        
        
    }
}
