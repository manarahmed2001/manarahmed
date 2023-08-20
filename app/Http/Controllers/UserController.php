<?php

namespace App\Http\Controllers;

use App\Filters\EmailFilter;
use App\Filters\Filters;
use App\Filters\IsActiveFilter;
use App\Filters\IsAdminFilter;
use App\Filters\NameFilter;
use App\Filters\UsernameFilter;
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
            'first_name'=>'min:3|max:15',
            'last_name'=>'min:3|max:15',
            'is_admin' => 'required|in:0,1',
            'is_active' => 'required|in:0,1',
            'password' => [
                'sometimes',
                'required',
                'min:8',
                'regex:/^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.(_|[^\w])).+$/' ,
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
    public function index(Request $request)
    {
        $filters = new Filters($request);
    
        // Get an instance of the Eloquent Builder
        $query = User::query();
    
        // Apply the filters using the Filters object
        $query = $filters->apply($query);
    
        // Paginate the filtered results
        $users = $query->paginate(6); // Adjust the number of items per page as needed
        
        return view('User.index', compact('users'));
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

        $data = $request->all();
        if (empty($data['password'])) {
            unset($data['password']);
        }
    
        $user->update($data);
    
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect(route('users.index'));

    }
}
