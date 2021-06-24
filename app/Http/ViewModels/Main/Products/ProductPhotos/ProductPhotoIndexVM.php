<?php


namespace App\Http\ViewModels\Main\Products\ProductPhotos;

use App\Domain\Main\Products\ProductPhotos\Model\ProductPhoto;
use Illuminate\Contracts\Support\Arrayable;

class ProductPhotoIndexVM implements Arrayable
{

    public function get_product_photos(){
    	return ProductPhoto::all();
	}
    public function toArray(): array
    {
        return $this->get_product_photos()->toArray();
    }
}
