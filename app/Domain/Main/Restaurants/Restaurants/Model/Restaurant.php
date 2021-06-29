<?php

namespace App\Domain\Main\Restaurants\Restaurants\Model;

use App\Domain\General\Regions\Regions\Model\Region;
use App\Domain\Main\Categories\Categories\Model\Category;
use App\Domain\Main\Products\Products\Model\Product;
use App\Domain\Main\Restaurants\RestaurantPhotos\Model\RestaurantPhoto;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes;

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

        public function region(){
            return $this->belongsTo(Region::class);
        }
        public function photos(){
            return $this->hasMany(RestaurantPhoto::class);
        }
        public function categories(){
            return $this->belongsToMany(Category::class,'products')
                        ->wherePivot('deleted_at',null)->distinct();
        }
}
