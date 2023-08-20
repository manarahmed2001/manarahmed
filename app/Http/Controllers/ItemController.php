<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Inventory;
use App\Models\Item;
use App\Models\Purchase_Order;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\str;
class ItemController extends Controller
{
    
    public function create(){
        return view('Item.create') ;
    }

    public function store(Request $request){


        $validator = Validator($request->all(),[
            'name'=>'unique:items',
            'brand_id'=>'unique:items',
            'image' => 'image|mimes:png,jpg,jpeg',
      
]);

 if ($request->hasFile('image')) {
            $file = $request->file('image'); 
            $imageName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('storage/uploads'), $imageName);

            $request = collect($request)->merge([
                'image' => $imageName
            ]);

        }
       
             $item = Item::create($request->all());
        return redirect()->route('items.index');
      }
    public function index(Request $request):Renderable
    {
       $item = Item::paginate(6) ;
        return view('Item.index' , compact('item')) ;
    }
        
    public function edit($id)
    {
        $item = Item::find($id) ;
        return view('Item.edit' ,[
            'item' => $item,
        ]);
    }

    public function update(Request $request , $id):RedirectResponse
    {


        if ($request->hasFile('image')) {
            $file = $request->file('image'); 
            $imageName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('storage/uploads'), $imageName);

            $request = collect($request)->merge([
                'image' => $imageName
            ]);

        }
        $item = Item::find($id);


        $old= $item->image ;
    //    dd($request->image);

           $item->update( $request->all());
           if($old && $old !=$item->image){
            Storage::disk('public')->delete($old);
           }
        return redirect()->route('items.index');

    }

    public function destroy($id)
    {
        Item::destroy($id);
        return redirect(route('items.index'));

    }
    public function cart()

    {

        return view('cart');

    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

     public function addToCart(Request $request , $id ){
        // $data = $request->validate([
        //     'user_id' => 'required',
        //     'item_name' => 'required',
        //     'quantity' => 'required|integer|min:1',
        // ]);
        $item = Item::findOrFail($id);

    $cart = session()->get('cart', []);

    $cartItemId = 'item_' . $item->id;

    if (isset($cart[$cartItemId])) {
        $cart[$cartItemId]['quantity'] += 1;
    } else {
        $cart[$cartItemId] = [
            'item_name' => $item->name,
            'price' => $item->price,
            'quantity' => 1,
            // 'status' => $item->status, // Add the status of the item
        ];
    }

    // Store the updated cart data in the session
    session()->put('cart', $cart);

       $inventoriesWithItems = Inventory::with('items')->get();


        foreach ($inventoriesWithItems as $inventory) {
            $items = $inventory->items;
        }


        $item_name = $item->name;
        $inventory_id = $inventory->id;
        $quantity = '1';

        if (!$item->purchasing_allowed) {
            return redirect()->back()->with('error', 'This item is not available for purchase.');
        }



        // Check if there is an existing "inprogress" purchase order for the user
        $order = Purchase_Order::where('status', 'inprogress')->first();

        if (!$order) {
            // If no existing order, create a new one
            $order = Purchase_Order::create([
                'item_id' => $item->id,
                'inventory_id' => $inventory_id,
                'status' => '1',
            ]);
        }

        // if( $order->status == '1'){
        //     $order->status = 'inprogress';
        //    }else{
        //     $order->status = 'dilevered';
        //    }

        // Associate the cart item with the purchase order
        $cart_item = CartItem::create([
            'order_id' => $order->id,
            'item_id' => $item->id,
            'inventory_id' => $inventory_id,
            'item_name' => $item_name,
            'quantity' => $quantity,
        ]);

        // Update the "inprogress" status of the purchase order
        $order->status = '1';
        $order->save();

        return redirect()->route('cart')->with('success', 'Item added to cart successfully!');
    


        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Product added to cart successfully!');

    
        }
    /**

     * Write code on Method

     *

     * @return response()

     */

    public function updatecart(Request $request)

    {

        if($request->id && $request->quantity){

            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');

        }

    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function remove(Request $request)

    {

        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);

            }

            session()->flash('success', 'Product removed successfully');

        }
    }
       
}
