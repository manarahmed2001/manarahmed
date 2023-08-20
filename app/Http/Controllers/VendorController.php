<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function create(){
        return view('Vendor.create') ;
    }

    public function store(Request $request){

        $validator = Validator($request->all(),[
            'first_name'=>'min:3 | max:15',
            'last_name'=>'min:3 | max:15',
            'is_active' => 'required|in:0,1',
      
]);

        if(!$validator->fails()){


        $vendor = Vendor::create($request->all());
        
        if ($vendor) {
            return redirect()->route('vendors.index');
            }else{
            return response()->json(['icon'=>'error' , 'title'=>'Storage failed'],400);

            }
        }else{
            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->all()],400);

        }

    }
    public function index(Request $request):Renderable
    {
       $vendor = Vendor::paginate(6) ;
        return view('Vendor.index' , compact('vendor')) ;
    }
        
    public function edit($id)
    {
        $vendor = Vendor::find($id) ;
        return view('Vendor.edit' ,[
            'vendor' => $vendor,
        ]);
    }

    public function update(Request $request , $id):RedirectResponse
    {
        $vendor = Vendor::find($id);
        $vendor->update( $request->all());
        return redirect()->route('vendors.index');

    }

    public function destroy($id)
    {
        Vendor::destroy($id);
        return redirect(route('vendors.index'));

    }
}
