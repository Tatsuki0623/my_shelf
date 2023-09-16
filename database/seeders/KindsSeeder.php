<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Kind;

class KindsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kinds=['漫画','小説'];
        
        foreach($kinds as $kind)
        {
            DB::table('kinds')->insert([
                'name'=> $kind,
            ]);
        }
    }
}
