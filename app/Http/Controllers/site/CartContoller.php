<?php

namespace App\Http\Controllers\site;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\IProductRepository;
use App\Models\Selected_Colour;
use App\Models\Selected_quantity;
use App\Models\Selected_size;

class CartContoller extends Controller
{
    protected $productRepo;

    public function __construct(IProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }


    public function cart_add($product_id,Request $request)
    {
        $colour =new Selected_Colour();
        $colour->product_id=$request->id;
        $colour->name=$request->name;
        $colour->save();

        $size =new Selected_size();
        $size->product_id=$request->id;
        $size->name=$request->size;
        $size->save();

        $quantity =new Selected_quantity();
        $quantity->product_id=$request->id;
        $quantity->amount=$request->quantity;
        $quantity->save();

        $product=$this->productRepo->find($product_id);
        $newAmount=0;
        if($product->selected_quantity->amount!=null)
        {
            $newAmount=$product->selected_quantity->amount;
        }else{
            $newAmount=1;
        }
        if($product){
            \Cart::add(array(
                'id' => $product->id, // inique row ID
                'name' => $product->name,
                'price' => $product->price_after_discount,
                'quantity' =>$newAmount,
                'attributes' => array(
                    'featured_image' =>$product->featured_image,
                    'size' => $product->selected_size->name,
                    'colour' => $product->selected__colour->name,
                  )
                
            ));
            return redirect()->back()->with('msg', 'Cart added successfully'); 
        }else{
            return redirect()->back()->with('msg', 'Cart not added');   
        }
        
    }

    public function store($request)
    {
        $colour =new Selected_Colour();
        $colour->name=$request->name;
    }

    public function checkout() 
    {
        $cartCollection = \Cart::getContent();
         $data['cartCollection']=$cartCollection;
        return view('site.cart.checkout',$data);
        
    }
    public function cart_remove_one_product($product_id)
    {
        $product=\Cart::get($product_id);
        if($product->quantity==1)
        {
            \Cart::remove($product_id);
        }else{
            \Cart::update($product_id, array(
                'quantity' => -1,
              ));      
        }
        return redirect()->back();
        
    }

    public function cart_add_one_product($product_id)
    {
        $product=$this->productRepo->find($product_id);
        \Cart::update($product_id, array(
            'quantity' => 1,
          ));
        return redirect()->back();
    }


    public function cart_remove($product_id)
    {
        \Cart::remove($product_id);
        return redirect()->back();
    }
}
 