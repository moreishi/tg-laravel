<?php

namespace App\Repositories;

use App\Interfaces\IProductRepository;
use Illuminate\Http\Request;

class ProductRepository implements IProductRepository {

    const PRODUCTS = 'products';
    const CATEGORIES = 'categories';
    const CATEGORY = 'category';
    const SEARCH = 'search';
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

    public function findProductsByCategory(string $slug)
    {
        $json = file_get_contents(self::baseDummyURI() . "/" . self::PRODUCTS . "/" .  self::CATEGORY . "/" . $slug);
        return json_decode($json);
    }

    public function findProductsByQuery($query = null)
    {
        $query = http_build_query($query, '&') ? "?" .  http_build_query($query, '&') : null;
        $json = file_get_contents(self::baseDummyURI() . "/" . self::PRODUCTS . "/" .  self::SEARCH . $query);
        return json_decode($json);
    }


}
