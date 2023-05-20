@extends('admincp.adminlayout.app')
@section('content')
<div class="app-main__outer">
    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Đơn hàng
                        <div class="page-title-subheading">
                            Xem, Tạo, cập nhật, Xóa và Quản lý.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-header">

                        <form>
                            <div class="input-group">
                                <input type="search" name="search" id="search" value="{{request('search')}}"
                                       placeholder="Tìm kiếm tất cả" class="form-control">
                                <span class="input-group-append">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-search"></i>&nbsp;
                                                    Tìm kiếm
                                                </button>
                                            </span>
                            </div>
                        </form>

                        {{-- <div class="btn-actions-pane-right">
                            <div role="group" class="btn-group-sm btn-group">
                                <button class="btn btn-focus">This week</button>
                                <button class="active btn btn-focus">Anytime</button>
                            </div>
                        </div>--}}
                    </div> 

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Khách hàng / Sản phẩm</th>
                                <th class="text-center">Địa chỉ</th>
                                <th class="text-center">Tổng tiền</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Hoạt động</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $order)
                            <tr>
                                <td class="text-center text-muted">#{{$order->id}}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img style="height: 60px;"
                                                         data-toggle="tooltip" title="Image"
                                                         data-placement="bottom"
                                                         src="{{asset("img/products/".($order->orderDetail[0]->product->productImage[0]->path ??''))}}" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{$order->first_name. ''.$order->last_name}}</div>
                                                <div class="widget-subheading opacity-7">
                                                    {{$order->orderDetail[0]->product->name}}
                                                    @if(count($order->orderDetail)>1)
                                                    (and {{count($order->orderDetail)}} other products)
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    {{$order->street_address.'-'.$order->town_city}}
                                </td>
                                <td class="text-center">${{array_sum(array_column($order->orderDetail->toArray(),'total'))}}</td>
                                <td class="text-center">
                                    <div class="badge badge-dark">
                                      {{$order->status}}
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="./order/{{$order->id}}"
                                       class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                        Chi tiết
                                    </a>
                                </td>
                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
                        {{$orders->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection
