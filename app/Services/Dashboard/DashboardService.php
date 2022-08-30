<?php

namespace App\Services\Dashboard;

use App\Contracts\Dao\Dashboard\DashboardDaoInterface;
use App\Contracts\Services\Dashboard\DashboardServiceInterface;

/**
 * Service class for Dashboard.
 */
class DashboardService implements DashboardServiceInterface
{
    /**
    * porduct dao
    */
    private $dashboardDao;

    /**
    * Class Constructor
    * @param DashboardDaoInterface
    * @return
    */
    public function __construct(DashboardDaoInterface $dashboardDao)
    {
        $this->dashboardDao = $dashboardDao;
    }

    /**
    * To get 
    * @return array 
    */
    public function dashboard()
    {
        return $this->dashboardDao->dashboard();
    }

    
}