<?php


namespace App\Domain\Main\Categories\CategoryPhotos\Actions;


use App\Domain\Main\Products\ProductPhotos\Model\ProductPhoto;

class CategoryPhotoDestroyElseAction
{

    public static function execute($categoryId,$categoryPhotos){
        ProductPhoto::where('category_id',$categoryId)->whereNotIn('id',$categoryPhotos)->delete();
    }
}
