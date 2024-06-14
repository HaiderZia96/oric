<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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
            ['permission-group-list',1],
            ['permission-group-create',1],
            ['permission-group-edit',1],
            ['permission-group-delete',1],
            ['permission-list',1],
            ['permission-create',1],
            ['permission-edit',1],
            ['permission-delete',1],
            ['role-list',2],
            ['role-create',2],
            ['role-edit',2],
            ['role-delete',2],
            ['user-list',2],
            ['user-create',2],
            ['user-edit',2],
            ['user-delete',2],
            ['dashboard',2],
            ['link_type-list',2],
            ['link_type-create',2],
            ['link_type-edit',2],
            ['link_type-delete',2],
            ['link_type-softdelete',2],
            ['link_type-restore',2],
            ['link-list',2],
            ['link-create',2],
            ['link-edit',2],
            ['link-delete',2],
            ['link-softdelete',2],
            ['link-restore',2],
            ['success_story-list',2],
            ['success_story-create',2],
            ['success_story-edit',2],
            ['success_story-delete',2],
            ['success_story-softdelete',2],
            ['success_story-restore',2],
            ['research-publication-list',1],
            ['research-publication-create',1],
            ['research-publication-edit',1],
            ['research-publication-delete',1],
            ['research-publication-softdelete',1],
            ['research-publication-restore',1],
            ['news-event-list',1],
            ['news-event-create',1],
            ['news-event-edit',1],
            ['news-event-delete',1],
            ['news-event-softdelete',1],
            ['news-event-restore',1],
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission['0'],'group_id'=>$permission[1]]);
        }
    }
}
