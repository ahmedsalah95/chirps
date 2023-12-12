<?php

namespace Tests\Feature\Chirp;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ChirpTest extends TestCase
{

    use RefreshDatabase;

    public function test_chirp_component_initialization()
    {
        $response = $this->get('/chirps');
        $response->assertStatus(302);
    }
    public function test_chirp_can_be_inserted()
    {
        $user = User::factory()->create();
        Livewire::actingAs($user)
            ->test('chirps.create')
            ->set('message', 'Test chirp content')
            ->call('store');

        $this->assertDatabaseHas('chirps', [
            'user_id' => $user->id,
            'message' => 'Test chirp content',
        ]);
    }
    public function test_chirp_form_validation()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test('chirps.create') // Make sure to use the correct Livewire component name
            ->set('message', '')
            ->call('store')
            ->assertHasErrors(['message' => 'required']);
    }

    public function test_chirp_message_can_be_updated()
    {
        $user = User::factory()->create();
        $chirp = Chirp::factory()->create(['user_id' => $user->id]);

        Livewire::actingAs($user)
            ->test('chirps.edit', ['chirp' => $chirp])
            ->set('message', 'Updated chirp message')
            ->call('update');

        $this->assertDatabaseHas('chirps', [
            'id' => $chirp->id,
            'message' => 'Updated chirp message',
        ]);
    }
    public function test_chirp_edit_form_cancellation()
    {
        $user = User::factory()->create();
        $chirp = Chirp::factory()->create(['user_id' => $user->id]);

        Livewire::actingAs($user)
            ->test('chirps.edit', ['chirp' => $chirp])
            ->set('message', 'Updated chirp message')
            ->call('cancel');

        $this->assertDatabaseHas('chirps', [
            'id' => $chirp->id,
            'message' => $chirp->message,
        ]);
    }
    public function test_chirp_can_be_deleted()
    {
        $user = User::factory()->create();
        $chirp = Chirp::factory()->create();
        Livewire::actingAs($user)
            ->test('chirps.list', ['chirp' => $chirp])
            ->call('delete');
        $this->assertDatabaseHas('chirps', ['id' => $chirp->id]);
    }

    public function test_all_chirp_messages_are_visible()
    {
        $user = User::factory()->create();
        $chirps = Chirp::factory()->count(3)->create(['user_id' => $user->id]);

        $response = Livewire::actingAs($user)
            ->test('chirps.list', ['chirps' => $chirps]);

        foreach ($chirps as $chirp) {
            $response->assertSee($chirp->message);
        }
    }
}
