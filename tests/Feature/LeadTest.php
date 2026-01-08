<?php

namespace Tests\Feature;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LeadTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_cannot_view_another_users_lead()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $lead = Lead::factory()->create(['assigned_to' => $user1->id]);

        $response = $this->actingAs($user2)->get(route('leads.show', $lead));

        $response->assertStatus(403);
    }

    /** @test */
    public function lead_creation_requires_full_name_and_phone()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('leads.store'), [
            'full_name' => '',
            'phone' => '',
            'status' => 'new'
        ]);

        $response->assertSessionHasErrors(['full_name', 'phone']);
    }

    /** @test */
    public function assigned_to_is_automatically_set_to_current_user()
    {
        $user = User::factory()->create();

        $leadData = [
            'full_name' => 'Ivan Ivanov',
            'phone' => '123456789',
            'status' => 'new',
            'note' => 'Some note'
        ];

        $this->actingAs($user)->post(route('leads.store'), $leadData);

        $this->assertDatabaseHas('leads', [
            'full_name' => 'Ivan Ivanov',
            'assigned_to' => $user->id
        ]);
    }
}
