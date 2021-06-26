<?php

namespace App\Domain\Main\Orders\Orders\Model;

use App\Domain\Main\Products\ProductOrder\Model\ProductOrder;
use App\Domain\Main\Products\Products\Model\Product;
use App\Domain\Main\Services\ServiceOrder\Model\ServiceOrder;
use App\Domain\Main\Services\Services\Model\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
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
        public function products(){
            return $this->belongsToMany(Product::class,'product_order')
                        ->using(ProductOrder::class)
                        ->wherePivot('deleted_at',null);
        }
        public function services(){
            return $this->belongsToMany(Service::class,'service_order')
                        ->using(ServiceOrder::class)
                        ->wherePivot('deleted_at',null);
        }
}
