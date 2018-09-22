<?php
/**
 * Created by PhpStorm.
 * User: test
 * Date: 9/22/2018
 * Time: 10:41 AM
 */

namespace App\Services\Cart;


use Core\Session;

class CartService
{
    protected $session;

    /**
     * SessionService constructor.
     * @param $sessions
     */
    public function __construct()
    {
        $this->session = Session::getInstance();
    }

    public function addToCart($product,$params)
    {

        $this->session->setParam($product->id, $params);
        return $this->session->getParam('id');
    }



}