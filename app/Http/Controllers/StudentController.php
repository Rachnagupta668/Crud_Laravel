<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student=DB::table('student')->get();

        return view('home',['student'=>$student]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       DB ::table('student')->insert([
    'name'=>$request->name,
    'city'=>$request->city,
    'marks'=>$request->marks,

        ]);
        return redirect(route('index'))->with('status','student Added!!');
    }

   //@param int $id
  //@return \Illuminate\Http\Response
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
   $student=DB::table('student')->find($id);
   
   return view('editform',['student'=>$student]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('student')->where('id',$id)->update([
            'name'=>$request->name,
            'city'=>$request->city,
            'marks'=>$request->marks,
         
        ]);
        return redirect(route('index'))->with('status','student Updated!!');


    }
    public function store(StudentFormRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:posts|max:191',
            'city' => 'required',
        ]);
        return redirect('/posts');

     

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        DB::table('student')->where('id',$id)->delete();
        return redirect(route('index'))->with('status','student deleted!!');

    }
}
