<?php


namespace App\Domain\Main\Categories\CategoryPhotos\Actions;


use App\Domain\Main\Categories\CategoryPhotos\DTO\CategoryPhotoDTO;
use App\Domain\Main\Categories\CategoryPhotos\Model\CategoryPhoto;
use Illuminate\Support\Facades\Auth;

class CategoryPhotoCreateAction
{
    public static function execute(
        CategoryPhotoDTO $categoryPhotoDTO
    ){

        $categoryPhoto = new CategoryPhoto($categoryPhotoDTO->toArray());
        $categoryPhoto->save();
        return $categoryPhoto;
    }
}
