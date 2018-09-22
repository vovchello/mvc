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


    /**
     * @param $id
     */
    public  function addToCart($id){
        $product =$this->product;
        $session = $this->service->addToCart($product-getAll(),$id);
        return $this->redirect('/');


    }
    public  function index(){

        View::renderTemplate('cart/index.html',['session' => $_SESSION['id']]);


    }

}