<?php
use Illuminate\Database\Seeder;
use App\User;
use Maklad\Permission\Models\Role;
use Maklad\Permission\Models\Permission;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'islamshu12',
            'email' => 'islamshu12@gmail.com',
            'password' => bcrypt('05972326456')
            ]);
            $role = Role::where('name','admin')->first();
            $permissions = Permission::all();
            // dd($permissions);
            $role->syncPermissions($permissions);
            $user->assignRole([$role->name]);    }
}
