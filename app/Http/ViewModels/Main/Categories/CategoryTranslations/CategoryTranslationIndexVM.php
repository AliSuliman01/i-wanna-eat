<?php


namespace App\Http\ViewModels\Main\Categories\CategoryTranslations;

use App\Domain\Main\Categories\CategoryTranslations\Model\CategoryTranslation;
use Illuminate\Contracts\Support\Arrayable;

class CategoryTranslationIndexVM implements Arrayable
{

    public function get_category_translations(){
    	return CategoryTranslation::all();
	}
    public function toArray(): array
    {
        return $this->get_category_translations()->toArray();
    }
}
