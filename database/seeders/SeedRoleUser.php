<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\Role;

class SeedRoleUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $roles = [
          [
              "name" => "admin",
          ],
          [
              "name" => "teacher",
          ],
          [
              "name" => "student",
          ],
      ];

      foreach($roles as $role){
          Role::create($role);
      }
    }
}
