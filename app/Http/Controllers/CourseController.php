<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $activeCourses = Course::orderBy('title', 'asc')->where('is_active', true)->get();

        $inActiveCourses = Course::orderBy('title', 'asc')->where('is_active', false)->get();

        return view('courses.index', ['inActiveCourses' => $inActiveCourses], ['activeCourses' => $activeCourses]);
    }


    public function create()
    {
        return view('courses.addcourse');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'is_active' => 'required|boolean'
        ]);

        Course::create($validated);



        return redirect()
            ->route('courses')
            ->with('success', 'Course created successfully');
    }

    public function edit(Request $request, int $id)
    {
        $validated = $request->validate([
            'is_active' => 'required|boolean',
        ]);

        $course = Course::findOrFail($id);
        $course->update([
            'is_active' => $validated['is_active'],
        ]);

        return redirect()
            ->route('courses')
            ->with('success', 'Course status updated successfully');
    }
}
