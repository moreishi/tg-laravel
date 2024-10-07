<?php

namespace Tests\Feature\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BaseProductTest extends TestCase
{
    const SKIP = "skip";
    const LIMIT = "limit";
    const TOTAL = "total";
    const PRODUCTS = "products";

    const SLUG = "slug";
    const NAME = "name";
    const URL = "url";

    const PRODUCT_URI = "/api/products";
    const PRODUCT_CATEGORIES_URI = "/api/products/categories";
    const PRODUCT_CATEGORY_LIST_URI = "/api/products/category-list";
}
