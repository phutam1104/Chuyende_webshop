<?php

namespace App\Service\Product;

use App\Service\ServiceInterface;
use Carbon\Laravel\ServiceProvider;

interface ProductServiceInterface extends ServiceInterface
{
    public function getRelatedProducts($product,$limit=4);
    public function getFeatureProducts();
    public function getProductOnIndex($request);
    public function getProductsByCategory($categoryName,$request);


    }
