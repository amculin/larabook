<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            MemberSeeder::class,
            PublisherSeeder::class,
            BookSeeder::class,
            TransactionSeeder::class,
            SummarySeeder::class,
        ]);
    }
}
