<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function create(){
        return view('Brand.create') ;
    }

    public function store(Request $request){

        $validator = Validator($request->all(),[
            'name'=>'unique:brands',
            'image' => 'image',
      
]);

        if(!$validator->fails()){


        $brand = Brand::create($request->all());
        
        if ($brand) {
            return redirect()->route('brands.index');
            }else{
            return response()->json(['icon'=>'error' , 'title'=>'Storage failed'],400);

            }
        }else{
            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->all()],400);

        }

    }
    public function index(Request $request):Renderable
    {
       $brand = Brand::paginate(6) ;
        return view('Brand.index' , compact('brand')) ;
    }
        
    public function edit($id)
    {
        $brand = Brand::find($id) ;
        return view('Brand.edit' ,[
            'brand' => $brand,
        ]);
    }

    public function update(Request $request , $id):RedirectResponse
    {
        $brand = Brand::find($id);
        $brand->update( $request->all());
        return redirect()->route('brands.index');

    }

    public function destroy($id)
    {
        Brand::destroy($id);
        return redirect(route('brands.index'));

    }
}
