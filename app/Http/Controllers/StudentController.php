<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->paginate(15);
        return view('user.pages.students.index',compact('students'));
    }
    public function search(Request $request){
        $term = $request->search;
        $students = Student::query()
            ->where('name', 'LIKE', "%{$term}%")
            ->orWhere('email', 'LIKE', "%{$term}%")
            ->orWhere('id', 'LIKE', "%{$term}%")
            ->latest()->paginate(15);
            $students->appends($request->all());
        return view('user.pages.students.index',compact('students','term'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.pages.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:32',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:2|max:32',
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif'
        ]);
        // Create new one
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        // avatar
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('backend/images/students/'), $imageName);
        // save profile pic
        $lastImage = 'backend/images/students/'.$imageName;
        $student->avatar_url = $lastImage;
        $student->save();
        return redirect()->route('students.index')->with('success', 'Student Successfully Added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('user.pages.students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|min:2|max:32',
            'email' => 'required|email|unique:students,email,'.$student->id,
        ]);
        // Validate image if want to profile image
        if($request->image){
            $request->validate([
                'image' =>  'image|mimes:jpeg,png,jpg,gif'
            ]);
        }

        $student->name = $request->name;
        $student->email = $request->email;
        // password check
        if($request->password){
            $student->password = Hash::make($request->password);
        }
         // First Check Image
         if($request->image){
            // if Old Image have then delete this (if isnot default one)
            $studentOldImage = $student->avatar_url;
            if(file_exists($studentOldImage)){
                if($studentOldImage != 'backend/images/default.png'){
                    unlink($studentOldImage);
                }
            }
            // image Proccessing For Upload
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('backend/images/students/'), $imageName);
            // save profile pic
            $lastImage = 'backend/images/students/'.$imageName;
            $student->avatar_url = $lastImage;
        }
        $student->save();
        return redirect()->route('students.index')->with('success', 'Student Successfully Updated !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $avatar = $student->avatar_url;
        if(file_exists($avatar)){
            if($avatar != 'backend/images/default.png'){
                unlink($avatar);
            }
        }
        $student->delete();
        return redirect()->back()->with('success', 'Student Successfully Deleted !');
    }
}
