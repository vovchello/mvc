<?php
/**
 * Created by PhpStorm.
 * User: test
 * Date: 9/22/2018
 * Time: 10:41 AM
 */

namespace App\Services\Cart;


use Core\Session;

/**
 * Class CartService
 * @package App\Services\Cart
 */
class CartService
{
    /**
     * @var Session
     */
    protected $session;

    /**
     * SessionService constructor.
     * @param $sessions
     */
    public function __construct()
    {
        $this->session = Session::getInstance();
    }

    /**
     * @param $id
     * @return array|mixed
     */
    protected function getSessionArray($id){
        $this->session->getParam($id) == null ? $result=[]:$result=$this->session->getParam($id);
        return $result;
    }

    /**
     * @param $id
     */
    public function addToCart($id) : void
    {
        $result=$this->getSessionArray('cart');
        isset($result[$id])?$result[$id]++:$result[$id]=1;
        $this->session->setParam('cart', $result);
    }

    /**
     * void
     */
    public function sessionRestart():void{
        $this->session->setParam('cart',null);

    }

    /**
     * @param $id
     */
    public function deleteProductFromCart($id):void{
        $session=$this->session->getParam("cart");
        $key=array_search($id,$session);
        unset($session[$key]);
        $this->session->setParam("cart",$session);

    }


}