<?php

use Illuminate\Database\Seeder;

class AdminuserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Adminuser::class,10)->create();
    }
}
