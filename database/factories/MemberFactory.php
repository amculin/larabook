<?php

namespace Database\Factories;

use amculin\ektp\generator\KTP;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $identity = new KTP();
        $birthDate = $identity->getBirthDate();
        $address = 'Jl. ' . ucfirst(fake()->word()) . ' No. ' . fake()->randomNumber(3, false) . ' ';
        $address .= $identity->getDistrict()->name . ', ' . $identity->getCity()->name . ', ';
        $address .= $identity->getProvince()->name;

        return [
            'id' => $identity->getNIK(),
            'full_name' => fake()->name(),
            'birth_date' => $birthDate->year . '-' . $birthDate->month . '-' . $birthDate->date,
            'address' => $address,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }
}
