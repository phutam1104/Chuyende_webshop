<?php

namespace App\Service\Product;

use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Service\BaseService;

class   ProductService extends BaseService implements ProductServiceInterface
{
    public  $repository ;
        public function __construct(ProductRepositoryInterface $productRepository)
        {
            $this->repository=$productRepository;
        }
        public function find($id)
        {
            $product=$this->repository->find($id);

            $avRating=0;
            $sumRating=array_sum(array_column($product->productComment->toArray(),'rating'));
            $countRating=count($product->productComment);
            if($countRating!=0){
                $avRating=$sumRating/$countRating;
            }
            $product->avgRating=$avRating;
            return $product;
        }
        public function getRelatedProducts($product,$limit=4){
            return $this->repository->getRelatedProducts($product,$limit);

        }
        public function getFeatureProducts(){
            return [
                'men'=>$this->repository->getFeaturedProductsByCategory(1),
                'women'=>$this->repository->getFeaturedProductsByCategory(2),
            ];
        }
        public function getProductOnIndex($request){
            return $this->repository->getProductOnIndex($request);
        }
        public function getProductsByCategory($categoryName,$request){
            return $this->repository->getProductsByCategory($categoryName,$request);
        }
}
