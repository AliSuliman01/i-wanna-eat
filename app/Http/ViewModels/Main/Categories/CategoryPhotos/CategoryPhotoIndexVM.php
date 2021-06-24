<?php


namespace App\Http\ViewModels\Main\Categories\CategoryPhotos;

use App\Domain\Main\Categories\CategoryPhotos\Model\CategoryPhoto;
use Illuminate\Contracts\Support\Arrayable;

class CategoryPhotoIndexVM implements Arrayable
{

    public function get_category_photos(){
    	return CategoryPhoto::all();
	}
    public function toArray(): array
    {
        return $this->get_category_photos()->toArray();
    }
}
