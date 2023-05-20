<?php

namespace App\Service\ProductCategory;

use App\Repositories\ProductCategory\ProductCategoryRepository;
use App\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use App\Service\BaseService;
use App\Service\Product\ProductServiceInterface;

class ProductCategoryService extends BaseService implements ProductCategoryServiceInterface
{
    public  $repository ;
        public function __construct(ProductCategoryRepositoryInterface $categoryRepository)
        {
            $this->repository=$categoryRepository;
        }

}
