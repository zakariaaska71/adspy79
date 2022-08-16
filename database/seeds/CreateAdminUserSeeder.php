<?php
use Illuminate\Database\Seeder;
use App\User;
use Maklad\Permission\Models\Role;
use Maklad\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
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
$role = Role::create(['name' => 'Admin']);
$permissions = Permission::pluck('id','id')->all();
$role->syncPermissions($permissions);
$user->assignRole([$role->id]);
}
}
