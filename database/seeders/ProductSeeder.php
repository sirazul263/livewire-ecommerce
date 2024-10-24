<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $faker =Faker\Factory::create();
        $images =[
        'https://m.media-amazon.com/images/I/61CqYq+xwNL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71cVOgvystL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71E+oh38ZqL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61uSHBgUGhL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71nDK2Q8HAL._AC_UL640_QL65_.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/16-kg-washing-machine-13375-8380.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/4t-c70al1x1785-1727.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/sharp-microwave-oven-r-92a0v-price-in-bd-1000x10003696-2527.jpg',
            'https://static-01.daraz.com.bd/p/b7727b8dc0706d188179397b08826a34.jpg',
            'https://static-01.daraz.com.bd/p/7fbe4901178576bbf04907275a1dfe28.jpg',
            'https://static-01.daraz.com.bd/p/7126e45345f95b6344644bb2423d2bba.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/sharp-chest-freezer-sjc-118-wh-price-in-bd-1000x10003198-5987.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/sharp-microwave-oven-r-94a0v-price-in-bd-1000x1000920-2527.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/sm-3006-toaster-waffle-maker-grill-morphy-richards-22487-0672.jpg',
            'https://ftp.esquireelectronicsltd.com/uploads/gallery/aero-new3494-8501.jpg',
            'https://m.media-amazon.com/images/I/71fizOWwhFL._SX466_.jpg',
            'https://m.media-amazon.com/images/I/81+8ik1Qk1L._SX466_.jpg',
            'https://m.media-amazon.com/images/I/41ZukexTE8L._SX300_SY300_QL70_FMwebp_.jpg',
            'https://m.media-amazon.com/images/I/614J0VriTRL._AC_SX466_.jpg',
            'https://m.media-amazon.com/images/I/61Ibl7dJyUL.__AC_SY300_SX300_QL70_FMwebp_.jpg',
            'https://m.media-amazon.com/images/I/41XglJ0oesL._SX300_SY300_QL70_FMwebp_.jpg'
        ];

        $size =[
            "S",
            "M",
            "L",
            'XL',
            'XXL',
            'XXXL',
        ];

        $color =[
            'red',
            'blue',
            'green',
            'yellow',
            'orange',
            'purple',
            'pink',
            'brown',
            'black',
        ];

       foreach (range(0, 500) as $key=>$value){
        $name=$faker->unique()->name;
        Product::create([
            'name' => $name,
            'slug' => Str::slug($name),
            'short_description' =>$faker->text(100),
            'long_description' => $faker->text(300),
            'regular_price' => $faker->numberBetween( 50, 1000),
            'sale_price' => $faker->numberBetween( 50, 1000),
            'image' => $images[$key % count($images)],
            'images' => json_encode($images),
            'size'=>json_encode($size),
            'color'=>json_encode($color),
            'is_active'=>true,
            'is_featured'=>rand(true, false),
            'on_sale'=>rand(true, false),
            'category_id'=>$faker->numberBetween(1,10)
        ]);
       };
    }
}
