<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();

        Kategori::create([
            'nama' => 'Web Programming',
            'slug' => 'web-programming'
        ]); 

        Kategori::create([
            'nama' => 'Sains',
            'slug' => 'sains'
        ]); 

        Kategori::create([
            'nama' => 'Personal',
            'slug' => 'personal'
        ]); 


        Post::factory(16)->create();
    }
}
