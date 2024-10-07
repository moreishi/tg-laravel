<?php

namespace Tests\Feature\Product;

use Tests\Feature\Product\BaseProductTest;
use App\Models\Product;

class ProductTest extends BaseProductTest
{

    public function test_get_products(): void
    {
        $response = $this->get(self::PRODUCT_URI);

        $response->assertStatus(200);
        $content = json_decode($response->getContent());

        $this->assertObjectHasProperty(self::TOTAL, $content);
        $this->assertObjectHasProperty(self::SKIP, $content);
        $this->assertObjectHasProperty(self::LIMIT, $content);
        $this->assertObjectHasProperty(self::PRODUCTS, $content);
    }

    public function test_get_products_categories(): void
    {
        $response = $this->get(self::PRODUCT_CATEGORIES_URI);
        $response->assertStatus(200);

        $content = json_decode($response->getContent())[0];

        $this->assertObjectHasProperty(self::SLUG, $content);
        $this->assertObjectHasProperty(self::NAME, $content);
        $this->assertObjectHasProperty(self::URL, $content);
    }

    public function test_get_products_category_list(): void
    {
        $response = $this->get(self::PRODUCT_CATEGORY_LIST_URI);
        $response->assertStatus(200);

        $this->assertIsArray(json_decode($response->getContent()));
    }

    public function test_post_product_added(): void
    {

        $product = Product::factory()->make();

        $response = $this->post(self::PRODUCT_URI, [
            Product::TITLE => $product[Product::TITLE],
            Product::DESCRIPTION => $product[Product::DESCRIPTION],
            Product::PRICE => $product[Product::PRICE],
            Product::CATEGORY => $product[Product::CATEGORY],
        ]);

        $response->assertStatus(200);
        $content = json_decode($response->getContent());

        $this->assertIsObject($content);

        $this->assertObjectHasProperty(Product::TITLE, $content);
        $this->assertObjectHasProperty(Product::DESCRIPTION, $content);
        $this->assertObjectHasProperty(Product::PRICE, $content);
        $this->assertObjectHasProperty(Product::CATEGORY, $content);

        $content = (array) $content;

        $this->assertEquals($content[Product::TITLE], $product[Product::TITLE]);
        $this->assertEquals($content[Product::DESCRIPTION], $product[Product::DESCRIPTION]);
        $this->assertEquals($content[Product::PRICE], $product[Product::PRICE]);
        $this->assertEquals($content[Product::CATEGORY], $product[Product::CATEGORY]);
    }

    public function test_put_product_updated(): void
    {

        $product = Product::factory()->make();

        $response = $this->put(self::PRODUCT_URI . '/3', [
            Product::TITLE => $product[Product::TITLE],
            Product::DESCRIPTION => $product[Product::DESCRIPTION],
            Product::PRICE => $product[Product::PRICE],
            Product::CATEGORY => $product[Product::CATEGORY],
        ]);

        $response->assertStatus(200);
        $content = json_decode($response->getContent());

        $this->assertIsObject($content);

        $this->assertObjectHasProperty(Product::TITLE, $content);
        $this->assertObjectHasProperty(Product::DESCRIPTION, $content);
        $this->assertObjectHasProperty(Product::PRICE, $content);
        $this->assertObjectHasProperty(Product::CATEGORY, $content);

        $content = (array) $content;

        $this->assertEquals($content[Product::TITLE], $product[Product::TITLE]);
        $this->assertEquals($content[Product::DESCRIPTION], $product[Product::DESCRIPTION]);
        $this->assertEquals($content[Product::PRICE], $product[Product::PRICE]);
        $this->assertEquals($content[Product::CATEGORY], $product[Product::CATEGORY]);
    }

    public function test_delete_product_deleted(): void
    {
        $response = $this->delete(self::PRODUCT_URI . '/3');
        $response->assertStatus(200);
    }

    public function test_delete_product_not_deleted(): void
    {
        $response = $this->delete(self::PRODUCT_URI . '/3000');
        $response->assertStatus(404);
    }

}
