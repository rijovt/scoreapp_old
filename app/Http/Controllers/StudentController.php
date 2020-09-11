<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Score;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    public function show(Request $request)
    {
        $student = Student::where('student_id',$request->student_id)->first();
        if($student['id']){      
            $scores =  DB::table('scores')
                        ->join('courses', 'courses.id', '=', 'scores.course_id')
                        ->where('scores.stud_id', '=', $student['id'])
                        ->select('scores.id', 'scores.score','courses.course_name','courses.id')
                        ->get();

            return [
                'stud_id'=>$student->id,
                'student_id'=>$student->student_id,
                'name'=>$student->student_name,
                'dob'=>date('d/m/Y', strtotime($student->student_dob)),
                'scores'=>$scores,
            ];
        }
        else
            return response('error','No Data found for the Student !!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_student()
    {
        return view('create_student');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_student(Request $request)
    {
        $this->validate($request,[
            'student_id'=>'required|numeric|unique:students',
            'name'=>'required|string|max:255',
            'dob'=>'required|date',
        ]);        
        $st= new Student;
        $st->student_id=$request->student_id;
        $st->student_name=ucfirst($request->name);
        $st->student_dob=$request->dob;
        $st->save();
        return redirect('/')->with('success','Student Created Successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_score()
    {
        return view('create_score');
    }

    public function get_courses()
    {
        return DB::table('courses')->get();
    }

    public function store_score(Request $request)
    {
        $this->validate($request,[
            'stud_id'=>'required',
            'course_id'=>'required',
            'score'=>'required',
        ]);        
        $st= new Score;
        $st->stud_id=$request->stud_id;
        $st->course_id=$request->course_id;
        $st->score=$request->score;
        return $st->save();
    }    
}
