<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('roles')->insert([
         ['name'=>'admin','display_name'=>'Quản Trị Hệ Thống'],
         ['name'=>'guest','display_name'=>'Khách Hàng'],
         ['name'=>'developer','display_name'=>'Phát Triển Hệ Thống'],
         ['name'=>'content','display_name'=>'Chỉnh Sửa Nội Dung'],
        ]);
    }
}
