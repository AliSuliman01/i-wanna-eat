<?php


namespace App\Domain\Main\Products\ProductPhotos\Actions;


use App\Domain\Main\Products\ProductPhotos\Model\ProductPhoto;

class ProductPhotoDestroyElseAction
{
    public static function execute($productId,$productPhotos){
        ProductPhoto::where('product_id',$productId)->whereNotIn('id',$productPhotos)->delete();
    }
}
