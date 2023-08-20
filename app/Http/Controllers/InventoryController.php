<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\City;
use App\Models\Item;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function create(){
        $city = City::all();

        return view('Inventory.create' ,compact('city')) ;
    }

    public function store(Request $request){
        $validator = Validator($request->all(),[
            'name' => 'required',
        
]);

        if(! $validator -> fails()){

        $inventory = Inventory::create($request->all());

        if ($inventory) {
            return redirect()->route('inventories.index');
            }else{
            return response()->json(['icon'=>'error' , 'title'=>'Storage failed'],400);

            }
        }else{
            return response()->json(['icon'=>'error' , 'title'=>$validator->getMessageBag()->all()],400);

        }

    }
    public function index(Request $request):Renderable
    {
            //    $inventories = Inventory::with('items')->get();

       $inventory = Inventory::paginate(6) ;
        return view('Inventory.index' , compact('inventory')) ;
    }
        
    public function edit($id)
    {
        $inventory = Inventory::find($id) ;
        $city = City::all();

        return view('Inventory.edit' ,[
            'inventory' => $inventory,
            'city' => $city,
        ]);

        return view('City.create' ,compact('country')) ;
    }

    public function update(Request $request , $id):RedirectResponse
    {
        $inventory = Inventory::find($id);
        $inventory->update( $request->all());
        return redirect()->route('inventories.index');

    }

    public function destroy($id)
    {
        Inventory::destroy($id);
        return redirect(route('inventories.index'));

    }
    public function getLargestInventory($itemId)
    {
        $item = Item::findOrFail($itemId);
        $largestInventory = $item->inventories()->orderBy('quantity', 'desc')->first();
         return response()->json($largestInventory);
    }
    
}