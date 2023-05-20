<?php

namespace App\Service\Blog;

use App\Service\ServiceInterface;
use Carbon\Laravel\ServiceProvider;

interface BlogServiceInterface extends ServiceInterface
{
    public function getLatestBlogs($limit=3);

    }
