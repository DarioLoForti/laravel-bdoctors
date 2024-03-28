<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = config('message');

        foreach ($messages as $message) {
            $new_message = new message();

            $new_message->name = $message['name'];
            $new_message->text = $message['text'];
            $new_message->email = $message['email'];
            $new_message->save();
        }
    }
}
