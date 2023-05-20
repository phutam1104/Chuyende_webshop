<?php

namespace App\Service\OrderDetail;

use App\Service\ServiceInterface;
use Carbon\Laravel\ServiceProvider;

interface OrderDetailServiceInterface extends ServiceInterface
{
    public function getMonthDashboard();
    public function getTotalMonthDashboard();
    }
