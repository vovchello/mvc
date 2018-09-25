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
     * @param array $array
     * @param $id
     * @return int
     */
    public function countProduct(array $array, $id){
        $count = 0;
            foreach($array as $value){
                if ($value == $id){
                    $count ++;
                }
        }
        return $count;
    }

    /**
     * @param $id
     */
    public function addToCart($id)
    {
        $count = 0;
        $array = $this->session->getParam('cart');
        if ($array == null) {
            $array = [];
            $array[] = ['id' => $id, 'amount' => 1];
            $count = 1;
        } else {
            foreach ($array as & $value){
                    if ($value['id'] == $id) {
                        $count++;
                        $value['amount']++;
                    }
                }
            }
        if ($count == 0){
            $array[] = ['id' => $id, 'amount' => 1];
        }
        $this->session->setParam('cart', $array);
    }

    /**
     *
     */
    public function sessionRestart(){
        $this->session->setParam('cart',null);

    }

    /**
     * @param $id
     */
    public function deleteProductFromCart($id){
        $session=$this->session->getParam("cart");
        $key=array_search($id,$session);
        unset($session[$key]);
        $this->session->setParam("cart",$session);

    }


}