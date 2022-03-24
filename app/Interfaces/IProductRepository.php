<?php

namespace App\Interfaces;

interface IProductRepository extends IBaseRepository
{
    public function CreateProduct($request);
    public function getLatestProductList();
    public function getSpecialProductList();
    public function getRandomProductList();
    
    
}
