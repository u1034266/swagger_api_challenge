<?php

use Illuminate\Database\Seeder;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new \App\Pets();
        $item->name = 'Rocky';
        $item->type = 'Bull Mastif';
        $item->save();
    }
}
