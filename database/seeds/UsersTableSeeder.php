<?php

use Illuminate\Database\Seeder;
use App\Category;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\User::create([
          'name' => 'saif ali',
          'email' => 'saif@apporio.com',
          'password' => Hash::make('000000'),
          'role_id' => 1,
      ]);

      App\Role::create([
          'id' => 1,
          'name' => 'admin',
      ]);

      App\Role::create([
          'id' => 2,
          'name' => 'user',
      ]);

      App\Brand::create([
          'name' => 'levis',
      ]);

      App\Brand::create([
          'name' => 'peppe',
      ]);

      App\Brand::create([
          'name' => 'nike',
      ]);

      App\Brand::create([
          'name' => 'woodland',
      ]);

      App\Brand::create([
          'name' => 'campus',
      ]);

      App\Category::create([
          'name' => 'men',
          'parent_id' => 0,
      ]);

      App\Category::create([
          'name' => 'women',
          'parent_id' => 0,
      ]);

    }
}
