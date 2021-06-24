<?php


namespace App\Domain\Main\Categories\Categories\Actions;


use App\Domain\Main\Categories\Categories\DTO\CategoryDTO;
use App\Domain\Main\Categories\Categories\Model\Category;
use Illuminate\Support\Facades\Auth;

class CategoryCreateAction
{
    public static function execute(
        CategoryDTO $categoryDTO
    ){

        $category = new Category($categoryDTO->toArray());
        $category->save();
        return $category;
    }
}
