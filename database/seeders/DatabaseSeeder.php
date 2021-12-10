<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CompanySeeder::class);
        $this->call(PartnerSeeder::class);
        $user = new User();
        $user->name = "Invitado";
        $user->email = "admin@admin.com";
        $user->password = bcrypt("password");
        $user->admin_type = "1";//tipo administrador
        $user->save();
    }
}
