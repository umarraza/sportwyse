public function test_team_can_be_stored(): void
{
    $this->actingAs($user = User::factory()->create());

    $response = $this->post('/team', [
        'name' => 'Test Team',
        'description' => 'Test Description',
    ]);

    $response->assertStatus(201);
    $this->assertDatabaseHas('teams', [
        'name' => 'Test Team',
        'description' => 'Test Description',
    ]);
}