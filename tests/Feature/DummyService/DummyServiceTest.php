<?php

namespace Tests\Feature\DummyService;

use Tests\Feature\DummyService\BaseDummyServiceTest;
use Tests\TestCase;

class DummyServiceTest extends BaseDummyServiceTest
{

    public function test_dummy_json_url_isvalid()
    {
        $url = filter_var(self::baseURL(), FILTER_SANITIZE_URL);

        filter_var($url, FILTER_VALIDATE_URL) !== false ?
            $this->assertTrue(true) : $this->assertTrue(false);
    }


    public function test_dummy_json_products_isvalid()
    {
        $url = filter_var(self::baseURL() . "/" . self::PRODUCTS, FILTER_SANITIZE_URL);

        filter_var($url, FILTER_VALIDATE_URL) !== false ?
            $this->assertTrue(true) : $this->assertTrue(false);
    }


    public function test_dummy_json_product_categories_isvalid()
    {
        $url = filter_var(self::baseURL() . "/" . self::PRODUCTS . "/" . self::CATEGORIES, FILTER_SANITIZE_URL);

        filter_var($url, FILTER_VALIDATE_URL) !== false ?
            $this->assertTrue(true) : $this->assertTrue(false);
    }


    public function test_dummy_json_product_categories_list_isvalid()
    {
        $url = filter_var(self::baseURL() . "/" . self::PRODUCTS . "/" . self::CATEGORIES_LIST, FILTER_SANITIZE_URL);

        filter_var($url, FILTER_VALIDATE_URL) !== false ?
            $this->assertTrue(true) : $this->assertTrue(false);
    }


    public function test_dummy_json_product_add_isvalid()
    {
        $url = filter_var(self::baseURL() . "/" . self::PRODUCTS . "/add", FILTER_SANITIZE_URL);

        filter_var($url, FILTER_VALIDATE_URL) !== false ?
            $this->assertTrue(true) : $this->assertTrue(false);
    }
}
