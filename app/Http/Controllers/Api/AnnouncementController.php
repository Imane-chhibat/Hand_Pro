<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\JsonResponse;

class AnnouncementController extends Controller
{
    public function index(): JsonResponse
    {
        $announcements = Announcement::all()->map(fn ($a) => [
            'id'          => 'ann-' . $a->id,
            'title'       => $a->title,
            'company'     => $a->company,
            'category'    => $a->category,
            'city'        => $a->city,
            'date'        => $a->date,
            'description' => $a->description,
        ]);

        return response()->json($announcements);
    }
}
