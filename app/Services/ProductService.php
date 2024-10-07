<?php

namespace App\Services;

use App\Interfaces\IProductService;
use App\DTO\ProductDTO;
use App\Models\Product;
use Illuminate\Http\Response;

class ProductService implements IProductService {

    public function create(ProductDTO $dto) : ProductDTO {

        $host = config('services.dummyJSON');
        $url = $host . '/products/add';

        $response = self::curl_request($url, "POST",[
            Product::TITLE => $dto->title,
            Product::DESCRIPTION => $dto->description,
            Product::PRICE => $dto->price,
            Product::CATEGORY => $dto->category,
        ]);

        return $response;
    }

    public function update(ProductDTO $dto, $id) : ProductDTO {

        $host = config('services.dummyJSON');
        $url = $host . '/products/' . $id;

        $response = self::curl_request($url, "PUT",[
            Product::TITLE => $dto->title,
            Product::DESCRIPTION => $dto->description,
            Product::PRICE => $dto->price,
            Product::CATEGORY => $dto->category,
        ], $id);

        return $response;

    }

    public function delete(int $id) {

        $host = config('services.dummyJSON');
        $url = $host . '/products/' . $id;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return response()->json($result)->setStatusCode($httpCode);

    }

    private function curl_request($url, $method, $fields_string, $id = null) : ProductDTO {

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);

        switch($method) {
            case 'PUT':
                curl_setopt($ch,CURLOPT_CUSTOMREQUEST, $method);
            case 'POST':
                curl_setopt($ch,CURLOPT_POST, true);
            case "DELETE":
                curl_setopt($ch,CURLOPT_CUSTOMREQUEST, $method);
        }

        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields_string));
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $response =  curl_exec($ch);
        // $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        $object =  json_decode($response);

        $dto = new ProductDTO();
        $dto->id = $id ?? $object->id;
        $dto->title = $object->title;
        $dto->description =  $object->description;
        $dto->price =  $object->price;
        $dto->category =  $object->category;

        return $dto;

    }


}
