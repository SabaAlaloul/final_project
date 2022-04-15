<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Taskcontroller extends Controller
{
    public function index(){
        $tasks = DB:: table('tasks')->get();
    return view ('tasks',compact('tasks'));
}

    
    public function show ($id){
        $task= DB::table('tasks')->find($id);
        return view('show' , compact('task'));

    }

    public function store (){
        $task= DB::table('tasks')->insert(
            ['name'=> $_POST['name'] ]
        );
        return redirect()->back();

    }

    public function delete ($id){
          DB::table('tasks')->where('id','=',$id)->delete();
           
        return redirect()->back();

    }
  
  
    
    public function edit($id)
    {
        $tasks = DB:: table('tasks')->get();
        $task= DB::table('tasks')->find($id);
       
        return view('edit', compact('tasks' , 'task'));
    }
   /* public function update(Request $request, $id)
    {
        $tas= DB::table('tasks')->find($id);
      
 
        $tas->update();
        return redirect()->back()->with('status','Student Updated Successfully');
    }*/
}
