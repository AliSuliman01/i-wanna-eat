<?php


namespace App\Http\ViewModels\Main\Products\ProductPhotos;

use App\Domain\Main\Products\ProductPhotos\Model\ProductPhoto;
use Illuminate\Contracts\Support\Arrayable;


class ProductPhotoShowVM implements Arrayable
{

    private $productPhotoId;

    public function __construct($props)
    {
        $this->productPhotoId = $props['id'] ;
    }

    private function get_ProductPhoto(){
        return ProductPhoto::find($this->productPhotoId);
    }
    public function toArray(): array
    {
        return  $this->get_ProductPhoto()->toArray();
    }
}
