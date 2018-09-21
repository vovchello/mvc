<?php
/**
 * Created by PhpStorm.
 * User: test
 * Date: 9/21/2018
 * Time: 12:05 PM
 */

namespace App\Controllers\Admin;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Services\Store\Services\ProductStore;
use App\Services\Validators\Validators\ProductStoreValidator;
use Core\Controller;
use Core\Request;
use Core\View;


class ProductController extends Controller
{

    /**
     * @var Category
     */
    private $product;

    /**
     * @var ProductStoreValidator
     */
    private $productValidator;

    /**
     * @var ProductStore
     */
    private $productStore;

    /**
     * @var Category
     */
    private $categories;

    /**
     * CategoryController constructor.
     * @param Request $request
     * @param Product $product
     * @param ProductStoreValidator $validator
     * @param ProductStore $categoryStore
     */
    public function __construct(
        Request $request,
        Product $product,
        Category $categories,
        ProductStoreValidator $validator,
        ProductStore $productStore
    ) {
        $this->product = $product;
        $this->productValidator = $validator;
        $this->productStore = $productStore;
        $this->categories = $categories;
        parent::__construct($request);
    }

    /**
     *
     */
    public function index()
    {
        $products= $this->product->getAll();
        $categories= $this->categories->getAll();
        View::renderTemplate('admin/products/index.html', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     *
     */
    public function create()
    {
        $categories= $this->categories->getAll();
        View::renderTemplate('admin/products/create.html',[
            'categories' => $categories
        ]);
    }

    /**
     * @return
     */
    public function store()
    {
        $data = $this->request->getInput();
        $this->productStore->store($data);
        if ($this->productValidator->validate($data)) {
            $this->productStore->store($data);
        }

        return $this->redirect('\admin\products');
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->product->delete($id);

        return $this->redirect('\admin\products');
    }

    /**
     * @param $id
     */
    public function update($id)
    {
        $product = $this->product->findById($id);
        $categories= $this->categories->getAll();
        View::renderTemplate('admin/products/update.html', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

}