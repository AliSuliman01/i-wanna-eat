<?php


namespace App\Domain\Main\Categories\CategoryPhotos\Actions;


use App\Domain\Main\Categories\CategoryPhotos\DTO\CategoryPhotoDTO;
use App\Domain\Main\Categories\CategoryPhotos\Model\CategoryPhoto;
use Illuminate\Support\Facades\Auth;

class CategoryPhotoDestroyAction
{
    public static function execute(
        CategoryPhotoDTO   $categoryPhotoDTO
    ){

        $categoryPhoto = CategoryPhoto::find($categoryPhotoDTO->id);
        $categoryPhoto->delete();
        return $categoryPhoto;
    }
}
