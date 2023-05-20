<?php

namespace App\Repositories\OrderDetail;

use App\Repositories\RepositoriesInterface;

interface OrderDetailRepositoryInterface extends RepositoriesInterface
{
    public function getMonthDashboard();
    public function getTotalMonthDashboard();
}
