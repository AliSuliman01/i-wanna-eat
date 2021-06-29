<?php

namespace App\Domain\Main\Products\Products\Model;

use App\Domain\General\Languages\Model\Language;
use App\Domain\Main\Ingredients\Ingredients\Model\Ingredient;
use App\Domain\Main\Products\ProductIngredient\Model\ProductIngredient;
use App\Domain\Main\Products\ProductPhotos\Model\ProductPhoto;
use App\Domain\Main\Products\ProductTranslation\Model\ProductTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Concerns\AsPivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

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

    public function translations()
    {
        return $this->belongsToMany(Language::class, 'product_translation')
            ->using(ProductTranslation::class)
            ->wherePivot('deleted_at', null)
            ->withPivot(['name', 'description']);
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'product_ingredient')
            ->using(ProductIngredient::class)
            ->wherePivot('deleted_at', null);
    }
}
