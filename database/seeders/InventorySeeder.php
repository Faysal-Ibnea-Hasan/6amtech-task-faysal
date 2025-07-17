<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $users = [
            [
                'name' => 'Faysal Ibnea Hasan',
                'email' => 'devfaysalhasan@gmail.com',
                'password' => '12345678',
                'role' => Role::User,
            ],
            [
                'name' => 'Test User',
                'email' => 'user@example.com',
                'password' => '12345678',
                'role' => Role::User,
            ]
        ];

        foreach ($users as $userData) {
            User::factory()->create([
                ...$userData,
                'password' => Hash::make($userData['password']),
            ]);
        }

        Category::factory(10)->create();
        $categories = Category::all();
        Product::factory(50)->make()->each(function ($product) use ($categories) {
            $product->category_id = $categories->random()->id;
            $product->save();
        });
        $users = User::all();
        $products = Product::all();
        Transaction::factory(1000)->make()->each(function ($transaction) use ($users, $products) {
            $transaction->user_id = $users->random()->id;
            $transaction->product_id = $products->random()->id;
            $transaction->save();
        });
    }
}
