<?php

namespace App\Services\Cart;

use Illuminate\Http\Request;
use App\Contracts\Dao\Cart\CartDaoInterface;
use App\Contracts\Services\Cart\CartServiceInterface;

class CartService implements CartServiceInterface
{
    /**
     * cart dao
     */
    private $cartDao;

    /**
     * Class Constructor
     * @param CartDaoInterface
     * @return 
     */
    public function __construct(CartDaoInterface $cartDao)
    {
        $this->cartDao = $cartDao;
    }

    /**
     * To get cart list
     * @param Request $request
     * @return $result array
     */
    public function getCart()
    {
        return $this->cartDao->getCart();
    }
    
    /**
     * To get cart list
     * @param Request $request
     * @return $result array
     */
    public function addToCart(Request $request)
    {
        return $this->cartDao->addToCart($request);
    }
    
    /**
     * To get cart list
     * @param Request $request
     * @return $result array
     */
    public function updateCart(Request $request)
    {
        return $this->cartDao->updateCart($request);
    }

    /**
     * To get cart list
     * @param $id cart id
     * @return $status
     */
    public function removeCart($id)
    {
        return $this->cartDao->removeCart($id);
    }   

    /**
     * To delete cart
     */
    function clearCart()
    {
        return $this->cartDao->clearCart();
    }
}