<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews = config('review');

        foreach ($reviews as $review) {
            $new_review = new review();

            $new_review->name = $review['name'];
            $new_review->text = $review['text'];
            $new_review->email = $review['email'];
            $new_review->save();
        }
    }
}
