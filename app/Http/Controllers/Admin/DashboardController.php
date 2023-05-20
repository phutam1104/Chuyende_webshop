<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use Carbon\Carbon;


class DashboardController extends Controller
{

    private $orderDetailService;
    public function __construct(OrderDetailServiceInterface $orderDetailService)
    {
        $this->orderDetailService=$orderDetailService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $Time=$this->orderDetailService->getMonthDashboard();
        $Total=$this->orderDetailService->getTotalMonthDashboard();
        // $month=array();
        $data=array();
        // dd( $Total);
        // if(!empty($Time)){
        //     foreach($Time as $unfomatted_date)
        //     {
        //         $date=new \DateTime($unfomatted_date->created_at);
        //         $month_name=$date->format('M-y');
        //         array_push($month,$month_name);
                
        //     }
        // }


        //  $month_array=array_unique($month);
        // dd($Total);
        if(!empty($Total)){
            foreach($Total as $total){

                array_push($data,"month:$total->months,sum:$total->sum");

            }

        }
        // dd($data);

        return view('admincp.dashboard.index',compact('Total'));
    }

    /**
     * Show the form for creating a new resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
