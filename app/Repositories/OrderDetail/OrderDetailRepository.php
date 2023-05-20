<?php

namespace App\Repositories\OrderDetail;


use App\Models\OrderDetail;
use App\Repositories\BaseRepositories;
use \App\Repositories\OrderDetail\OrderDetailRepositoryInterface;

class OrderDetailRepository extends BaseRepositories implements OrderDetailRepositoryInterface
{
    public function getModel()
    {
        return OrderDetail::class;
    }

    public function getMonthDashboard(){
        return $this->model
        ->get(['created_at']);
    }
    public function getTotalMonthDashboard(){
        return $this->model
        // ->select(['total'],['created_at'])
        // ->orderBy('created_at')
        // ->date_format('m-y')
        // ->whereYear('created_at', date('Y'))
        //        ->whereMonth('created_at',     date('m'))
        ->selectRaw("DATE_FORMAT(created_at,'%M %Y') as months")
        ->selectRaw('sum(total) as sum')
        ->groupBy('months')
        ->get();
    }

}
