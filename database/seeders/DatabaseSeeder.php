<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Subscriber;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $user           = new User();
        $user->name     = 'Mg Mg';
        $user->email    = 'mgmg@gmail.com';
        $user->role     = 'admin';
        $user->phone    = '09 123123123';
        $user->address  = 'Yangon';
        $user->password = Hash::make('password');
        $user->save();

        $user           = new User();
        $user->name     = 'Ag Ag';
        $user->email    = 'agag@gmail.com';
        $user->role     = 'admin';
        $user->phone    = '09 234234234';
        $user->address  = 'Yangon';
        $user->password = Hash::make('password');
        $user->save();

        $user           = new User();
        $user->name     = 'Jo Jo';
        $user->email    = 'jojo@gmail.com';
        $user->phone    = '09 223223223';
        $user->address  = 'Yangon';
        $user->password = Hash::make('password');
        $user->save();

        $user           = new User();
        $user->name     = 'Mo Mo';
        $user->email    = 'momo@gmail.com';
        $user->phone    = '09 445445445';
        $user->address  = 'Yangon';
        $user->password = Hash::make('password');
        $user->save();

        // Category
        $category = new Category();
        $category->name = 'Laptop';
        $category->save();

        $category = new Category();
        $category->name = 'Smart Phone';
        $category->save();

        $category = new Category();
        $category->name = 'Watch';
        $category->save();

        // Product
        $json = File::get(public_path() . '/files/products.json');
        $objs = json_decode($json);

        foreach($objs as $obj){
           $product = new Product();
           $product->category_id    = $obj->category_id;
           $product->name           = $obj->name;
           $product->original_price = $obj->original_price;
           $product->offer_price    = $obj->offer_price;
           $product->brand          = $obj->brand;
           $product->description    = $faker->sentence();
           $product->save();
        }

        // Subscriber
        $subscriber = new Subscriber();
        $subscriber->email = 'johndoe@example.com';
        $subscriber->save();

        $subscriber = new Subscriber();
        $subscriber->email = 'janedoe@example.com';
        $subscriber->save();

        // Review
        $review = new Review();
        $review->name    = 'John Doe';
        $review->email   = 'john@exmaple.com';
        $review->message = $faker->sentence();
        $review->save();

        $review = new Review();
        $review->name    = 'Jane Doe';
        $review->email   = 'jane@exmaple.com';
        $review->message = $faker->sentence();
        $review->save();
    }
}
