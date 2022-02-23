<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        $this->userGenerate();
    }

    public function userGenerate()
    {
        $user = \App\Models\User::firstOrNew(
            ['id' => '1122-3344-5566-7788-9900'],
            [
                'name' => 'Administrator',
                'email' => 'admin@example.com',
                'phone' => '081234567890',
                'password' => app('hash')->make('password'),
            ]
        );

        $user->save();
    }
}
