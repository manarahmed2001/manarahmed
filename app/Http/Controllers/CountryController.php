<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function create(){
        return view('Country.create') ;
    }

    public function store(Request $request){
        $validator = Validator($request->all(),[
            'name' => 'required',
        
]);

        if(! $validator -> fails()){

        $country = Country::create($request->all());

        if ($country) {
            return redirect()->route('countries.index');
            }else{
            return response()->json(['icon'=>'error' , 'title'=>'Storage failed'],400);

            }
        }else{
            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->all()],400);

        }

    }
    public function index(Request $request):Renderable
    {
       $country = Country::paginate(6) ;
        return view('Country.index' , compact('country')) ;
    }
        
    public function edit($id)
    {
        $country = Country::find($id) ;
        return view('Country.edit' ,[
            'country' => $country,
        ]);
    }

    public function update(Request $request , $id):RedirectResponse
    {
        $country = Country::find($id);
        $country->update( $request->all());
        return redirect()->route('countries.index');

    }

    public function destroy($id)
    {
        Country::destroy($id);
        return redirect(route('countries.index'));

    }
}