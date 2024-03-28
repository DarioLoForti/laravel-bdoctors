<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Message;
use App\Models\Doctor;

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
        $minDoc = DB::table('doctors')->min('id');
        $maxDoc = DB::table('doctors')->max('id');


        foreach ($messages as $message) {
            $new_message = new Message();

            $new_message->doctor_id = rand($minDoc, $maxDoc);
            $new_message->name = $message['name'];
            $new_message->text = $message['text'];
            $new_message->email = $message['email'];

            $new_message->save();
        }
    }
}
