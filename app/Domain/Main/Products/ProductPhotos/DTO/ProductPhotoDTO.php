<?php


namespace App\Domain\Main\Products\ProductPhotos\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ProductPhotoDTO extends DataTransferObject
{
    /* @var integer|null */
    public $id;
    /* @var integer|null */
    public $product_id;
    /* @var string|null */
    public $photo_path;


    public static function fromRequest($request)
    {
        return new self([
            'id' => $request['id'] ?? null,
            'product_id' => $request['product_id'] ?? null,
            'photo_path' => $request['photo_path'] ?? null,

        ]);
    }
}
