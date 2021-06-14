<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try{
            Schema::create('restaurants', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->foreignId('region_id')->nullable()->constrained('regions')->cascadeOnDelete();
                $table->integer('stars')->nullable();
                $table->tinyInteger('is_verified_from_us')->nullable()->default(0);
                $table->time('open_at')->nullable();
                $table->time('close_at')->nullable();
                $table->tinyInteger('has_family_section')->nullable()->default(0);
                $table->foreignId('created_by_user_id')->nullable()->constrained('users')->onDelete('cascade');
                $table->foreignId('updated_by_user_id')->nullable()->constrained('users')->onDelete('cascade');
                $table->foreignId('deleted_by_user_id')->nullable()->constrained('users')->onDelete('cascade');
                $table->timestamps();
                $table->softDeletes();
            });
        }catch (\Exception $e){
                $this->down();
                throw $e;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
