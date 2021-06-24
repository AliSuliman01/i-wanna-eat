<?php


namespace App\Domain\Main\Products\ProductPhotos\Actions;


use App\Domain\Main\Products\ProductPhotos\DTO\ProductPhotoDTO;
use App\Domain\Main\Products\ProductPhotos\Model\ProductPhoto;
use Illuminate\Support\Facades\Auth;

class ProductPhotoCreateAction
{
    public static function execute(
        ProductPhotoDTO $productPhotoDTO
    ){

        $productPhoto = new ProductPhoto($productPhotoDTO->toArray());
        $productPhoto->save();
        return $productPhoto;
    }
}
