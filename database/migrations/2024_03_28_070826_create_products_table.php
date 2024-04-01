<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('gallery');
            $table->string('category');
            $table->string('description');
            $table->timestamps();
        });
        Product::firstOrCreate([
            'name' => 'Boat Earphone',
            'price' => '150$',
            'gallery' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'category' => 'Head phone',
            'description' => 'Photo smartphone screen mockup mobile ui application template cellphone frame with blank display isolated templates',
        ]);
        Product::firstOrCreate([
            'name' => 'iPhone',
            'price' => '2500$',
            'gallery' => 'https://plus.unsplash.com/premium_photo-1680985551009-05107cd2752c?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'category' => 'Mobile',
            'description' => 'Photo smartphone screen mockup mobile ui application template cellphone frame with blank display isolated templates',
        ]);
        Product::firstOrCreate([
            'name' => 'LG Smart LED',
            'price' => '500$',
            'gallery' => 'https://media.istockphoto.com/id/2057042952/photo/tv-on-the-wood-cabinet-in-modern-living-room-with-plant-on-concrete-wall-background.jpg?s=2048x2048&w=is&k=20&c=e6jhS1MCgLK7MhxIfu8IKOcxhSphFYBNhgGniF6J_ms=',
            'category' => 'Tv',
            'description' => 'Photo smartphone screen mockup mobile ui application template cellphone frame with blank display isolated templates',
        ]);
        Product::firstOrCreate([
            'name' => 'Rolex ZXR879',
            'price' => '250$',
            'gallery' => 'https://images.unsplash.com/photo-1539874754764-5a96559165b0?q=80&w=2130&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'category' => 'Watch',
            'description' => 'Photo smartphone screen mockup mobile ui application template cellphone frame with blank display isolated templates',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
