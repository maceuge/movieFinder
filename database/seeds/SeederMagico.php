<?php

use Illuminate\Database\Seeder;

class SeederMagico extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Movie::class,520)->create();
    }
}
