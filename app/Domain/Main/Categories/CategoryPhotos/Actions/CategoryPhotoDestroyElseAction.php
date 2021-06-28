<?php


namespace App\Domain\Main\Categories\CategoryPhotos\Actions;


use App\Domain\Main\Categories\CategoryPhotos\Model\CategoryPhoto;

class CategoryPhotoDestroyElseAction
{

    public static function execute($categoryId,$categoryPhotos){
        CategoryPhoto::where('category_id',$categoryId)->whereNotIn('id',$categoryPhotos)->delete();
    }
}
