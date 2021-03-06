<?php


namespace App\Http\ViewModels\Main\Categories\Categories;

use App\Domain\Main\Categories\Categories\Model\Category;
use Illuminate\Contracts\Support\Arrayable;

class CategoryIndexVM implements Arrayable
{

    public function get_categories(){
    	return Category::with(['translations','photos'])->get();
	}
    public function toArray(): array
    {
        return $this->get_categories()->toArray();
    }
}
