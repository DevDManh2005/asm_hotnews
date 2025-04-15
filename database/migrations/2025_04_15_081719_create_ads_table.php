<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');  // Tiêu đề quảng cáo
            $table->text('description')->nullable();  // Mô tả
            $table->string('image')->nullable();  // Hình ảnh quảng cáo
            $table->string('brand_name')->nullable();  // Tên thương hiệu
            $table->string('product_name')->nullable();  // Tên sản phẩm
            $table->string('link')->nullable();  // Đường link liên kết
            $table->date('expiry_date')->nullable();  // Ngày hết hạn quảng cáo
            $table->timestamps();  // Created at và updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
