<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Profession;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Profession::create([
            'title' => 'Desarrollador Back-end',
            ]);
            
        Profession::create([
                'title' => 'Desarrollador Front-end',
                ]);
                
        Profession::create([
                    'title' => 'Diseñador Web',
                    ]);

        factory(Profession::class)->times(17)->create();
    }
}
