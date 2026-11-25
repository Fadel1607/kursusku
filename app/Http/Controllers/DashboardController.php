<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Participant;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'courses' => Course::count(),
            'open_courses' => Course::where('status', 'open')->count(),
            'participants' => Participant::count(),
            'enrollments' => Enrollment::count(),
        ];

        return view('dashboard', compact('stats'));
    }
}
