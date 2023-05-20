<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Product\ProductService;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductComment\ProductCommentService;
use App\Service\ProductComment\ProductCommentServiceInterface;
use App\Service\Brand\BrandServiceInterface;
use App\Service\ProductCategory\ProductCategoryService;


use Illuminate\Http\Request;


class ShopController extends Controller
{
    private $productService;
    private $productCommentService;
    private $productCategoryService;


    public function __construct(ProductServiceInterface        $productService,
                                ProductCommentServiceInterface $productCommentService,
                                BrandServiceInterface          $productCategoryService)
    {
        $this->productService = $productService;
        $this->productCommentService = $productCommentService;
        $this->productCategoryService=$productCategoryService;
    }

    public function show($id){
        $product=$this->productService->find($id);
        $relatedProducts=$this->productService->getRelatedProducts($product);
        return view('pages.product',compact('product','relatedProducts'));
//      return $relatedProducts;
    }
    public function postComment(Request $request){
        $this->productCommentService->create($request->all());
        return redirect()->back();
    }
    public function index( Request $request){
        $categories=$this->productCategoryService->all();
        $product=$this->productService->getProductOnIndex($request);
        return view('pages.shop',compact('product','categories'));
    }
    public function category($categoryName,Request $request){
        $categories=$this->productCategoryService->all();
        $product=$this->productService->getProductsByCategory($categoryName,$request);
            return view('pages.shop',compact('product','categories'));
    }
}
