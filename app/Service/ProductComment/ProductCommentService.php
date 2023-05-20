<?php

namespace App\Service\ProductComment;

use App\Repositories\ProductComment\ProductCommentRepository;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Service\BaseService;
use App\Service\Product\ProductServiceInterface;

class ProductCommentService extends BaseService implements ProductCommentServiceInterface
{
    public  $repository ;
        public function __construct(ProductCommentRepositoryInterface $commentService)
        {
            $this->repository=$commentService;
        }

}
