<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function create(){
        $country = Country::all();

        return view('City.create' ,compact('country')) ;
    }

    public function store(Request $request){
       $validator = Validator($request->all(),[
            'name' => 'required',
        
]);

        if(! $validator -> fails()){

        $city = City::create($request->all());

        if ($city) {
            return redirect()->route('cities.index');
            }else{
            return response()->json(['icon'=>'error' , 'title'=>'Storage failed'],400);

            }
        }else{
            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->all()],400);

        }

     
    }
    public function index(Request $request):Renderable
    {
       $city = City::paginate(6) ;
        return view('City.index' , compact('city')) ;
    }

    public function show()
    {
        //
    }
        
    public function edit($id)
    {
        $city = City::find($id) ;
        $country = Country::all();

        return view('City.edit' ,[
            'city' => $city,
            'country' => $country,
        ]);

        return view('City.create' ,compact('country')) ;
    }

    public function update(Request $request , $id):RedirectResponse
    {
        $city = City::find($id);
        $city->update( $request->all());
        return redirect()->route('cities.index');

    }

    public function destroy($id)
    {
        City::destroy($id);
        return redirect(route('cities.index'));

    }
    
}