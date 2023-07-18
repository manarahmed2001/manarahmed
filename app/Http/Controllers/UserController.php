<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('User.create') ;
    }

    public function store(Request $request){
        $validator = Validator($request->all(),[
            'username' => 'required|string|min:4|unique:users',
            'first_name'=>'min:3 | max:15',
            'last_name'=>'min:3 | max:15',
            'is_admin' => 'required|in:0,1',
            'is_active' => 'required|in:0,1',
            'password' => [
                'required',
                'min:8',
                // 'regex:/^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.(_|[^\w])).+$/'
            ]
]);

        if(! $validator -> fails()){

        $user = User::create($request->all());

        if ($user) {
            return redirect()->route('users.index');
            }else{
            return response()->json(['icon'=>'error' , 'title'=>'Storage failed'],400);

            }
        }else{
            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->all()],400);

        }

    }
    public function index(Request $request):Renderable
    {
       $user = User::paginate(6) ;
        return view('User.index' , compact('user')) ;
    }
        
    public function edit($id)
    {
        $user = User::find($id) ;
        return view('User.edit' ,[
            'user' => $user,
        ]);
    }

    public function update(Request $request , $id):RedirectResponse
    {
        $user = User::find($id);
        $user->update( $request->all());
        return redirect()->route('users.index');

    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect(route('users.index'));

    }
}
