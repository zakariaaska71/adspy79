<?php
use Maklad\Permission\Models\Role;
use Maklad\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$permissions = [
'role-list',
'role-create',
'role-edit',
'role-delete',
];
foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}
}
}