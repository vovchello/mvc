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

    public function addToCart($id)
    {
        $array=$this->session->getParam('cart');
        if ($array == null){
            $result[]= $array;
            $this->session->setParam( 'cart',$result);
            return $result;
        }
        $len = count($array) + 1;
        $array[$len]=intval($id);
        $this->session->setParam( 'cart',$array);
        return $array;
    }

    public function sessionRestart(){
        $this->session->setParam('cart',null);

    }



}