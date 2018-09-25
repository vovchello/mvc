<?php
/**
 * Created by PhpStorm.
 * User: test
 * Date: 9/22/2018
 * Time: 10:09 AM
 */

namespace App\Controllers\Cart;

use App\Models\Product\Product;
use App\Services\Cart\CartService;
use Core\Controller;
use Core\Request;
use Core\View;

/**
 * Class CartController
 * @package App\Controllers\Cart
 */
class CartController extends  Controller
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * @var
     */
    protected $request;

    /**
     * @var AddToCartService
     */
    protected $service;

    /**
     * CartController constructor.
     * @param $product
     */
    public function __construct(
        Request $request,
        Product $product,
        CartService $service
    )
    {
        $this->product = $product;
        $this->requrest = $request;
        $this->service = $service;
    }

    public function refreshCart(){
        $this->service->sessionRestart();
        return $this->redirect('/');
    }
    /**
     * @param $id
     */
    public  function addToCart($id){
        $this->service->addToCart($id);
        return $this->redirect('/');


    }

    public function deleteProductFromCart($id){
        $this->service->deleteProductFromCart($id);
        return $this->redirect('/cart');
    }
    /**
     *
     */
    public  function index(){
        $products =$this->product->getAll();
        View::renderTemplate('/cart/index.html',['sessions' => $_SESSION['cart'],'products' => $products]);


    }

}