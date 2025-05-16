<?php

namespace Database\Seeders;

use App\Models\Borrowing;
use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BorrowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = Member::factory()->count(15)->create();

        foreach ($members as $member) {
            $total = rand(1, 15);

            for ($i = 1; $i < $total; $i++) {
                Borrowing::factory()
                    //->count($total)
                    ->for($member)
                    ->create([
                        'created_at' => fake()->dateTimeBetween('-3 month', 'now')
                    ]);
            }
        }
    }
}
