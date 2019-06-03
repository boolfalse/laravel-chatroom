<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(DialogChannelsTableSeeder::class);
        $this->call(ConversationsTableSeeder::class);
    }
}
