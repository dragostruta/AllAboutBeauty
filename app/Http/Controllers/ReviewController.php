<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Request $request){
        $name = $request->get('name');
        $rating = $request->get('rating');
        $salonId = $request->get('salon_id');
        $description = $request->get('description');

        $review = Review::create([
            'name' => $name,
            'rating' => $rating,
            'salon' => $salonId,
            'description' => $description,
        ]);

        return response($review);
    }
}
