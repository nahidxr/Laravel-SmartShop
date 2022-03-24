<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Enums\MainCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;
use App\Interfaces\ICategoryRepository;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(ICategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    } 


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=$this->categoryRepo->get();
        $data['category_list']=$category;
        return view('admin.categories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["main_category"]=MainCategory::asSelectArray();
        return view('admin.categories.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryRepo->createCategory($request);
        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=$this->categoryRepo->find($id);
        if(!$category)
        {
            return redirect('/admin/categories');
        }
        $data["category"]=$category;
        $data["main_category"]=MainCategory::asSelectArray();
        return view('admin.categories.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$category=$this->categoryRepo->find($id);
        $this->categoryRepo->UpdateCategory($request, $id);
        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepo->delete($id);
        return redirect('/admin/categories');
    }
}
