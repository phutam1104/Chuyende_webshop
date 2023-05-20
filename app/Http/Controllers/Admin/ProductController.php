<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Brand\BrandServiceInterface;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $ProductService;
    private $brandService;
    private $productCategoryService;
    public function __construct(ProductServiceInterface $ProductService,
                                BrandServiceInterface $brandService,
    ProductCategoryServiceInterface $productCategoryService)
    {
        $this->ProductService=$ProductService;
        $this->brandService=$brandService;
        $this->productCategoryService=$productCategoryService;


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products=$this->ProductService->searchAndPaginate('name',$request->get('search'));

        return view('admincp.adminpages.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=$this->brandService->all();
       $productCategories= $this->productCategoryService->all();
        return view('admincp.adminpages.product.create',compact('brands','productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $data['qty']=0;
        $product=$this->ProductService->create($data);
        return redirect('admin/product/'.$product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=$this->ProductService->find($id);
        return view('admincp.adminpages.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=$this->ProductService->find($id);
        $brands=$this->brandService->all();
        $productCategories=$this->productCategoryService->all();
        return view('admincp.adminpages.product.edit',compact('brands','productCategories','product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->all();
        $this->ProductService->update($data,$id);

        return redirect('admin/product/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->ProductService->delete($id);
        return redirect('admin/product');
    }
}
