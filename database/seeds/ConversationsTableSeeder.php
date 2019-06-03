<?php

use Illuminate\Database\Seeder;
use App\Models\Conversation;

class ConversationsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            Conversation::create([
                'user_id' => rand(0, 1) > 0 ? 1 : 2,
                'dialog_channel_id' => 1,
                'text' => "Text " . ($i + 1),
            ]);
        }
    }
}
