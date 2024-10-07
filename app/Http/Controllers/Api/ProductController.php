<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use App\DTO\ProductDTO;


class ProductController extends BaseController
{

    public $productRepository;
    public $productService;

    public function __construct(
        ProductRepository $productRepository,
        ProductService $productService)
    {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->productRepository->findAll($request->query->all());
    }

    /**
     * store
     */
    public function store(Request $request) {

        $dto = new ProductDTO();
        $dto->title = $request->get('title');
        $dto->description = $request->get('description');
        $dto->price = (float) $request->get('price');
        $dto->category = $request->get('category');

        return json_encode($this->productService->create($dto));

    }

    /**
     * update
     */
    public function update(Request $request, int $id) {

        $dto = new ProductDTO();
        $dto->id = $id;
        $dto->title = $request->get('title');
        $dto->description = $request->get('description');
        $dto->price = (float) $request->get('price');
        $dto->category = $request->get('category');

        return json_encode($this->productService->update($dto, $id));

    }

    public function destroy(int $id) {
        return $this->productService->delete($id);
    }

    /**
     * update
     */
    public function show(int $id)
    {
        return json_encode($this->productRepository->findById($id));
    }

    public function categories()
    {
        return $this->productRepository->findAllCategories();
    }

    public function category_list()
    {
        return $this->productRepository->findAllCategoryList();
    }
}
