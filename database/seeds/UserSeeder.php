<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Profession;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professionId = Profession::where('title', 'Desarrollador Back-end')->value('id');

        //dd($profession);

        factory(User::class)->create([
            'name' => 'Bernardino',
            'email' => 'bernardino@scrollweb.com.py',
            'password' => bcrypt('laravel'),
            'profession_id' => $professionId,
            'is_admin' => true
        ]);

        factory(User::class, 48)->create();
    }
}
