<?php

namespace App\Interfaces;

use App\DTO\ProductDTO;
use Illuminate\Http\JsonResponse;

interface IProductService {

    public function create(ProductDTO $dto) : ProductDTO;

    public function update(ProductDTO $dto, int $id) : ProductDTO;

    public function delete(int $id);

}
