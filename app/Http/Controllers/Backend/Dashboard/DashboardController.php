<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Dashboard\DashboardServiceInterface;

class DashboardController extends Controller
{
        /**
     * dashboard interface
     */
    private $dashboardInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DashboardServiceInterface $dashboardInterface)
    {
        $this->dashboardInterface = $dashboardInterface;
    }

    /**
     * To show order information
     * 
     * @return View dashboard
     */
    public function dashboard()
    {
        $dataList = $this->dashboardInterface->dashboard();

        return view('admin.dashboard', compact('dataList'));
    }

}


