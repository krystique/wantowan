<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', ['students' => $students]);
    }

    public function create()
    {
        return view('students.create');
    }
    
    public function store(Request $request)
    {
        $students = Student::create([
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
        ]);

        $students->academic()->create([
            'course' => $request->course,
            'year' => $request->year,
        ]);

        $students->country()->create([
            'continent' => $request->continent,
            'country_name' => $request->country_name,
            'capital' => $request->capital,
        ]);
        
        return redirect(route('students.index'))->with('message','Student Data created successfully.');
    }
    
    
    public function show(Student $students)
    {
        return view('students.show', ['students' => $students]);
    }

    
    public function edit(Student $students)
    {
        return view('students.edit', ['students' => $students]);
    }
    
    public function update(Student $students, Request $request)
    {
        $students->update([
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
        ]);

        $students->academic()->update([
            'course' => $request->course,
            'year' => $request->year,
        ]);

        $students->country()->update([
            'continent' => $request->continent,
            'country_name' => $request->country_name,
            'capital' => $request->capital,
        ]);
       
        return redirect(route('students.index'))->with('message','Student Data updated successfully.');
    }
    
    public function addEditAcademic($student_id)
    {
        $students = Student::findOrFail($student_id)->academic;
        return view('students.addeditacademic', compact('students', 'student_id'));
    }

    public function storeOrUpdateAcademic(Request $request, $student_id)
    {
        $students = Student::findOrFail($student_id);
        $students->academic()->updateOrCreate(
            [
                'student_id' => $student_id,
            ],
            [
                'course' => $request->course,
                'year' => $request->year,
            ]
        );
        return redirect('students')->with('message','Saved Successfully');
    }
     
    public function addEditCountry($student_id)
    {
        $students = Student::findOrFail($student_id)->country;
        return view('students.addeditcountry', compact('students', 'student_id'));
    }

    public function storeOrUpdateCountry(Request $request, $student_id)
    {
        $students = Student::findOrFail($student_id);
        $students->country()->updateOrCreate(
            [
                'student_id' => $student_id,
            ],
            [
                'continent' => $request->continent,
                'country_name' => $request->country_name,
                'capital' => $request->capital,
            ]       
        );
        return redirect('students')->with('message','Saved Successfully');
    }

    public function destroy(Student $students)
    {
        $students->delete();
        return redirect(route('students.index'))->with('message','Student data deleted successfully');
    }

    public function deleteAcademic($student_id, Request $request)
    {
        $students = Student::findOrFail($student_id);
        $students->academic()->delete(
            [
                'student_id' => $student_id,
            ],
            [
                'course' => $request->course,
                'year' => $request->year,
            ]
        );
            return redirect(route('students.index'))->with('message','Data deleted successfully');
    }

    public function deleteCountry($student_id, Request $request)
    {
        $students = Student::findOrFail($student_id);
        $students->country()->delete(
            [
                'student_id' => $student_id,
            ],
            [
                'name' => $request->name,
                'age' => $request->age,
                'address' => $request->address,
            ]);

                return redirect(route('students.index'))->with('message','Data deleted successfully');     
    }

    public function addEditStudentData($student_id)
    {
        $students = Student::findOrFail($student_id)->country;
        return view('students.addeditstudentdata', compact('students', 'student_id'));
    }

    public function storeOrUpdateStudenData(Request $request, $student_id)
    {
        $students = Student::findOrFail($student_id);
        $students->studentdata()->updateOrCreate(
            [
                'student_id' => $student_id,
            ],
            [
                'continent' => $request->continent,
                'country_name' => $request->country_name,
                'capital' => $request->capital,
            ]       
        );
        return redirect('students')->with('message','Saved Successfully');
    }

    public function deleteStudentData($student_id, Request $request)
    {
        $students = Student::findOrFail($student_id);
        $students->country()->delete(
            [
                'student_id' => $student_id,
            ],
            [
                'continent' => $request->continent,
                'country_name' => $request->country_name,
                'capital' => $request->capital,
            ]);

                return redirect(route('students.index'))->with('message','Data deleted successfully');     
    }


}