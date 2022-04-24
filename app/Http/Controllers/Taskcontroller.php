<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;


class Taskcontroller extends Controller
{
    public function index(){
      // $tasks = DB:: table('tasks')->get();
      $tasks = Task :: all();

    return view ('tasks',compact('tasks'));
}

    
    public function show ($id){
       // $task= DB::table('tasks')->find($id);
       $task =Task::find($id);
        return view('show' )->with('tasks',$task);

    }

    public function store (Request $request){

      /*  $task= DB::table('tasks')->insert(
            ['name'=> $_POST['name'] ]
        );
        return redirect()->back();*/

        $user = new Task();
        $user->name = $request->name;
        $user->save();
        

        return back()-> with ('store', 'succefuly');
        

    }

   
  
    
    public function edit($id)
    {
        //$tasks = DB:: table('tasks')->get();
       // $task= DB::table('tasks')->find($id);
       $tasks = Task::find($id);
       
        return view('edit', compact('tasks' ));
    }
    public function update(Request $request, $id)
    {
       // $tas= DB::table('tasks')->find($id);
      
       // $tas->update();
       $tas =Task:: find($id);
       $tas->update();


        return redirect('tas')->with('status','Student Updated Successfully');
    }

    public function destroy ($id){
        // DB::table('tasks')->where('id','=',$id)->delete();
        Task::destroy($id);
          
       return redirect('task')->with('flash massage', 'deleted');

   }
 
}
