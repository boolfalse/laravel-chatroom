<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\DialogChannel;

class DialogChannelsTableSeeder extends Seeder
{
    protected function generateChannelToken()
    {
        $faker = Factory::create('en_US');
        do{
            $token = $faker->bothify(str_repeat('*', config('custom.channel_token_length')));
        } while(!empty(DialogChannel::where('channel_token', $token)->first()));

        return $token;
    }
    public function run()
    {
        DialogChannel::create([
            'channel_token' => $this->generateChannelToken(),
            'owner_id' => 1,
            'user_ids' => [1, 2],
            'name' => "Seeded Dialog Channel",
        ]);
    }
}
