<?php

namespace Tests\Feature;

use App\Models\Camp;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CampControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_store_method_creates_new_camp_and_redirects_to_index()
    {
        $this->actingAs($user = User::factory()->create());
        $club = $user->club;

        $team1 = Team::factory()->create(['club_id' => $club->id]);
        $team2 = Team::factory()->create(['club_id' => $club->id]);

        $data = [
            'name' => $this->faker->word,
            'payment_type' => 'online',
            'price' => $this->faker->randomFloat(2, 10, 100),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'processing_fee' => $this->faker->randomFloat(2, 1, 10),
            'processing_fee_using_credit_card' => $this->faker->randomFloat(2, 1, 10),
            'net_amount_using_credit_card' => $this->faker->randomFloat(2, 1, 10),
            'total_price_using_credit_card' => $this->faker->randomFloat(2, 1, 10),
            'processing_fee_using_bank_account' => $this->faker->randomFloat(2, 1, 10),
            'net_amount_using_bank_account' => $this->faker->randomFloat(2, 1, 10),
            'total_price_using_bank_account' => $this->faker->randomFloat(2, 1, 10),
            'payment_pay_type' => 'full',
            'installment' => 1,
            'teams' => [$team1->id, $team2->id],
        ];

        $response = $this->post(route('club.camps.store'), $data);

        $response->assertRedirect(route('club.camps.index'));
        $response->assertSessionHas('success', 'Event created successfully.');

        $this->assertDatabaseHas('camps', [
            'club_id' => $club->id,
            'name' => $data['name'],
            'type' => 'public',
            'payment_type' => $data['payment_type'],
            'price' => $data['price'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'processing_fee' => $data['processing_fee'],
            'processing_fee_using_credit_card' => $data['processing_fee_using_credit_card'],
            'net_amount_using_credit_card' => $data['net_amount_using_credit_card'],
            'total_price_using_credit_card' => $data['total_price_using_credit_card'],
            'processing_fee_using_bank_account' => $data['processing_fee_using_bank_account'],
            'net_amount_using_bank_account' => $data['net_amount_using_bank_account'],
            'total_price_using_bank_account' => $data['total_price_using_bank_account'],
            'payment_pay_type' => $data['payment_pay_type'],
            'installment' => $data['installment'],
        ]);

        $this->assertDatabaseHas('camp_team', [
            'camp_id' => Camp::latest()->first()->id,
            'team_id' => $team1->id,
        ]);

        $this->assertDatabaseHas('camp_team', [
            'camp_id' => Camp::latest()->first()->id,
            'team_id' => $team2->id,
        ]);
    }
}