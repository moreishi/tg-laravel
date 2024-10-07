<?php

namespace Tests\Feature\DummyService;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BaseDummyServiceTest extends TestCase
{
    const PRODUCTS = 'prodcuts';
    const CATEGORIES = 'categories';
    const CATEGORIES_LIST = 'categories-list';

    const ACTION_ADD = '/add';
    const ACTION_UPDATE = '/update';
    const ACTION_DELETE = '/delete';

    public function baseURL() {
        return env('URI_DUMMY');
    }

}
