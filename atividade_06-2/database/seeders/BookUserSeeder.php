<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('book_user')->insert([
            ['book_id' => 1, 'user_id' => 1, 'borrowed_at' => now()],
            ['book_id' => 2, 'user_id' => 2, 'borrowed_at' => now()],
        ]);
    }
}

