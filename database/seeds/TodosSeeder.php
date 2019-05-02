<?php

use Illuminate\Database\Seeder;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TodoList::class, 5)->create()->each(function ($list) {
            $list->todos()->saveMany(factory(App\Todo::class, 8)->make());
        });
    }
}
