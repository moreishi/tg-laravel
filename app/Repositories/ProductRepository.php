<?php

namespace App\Repositories;

use App\Interfaces\IProductRepository;

class ProductRepository implements IProductRepository {

    const PRODUCTS = 'products';
    const CATEGORIES = 'categories';
    const CATEGORY_LIST = 'category-list';

    public function baseDummyURI() {
        return config('services.dummyJSON');
    }

    public function findAll($query = null)
    {
        $query = http_build_query($query, '&') ? "?" .  http_build_query($query, '&') : null;
        $json = file_get_contents(self::baseDummyURI() . '/' . self::PRODUCTS . $query);
        return json_decode($json);
    }

    public function findById(int $productId)
    {
        $json = file_get_contents(self::baseDummyURI() . '/' . self::PRODUCTS . '/' . $productId);
        return json_decode($json);
    }

    public function findAllCategories()
    {
        $json = file_get_contents(self::baseDummyURI() . "/" . self::PRODUCTS . "/" . self::CATEGORIES);
        return json_decode($json);
    }

    public function findAllCategoryList()
    {
        $json = file_get_contents(self::baseDummyURI() . "/" . self::PRODUCTS . "/" .  self::CATEGORY_LIST);
        return json_decode($json);
    }


}
