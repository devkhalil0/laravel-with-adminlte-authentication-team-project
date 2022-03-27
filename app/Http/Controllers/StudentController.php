<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Models\Student;
use Carbon\Carbon;
use App\Notifications\EmailVerifyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Http\Resources\StudentResource;
use PDF;

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

    public function emailVerify(Student $student){

        return view('user.pages.students.email-verify',compact('student'));
    }

    public function sendLink(Student $student){

        $student->personal_token = Str::random(32);
        $student->save();

        // Make Notify
        Notification::route('mail' , $student->email)->notify(new EmailVerifyNotification($student));

        return redirect()->back()->with('resent', 'Resend Link');

    }

    public function verifyEmailWithToken($token = null){

        $student = Student::where('personal_token',$token)->first();

        if($student == true ) {

            $student->email_verified_at = Carbon::now();
            $student->personal_token = null;
            $student->save();

            return redirect()->route('students.index')->with('success', 'Email Is Verified');
        }else{

            return abort(401);
        }
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
        $student->password = $request->password;
        // avatar
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('backend/images/students/'), $imageName);
        // save profile pic
        $lastImage = 'backend/images/students/'.$imageName;

        $student->addMedia('backend/images/students/'.$imageName)
        ->toMediaCollection('backend/images/students/');
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
        return $student->getFirstMediaUrl('images', 'thumb');
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
            $student->password = $request->password;
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

    public function download(Request $request){


        // return response()->json($request);


        // if type csv
        if($request->type == "excel"){

            $amount = $request->amount ? $request->amount : 5;
            $from = $request->from;

            return Excel::download(new StudentsExport($amount,$from), 'students-collection.xlsx');

        // if type excel
        }elseif($request->type == "csv"){

            $amount = $request->amount ? $request->amount : 5;
            $from = $request->from;

            return Excel::download(new StudentsExport($amount,$from), 'students-collection.csv');

        }
        // if type pdf
        else{

            $amount = $request->amount ? $request->amount : 5;

            if($request->from == 'latest'){

                $students = Student::latest()->select('id','name','email','created_at')->limit($amount)->get();
            }else{

                $students = Student::oldest()->select('id','name','email','created_at')->limit($amount)->get();
            }

            $pdf = PDF::loadView('user.pages.students.csv-excel-pdf.makepdf',compact('students'));
            return $pdf->download('students.pdf');

        }


    }
}
