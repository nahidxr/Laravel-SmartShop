<?php

namespace App\Repositories;

use App\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    
    }
     public function get()
    {
        return $this->model->get();
    }
    public function find($id)
    {
        $data=$this->model->find($id);
        if(!$data)
        {
            flash('No Item Found')->error();
            return null;
        }
        else{
            return $data;
        }
    }
    public function delete($id)
    {
        $data= $this->model->find($id);
        if(!$data)
        {
            flash('No Item Found')->error();
        }else{
            $data->delete();
            flash('Successfully Deleted')->success();
        }
    }
}
