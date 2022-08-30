<?php

namespace App\Http\Controllers\Frontend\HomePage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\HomePage\HomePageServiceInterface;

class HomePageController extends Controller
{
    /**
     * home interface
     *
     */
    private $homePageInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HomePageServiceInterface $homePageServiceInterface)
    {
        $this->homePageInterface = $homePageServiceInterface;
    }

    /**
     * To show home page
     * @return $data
     * @return View user list
     */
    public function showHomePage()
    {
        $data = $this->homePageInterface->getHomePageData();
        return view('home')->with([
            'products'  => $data[0],
            'feedbacks' => $data[1]
        ]);
    }
}
