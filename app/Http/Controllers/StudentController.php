<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age
        ]);

        return redirect()->back()->with('success','Data saved');
    }

    public function getData(){
        $data =  Student::all();
        
        return view('student' , compact('data'));
    }

    public function destroy($id)
{
          

    $user = Student::find($id);

    if ($user) {
        $user->delete();
    }else{
         return redirect()->back()->with('failed', 'user not found');  
    }

    return redirect()->back()->with('success', 'Deleted successfully');
}


public function edit($id)
{
    $user = Student::find($id);
   
    return view('edit', compact('user'));
 
   
}

public function update(Request $request, $id)
{
    $user = Student::find($id);

    $user->name = $request->name;
    $user->email = $request->email;

    $user->save();

    return redirect()->route('student.edit', $id)->with('success', 'User updated successfully');
     
}

    }
