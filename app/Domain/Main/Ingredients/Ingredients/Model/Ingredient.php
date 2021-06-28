<?php

namespace App\Domain\Main\Ingredients\Ingredients\Model;

use App\Domain\General\Languages\Model\Language;
use App\Domain\Main\Ingredients\IngredientTranslation\Model\IngredientTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory,SoftDeletes;

        protected $guarded = [
            'id',
            'created_at',
            'updated_at',
            'deleted_at',
        ];

        protected $hidden = [
            'created_at',
            'updated_at',
            'deleted_at',
            'created_by_user_id',
            'updated_by_user_id',
            'deleted_by_user_id',
        ];

        public function translations(){
            return $this->belongsToMany(Language::class,'ingredient_translation')
                        ->using(IngredientTranslation::class)
                        ->wherePivot('deleted_at',null)
                        ->withPivot(['name']);
        }
}
