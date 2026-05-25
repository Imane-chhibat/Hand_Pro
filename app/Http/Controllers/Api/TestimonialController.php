<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;

class TestimonialController extends Controller
{
    public function index(): JsonResponse
    {
        $testimonials = Testimonial::all()->map(fn ($t) => [
            'id'     => 'test-' . $t->id,
            'name'   => $t->name,
            'city'   => $t->city,
            'quote'  => $t->quote,
            'rating' => (int) $t->rating,
            'avatar' => $t->avatar ?? '',
        ]);

        return response()->json($testimonials);
    }
}
