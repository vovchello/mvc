<?php

namespace App\Services\Store\Services;

use App\Models\Product\Product;
use App\Services\Store\StoreService;
use Core\Model;

/**
 * Class CategoryStore
 * @package App\Services\Store\Services
 */
final class ProductStore extends StoreService
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    /**
     * @param Model $model
     * @param array $data
     * @return mixed
     */
    protected function fillFields(Model $model, array $data)
    {
        /**
         * @var Category $model
         */
        $model->setName($data['name']);
        $model->setDescription($data['description']);
        $model->setBrand($data['brand']);
        $model->setCode($data['code']);
        $model->setPrice($data['price']);
        $model->setAvailability($data['availability']);
        $model->setCategoryId($data['category_id']);
        $model->setIsNew($data['is_new']);
        $model->setIsRecommended($data['is_recommended']);
        $model->setStatus($data['status']);

        return $model;
    }
}
