<?php

namespace App\Repositories;

use App\Interfaces\ICategoryRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{
    

    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function createCategory($request)
    {
        $category=$this->model;
        $category->main_category_id=$request->main_category_id;
        $category->name=$request->name;
        $category->save();
        flash('Category successfully created')->success();
    }

    public function UpdateCategory($request,$id)
    {
        $category= $this->find($id);
        if(!$category)
        {
            return false;
        }
        $category->name=$request->name;
        $category->main_category_id =$request->main_category_id;
        $category->save();
        flash('Category successfully updated')->success();
        return true;
    }


}
