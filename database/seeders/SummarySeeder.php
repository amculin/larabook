<?php

namespace Database\Seeders;

use App\Models\Summary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SummarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $year = date('Y');

        for ($month = 3; $month <=5; $month++) {
            $days = 31;

            if ($month == 4) {
                $days = 30;
            }

            for ($date = 1; $date <= $days; $date++) {
                $fullDate = $year . '-' . $month . '-' . $date;

                Summary::factory()
                    ->create([
                        'date' => $fullDate,
                        'is_borrowed' => 0
                    ]);

                Summary::factory()
                    ->create([
                        'date' => $fullDate,
                        'is_borrowed' => 1
                    ]);
            }
        }
    }
}
