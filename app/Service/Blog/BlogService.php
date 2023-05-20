<?php

namespace App\Service\Blog;

use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\ProductComment\ProductCommentRepository;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Service\BaseService;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductComment\ProductCommentServiceInterface;

class BlogService extends BaseService implements BlogServiceInterface
{
    public  $repository ;
        public function __construct(BlogRepositoryInterface $blogRepository)
        {
            $this->repository=$blogRepository;
        }
    public function getLatestBlogs($limit=3){
            return $this->repository->getLatestBlogs($limit);
    }
}
