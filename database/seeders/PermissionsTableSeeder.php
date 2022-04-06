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
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 34,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 35,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 36,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 37,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 38,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 39,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 40,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 41,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 42,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 43,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 44,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 45,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 46,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 47,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 48,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 49,
                'title' => 'sub_cat_create',
            ],
            [
                'id'    => 50,
                'title' => 'sub_cat_edit',
            ],
            [
                'id'    => 51,
                'title' => 'sub_cat_show',
            ],
            [
                'id'    => 52,
                'title' => 'sub_cat_delete',
            ],
            [
                'id'    => 53,
                'title' => 'sub_cat_access',
            ],
            [
                'id'    => 54,
                'title' => 'vendor_create',
            ],
            [
                'id'    => 55,
                'title' => 'vendor_edit',
            ],
            [
                'id'    => 56,
                'title' => 'vendor_show',
            ],
            [
                'id'    => 57,
                'title' => 'vendor_delete',
            ],
            [
                'id'    => 58,
                'title' => 'vendor_access',
            ],
            [
                'id'    => 59,
                'title' => 'driver_create',
            ],
            [
                'id'    => 60,
                'title' => 'driver_edit',
            ],
            [
                'id'    => 61,
                'title' => 'driver_show',
            ],
            [
                'id'    => 62,
                'title' => 'driver_delete',
            ],
            [
                'id'    => 63,
                'title' => 'driver_access',
            ],
            [
                'id'    => 64,
                'title' => 'unit_create',
            ],
            [
                'id'    => 65,
                'title' => 'unit_edit',
            ],
            [
                'id'    => 66,
                'title' => 'unit_show',
            ],
            [
                'id'    => 67,
                'title' => 'unit_delete',
            ],
            [
                'id'    => 68,
                'title' => 'unit_access',
            ],
            [
                'id'    => 69,
                'title' => 'variation_create',
            ],
            [
                'id'    => 70,
                'title' => 'variation_edit',
            ],
            [
                'id'    => 71,
                'title' => 'variation_show',
            ],
            [
                'id'    => 72,
                'title' => 'variation_delete',
            ],
            [
                'id'    => 73,
                'title' => 'variation_access',
            ],
            [
                'id'    => 74,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
