<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $adminUser = User::factory()->create([
        //     'email' => 'admin@contoh.com',
        //     'name'  => 'Admin',
        //     'password' => bcrypt('admin123'),
        // ]);

        // $adminRole = Role::create(['name' => 'admin']);

        // $adminUser->assignRole($adminRole);

        $this->call(PostSeeder::class);
        \App\Models\User::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
