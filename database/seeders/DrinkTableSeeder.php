<?php

namespace Database\Seeders;

use App\Models\Drink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DrinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $file_stream = fopen(__DIR__ . '/../../config/cocktails.csv', 'r');
        if ($file_stream === false) {
            exit('Can not open file');
        }
        while (($row = fgetcsv($file_stream)) !== false) {
            $data[] = $row;
        }
        fclose($file_stream);

        // dd($data);


        foreach ($data as $key => $drink) {
            if ($key === 0) continue;
            $newDrink = new Drink();
            $newDrink->name = $drink[0];
            $newDrink->technique = $drink[1];
            $newDrink->save();
        }
    }
}
