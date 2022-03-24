<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Interfaces\ICategoryRepository;
use App\Interfaces\IProductRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productRepo;
    protected $categoryRepo;

    public function __construct(IProductRepository $productRepo,ICategoryRepository $categoryRepo)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $category=$this->categoryRepo->get();
        $data['category_list']=$category;
        $data["latest_products"]=$this->productRepo->getLatestProductList();
        $data["special_products"]=$this->productRepo->getSpecialProductList();
        $data["random_products"]=$this->productRepo->getRandomProductList();
        return view('site.layouts.home',$data);
    }

    public function electronics()
    {
        $category=$this->categoryRepo->get();
        $product=$this->productRepo->get();
        //  if($product->categories->main_category_id==1)
        //  {
        //      $electonics=$product;
        //  }
        $data['product_list']=$product;
        $data['category_list']=$category;
        return view('site.product.electronics',$data);
    }

    public function product($id)
    {
        $product=$this->productRepo->find($id);
        $data["product"]=$product;
        return view('site.product.single',$data);
    }
}
