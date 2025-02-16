<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 19,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 23,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 24,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 25,
                'title' => 'exhibition_create',
            ],
            [
                'id'    => 26,
                'title' => 'exhibition_edit',
            ],
            [
                'id'    => 27,
                'title' => 'exhibition_show',
            ],
            [
                'id'    => 28,
                'title' => 'exhibition_delete',
            ],
            [
                'id'    => 29,
                'title' => 'exhibition_access',
            ],
            [
                'id'    => 30,
                'title' => 'link_category_create',
            ],
            [
                'id'    => 31,
                'title' => 'link_category_edit',
            ],
            [
                'id'    => 32,
                'title' => 'link_category_show',
            ],
            [
                'id'    => 33,
                'title' => 'link_category_delete',
            ],
            [
                'id'    => 34,
                'title' => 'link_category_access',
            ],
            [
                'id'    => 35,
                'title' => 'link_create',
            ],
            [
                'id'    => 36,
                'title' => 'link_edit',
            ],
            [
                'id'    => 37,
                'title' => 'link_show',
            ],
            [
                'id'    => 38,
                'title' => 'link_delete',
            ],
            [
                'id'    => 39,
                'title' => 'link_access',
            ],
            [
                'id'    => 40,
                'title' => 'setting_access',
            ],
            [
                'id'    => 41,
                'title' => 'country_create',
            ],
            [
                'id'    => 42,
                'title' => 'country_edit',
            ],
            [
                'id'    => 43,
                'title' => 'country_show',
            ],
            [
                'id'    => 44,
                'title' => 'country_delete',
            ],
            [
                'id'    => 45,
                'title' => 'country_access',
            ],
            [
                'id'    => 46,
                'title' => 'visitor_create',
            ],
            [
                'id'    => 47,
                'title' => 'visitor_edit',
            ],
            [
                'id'    => 48,
                'title' => 'visitor_show',
            ],
            [
                'id'    => 49,
                'title' => 'visitor_delete',
            ],
            [
                'id'    => 50,
                'title' => 'visitor_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
