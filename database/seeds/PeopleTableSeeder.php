<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'taro',
            'mail' => 'taro@gmail.com',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('people')->insert($param);
        $param = [
            'name' => 'hanako',
            'mail' => 'hanako@gmail.com',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('people')->insert($param);
        $param = [
            'name' => 'takeshi',
            'mail' => 'takeshi@gmail.com',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('people')->insert($param);
    }
}
