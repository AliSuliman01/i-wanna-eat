<?php


namespace App\Domain\Main\Categories\Categories\Actions;


use App\Domain\Main\Categories\Categories\DTO\CategoryDTO;
use App\Domain\Main\Categories\Categories\Model\Category;
use Illuminate\Support\Facades\Auth;

class CategoryDestroyAction
{
    public static function execute(
        CategoryDTO   $categoryDTO
    ){

        $category = Category::find($categoryDTO->id);
        $category->delete();
        return $category;
    }
}
