<?php


namespace App\Http\ViewModels\Main\Categories\CategoryPhotos;

use App\Domain\Main\Categories\CategoryPhotos\Model\CategoryPhoto;
use Illuminate\Contracts\Support\Arrayable;


class CategoryPhotoShowVM implements Arrayable
{

    private $categoryPhotoId;

    public function __construct($props)
    {
        $this->categoryPhotoId = $props['id'] ;
    }

    private function get_CategoryPhoto(){
        return CategoryPhoto::find($this->categoryPhotoId);
    }
    public function toArray(): array
    {
        return  $this->get_CategoryPhoto()->toArray();
    }
}
