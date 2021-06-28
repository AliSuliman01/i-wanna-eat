<?php

namespace App\Domain\Main\Categories\Categories\Model;

use App\Domain\General\Languages\Model\Language;
use App\Domain\Main\Categories\CategoryPhotos\Model\CategoryPhoto;
use App\Domain\Main\Categories\CategoryTranslations\Model\CategoryTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
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
            return $this->belongsToMany(Language::class,'category_translation')
                        ->using(CategoryTranslation::class)
                        ->wherePivot('deleted_at',null)
                        ->withPivot(['name','description']);
        }
        public function photos(){
            return $this->hasMany(CategoryPhoto::class);
        }
}
