<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserTableSeeder');

        $this->command->info('User table seeded!');
    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        //Schema::drop('users');

        Schema::create('users', function($table)
        {
            $table->increments('id');
        });

        Schema::table('users', function($table)
        {
            $table->string('email');
            $table->string('name');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['name' => 'Jeremy', 'email' => 'jsarda@mcclainconcepts.com','password' => bcrypt('LaravelTestPW')],
            ['name' => 'Eddie', 'email' => 'eddie@chrysaliswebdevelopment.com','password' => bcrypt('LaravelTestPW')]
            ]);
    }

}