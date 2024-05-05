<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            'name'       => 'FC Ajax',
            'logo'       => 'img/ajax.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('teams')->insert([
            'name'       => 'PSV',
            'logo'       => 'img/vbs001_psv_logo_sticker-0-1-2-600x315.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('teams')->insert([
            'name'       => 'De Graafschap',
            'logo'       => 'img/vbv_de_graafschap_doetinchem.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('teams')->insert([
            'name'       => 'Feyenoord',
            'logo'       => 'img/feyenoord.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('teams')->insert([
            'name'       => 'FC Groningen',
            'logo'       => 'img/fc-groningen.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('teams')->insert([
            'name'       => 'Roda JC',
            'logo'       => 'img/logo_rodajc_300.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('teams')->insert([
            'name'       => 'Almere City',
            'logo'       => 'img/logo-almere-city.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('teams')->insert([
            'name'       => 'Den bosch',
            'logo'       => 'img/den-bosch.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
