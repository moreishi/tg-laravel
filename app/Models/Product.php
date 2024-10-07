<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const ID = 'id';
    const NAME = 'product';
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const PRICE = 'price';
    const CATEGORY = 'category';

}
