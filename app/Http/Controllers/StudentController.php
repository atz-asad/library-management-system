<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $students =  DB::table('students') -> get();

        return view('student.index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request -> validate([
            "name" => "required",
            "email" => "required|email|unique:students,email",
            "phone" => "required|starts_with:01|unique:students,phone",
            "student_id" => "required|unique:students,student_id",
            "address" => "required",
            "photo" => "required|image|mimes:jpg,jpeg,png,svg,gif",
        ]);

        //Genarate a file name

        $image = $request->file('photo');

        $fileName = (rand(10, 100)) . '-'. time() . '_' . $image->getClientOriginalExtension();

        $image->move(public_path('media/student'), $fileName);

        // dd($fileName);

        // data save to db
        DB::table('students') -> insert([
            "name"           => $request -> name,
            "email"          => $request -> email,
            "phone"          => $request -> phone,
            "student_id"     => $request -> student_id,
            "address"        => $request -> address,
            "photo"          =>  $fileName,
            "created_at"     => now(),
        ]);

        //return back
        return back()->with('success', 'Student Create Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
