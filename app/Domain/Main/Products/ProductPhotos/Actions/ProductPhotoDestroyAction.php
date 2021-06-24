<?php


namespace App\Domain\Main\Products\ProductPhotos\Actions;


use App\Domain\Main\Products\ProductPhotos\DTO\ProductPhotoDTO;
use App\Domain\Main\Products\ProductPhotos\Model\ProductPhoto;
use Illuminate\Support\Facades\Auth;

class ProductPhotoDestroyAction
{
    public static function execute(
        ProductPhotoDTO   $productPhotoDTO
    ){

        $productPhoto = ProductPhoto::find($productPhotoDTO->id);
        $productPhoto->delete();
        return $productPhoto;
    }
}
