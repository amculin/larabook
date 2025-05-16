<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = Member::factory()->count(20)->create();

        foreach ($members as $member) {
            $total = rand(1, 15);

            for ($i = 1; $i < $total; $i++) {
                Transaction::factory()
                    ->for($member)
                    ->create([
                        'created_at' => fake()->dateTimeBetween('-3 month', 'now')
                    ]);
            }
        }
    }
}
