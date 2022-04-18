<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
       // $student=DB::table('students')->get();
          $student= Student::all();
          return response()->json($student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
      $validatedData = $request->validate([
        'name' => 'required|unique:students|max:255',
      ]);


    /*  $data=array();
        $data['name']=$request->name;
        DB::table('students')->insert($data);  */

    /*  $student = new Student();
        $student->name=$request->name;
        $student->save();  */
     
       $student=Student::create($request->all());

        return response()->json($student);  //show the inserted data

        //return response('Inserted Succesfully!!'); //or show the inserted message
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
       //$student= DB::table('students')->where('id',$id)->first();
        $student=Student::find($id);
        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $validatedData = $request->validate([
        'name' => 'required|unique:students|max:255',
      ]);


       /* 
        $data=array();
        $data['name']=$request->name;
        DB::table('students')->where('id',$id)->update($data); */

        /*  $student=Student::find($id);
          $student->name=$request->name;
          $student->save(); */

          $student=Student::find($id);
          $student->update($request->all());

          return response()->json($student);
          //return response('Updated Succesfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       // DB::table('students')->where('id',$id)->delete();

        $student=Student::find($id);
        $student->delete();
        return response('Deleted Succesfully!!');
    } 
}
