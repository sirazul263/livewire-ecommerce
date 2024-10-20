<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
   
    public function run(): void
    {   
        $images =[
        "https://img.drz.lazcdn.com/g/kf/Sef13b4ed593a4e859e3598c8348d7f30T.jpg_120x120q80.jpg",
        "https://img.drz.lazcdn.com/static/bd/p/0ff29e332c1232b24d5b8e3683cf8e4c.jpg_720x720q80.jpg",
        "https://img.drz.lazcdn.com/static/bd/p/1904ade1a690045648a5f5370ac779c8.jpg_720x720q80.jpg",
        "https://img.drz.lazcdn.com/static/bd/p/b61ebb5000ab4f94ff44799bc610193c.jpg_720x720q80.jpg",
         "https://img.drz.lazcdn.com/g/kf/Sf778b0d81f394c16b6fc54aea796fde7I.jpg_120x120q80.jpg",
        'https://img.drz.lazcdn.com/static/bd/p/d05e176264cc325eb8ada0434e440bb9.jpg_120x120q80.jpg',
        "https://img.drz.lazcdn.com/static/bd/p/84b3f5e609e4e6c993e50f3af31d01e5.jpg_720x720q80.jpg",
        "https://img.drz.lazcdn.com/static/bd/p/40f589e8c9b1f7e0ef58596cb673d5a1.jpg_120x120q80.jpg",
        "https://img.drz.lazcdn.com/static/bd/p/0553ea428dcaf196f45d352870c9166a.jpg_720x720q80.jpg",
        "https://img.drz.lazcdn.com/static/bd/p/e17d6fc668009a2b25512d6830ab2a85.jpg_720x720q80.jpg",
        "https://img.drz.lazcdn.com/static/bd/p/c381c122829e2d5cec03b9285dbe0932.jpg_120x120q80.jpg",
        ];

        $categories =[
            'Electronic Devices',
            'TV & Home Appliances',
            'Health & Beauties',
            'Babies & Toys',
            'Groceries & Pets',
            'Home & Life Styles',
            'Women Fashion',
            'Mens Fashion',
            'Watched & Accessories',
            'Sports & Outdoor',
            'Automotive & Motorbike',
        ];

       foreach ($categories as $key=>$value){
             Category::create([
             'name' => $value,
             'slug' => Str::slug($value),
             'image'=>$images[$key],
             'status' => rand(0,1),
             'created_at' => now(),
             'updated_at' => now(),
             ]);
       };
    }
}
