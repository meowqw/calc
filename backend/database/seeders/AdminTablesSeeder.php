<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class AdminTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // base tables
        \Encore\Admin\Auth\Database\Menu::truncate();
        \Encore\Admin\Auth\Database\Menu::insert(
            [
                [
                    "icon" => "fa-bars",
                    "order" => 0,
                    "parent_id" => 0,
                    "permission" => "*",
                    "title" => "Материалы",
                    "uri" => "/materials"
                ],
                [
                    "icon" => "fa-bars",
                    "order" => 1,
                    "parent_id" => 0,
                    "permission" => "*",
                    "title" => "Коронки",
                    "uri" => "/crowns"
                ],
                [
                    "icon" => "fa-bars",
                    "order" => 2,
                    "parent_id" => 0,
                    "permission" => "*",
                    "title" => "Доп Работы",
                    "uri" => "/extra-works"
                ],
                [
                    "icon" => "fa-bars",
                    "order" => 3,
                    "parent_id" => 0,
                    "permission" => "*",
                    "title" => "Коэффициенты",
                    "uri" => "/coefficients"
                ],
                [
                    "icon" => "fa-bars",
                    "order" => 4,
                    "parent_id" => 0,
                    "permission" => "*",
                    "title" => "Настройки",
                    "uri" => "/settings"
                ]
            ]
        );

        \Encore\Admin\Auth\Database\Permission::truncate();
        \Encore\Admin\Auth\Database\Permission::insert(
            [

            ]
        );

        \Encore\Admin\Auth\Database\Role::truncate();
        \Encore\Admin\Auth\Database\Role::insert(
            [

            ]
        );

        // pivot tables
        DB::table('admin_role_menu')->truncate();
        DB::table('admin_role_menu')->insert(
            [

            ]
        );

        DB::table('admin_role_permissions')->truncate();
        DB::table('admin_role_permissions')->insert(
            [

            ]
        );

        // finish
    }
}
