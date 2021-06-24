<?php


namespace App\Domain\Main\Products\ProductPhotos\Actions;


use App\Domain\Main\Products\ProductPhotos\DTO\ProductPhotoDTO;
use App\Domain\Main\Products\ProductPhotos\Model\ProductPhoto;
use Illuminate\Support\Facades\Auth;

class ProductPhotoUpdateAction
{

    public static function execute(
        ProductPhotoDTO $productPhotoDTO
    ){
        $productPhoto = ProductPhoto::find($productPhotoDTO->id);
        $productPhoto->update(array_filter($productPhotoDTO->toArray()));
        $productPhoto->save();
        return $productPhoto;
    }
}
