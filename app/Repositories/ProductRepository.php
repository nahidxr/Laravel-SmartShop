<?php

namespace App\Repositories;

use App\Interfaces\IImageRepository;
use App\Models\Image;
use App\Models\Product;
use PhpParser\Node\Stmt\TryCatch;
use App\Interfaces\IProductRepository;

class ProductRepository extends BaseRepository implements IProductRepository
{
    protected $model;
    //protected $productModel;

    public function __construct(Product $model)
    {
        //$this->productModel=$model;
        parent::__construct($model);
    }

    public function CreateProduct($request)
    {
        try {
            if($request->hasFile('featured_image')){
                $path = $request->file('featured_image')->store('product_images','public');
            }
            else{
                $path= null;
            }

        $product=$this->model;
        $product->name=$request->name;
        $product->price=$request->price;
        $product->discount_amount=$request->discount_amount;
        $product->stock=$request->stock;
        $product->category_id=$request->category_id;
        $product->description =$request->description;
        $product->size=$request->size;
        $product->colour=$request->colour;
        $product->featured_image=$path;
        $product->save();

        if($request->hasFile('images')){
            foreach ($request->file('images') as $image) {
                $path = $image->store('product_images','public');
                $image=new Image();
                $image->path=$path;
                $image->product_id=$product->id;
                $image->save();             
            }
        }
        
        flash('Successfully Created')->success();
        } catch (\Throwable $th) {
            flash('Something went worng'.$th->getMessage())->error();
        }
    }


    public function getLatestProductList()
    {
        $data=$this->model->take(12)->orderBy('created_at','desc')->get();
        return $data;
    }
    public function getSpecialProductList()
    {
        $data=$this->model->where('discount_amount', '!=', 0)
        ->take(12)
        ->orderBy('discount_amount','desc')
        ->get();
        return $data;
    }

    public function getRandomProductList()
    {
        $data=$this->model->inRandomOrder()->get();
        return $data;
    }

  


}
