<?php

use Illuminate\Database\Seeder;

class rolesseeder  extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [

            ['id' => 1, 'title' => 'Administrator',],
            ['id' => 2, 'title' => 'Client',]

        ];

        foreach ($roles as $item) {
            \App\models\role::create($item);
        }


        factory(\App\User::class,10)->create();
        factory(\App\models\post::class, 110)->create();
        factory(\App\models\products::class, 10)->create();

    }
}
