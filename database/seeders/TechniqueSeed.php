<?php

namespace Database\Seeders;

use App\Models\Technique;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechniqueSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $techniques_code = config('technique_codes');
        foreach ($techniques_code as $technique_code) {
            $new_technique = new Technique();
            $new_technique->code = $technique_code;
            $new_technique->name = ucfirst(strtolower(str_replace(' ', '_', $technique_code)));
            $new_technique->save();
        }
    }
}
