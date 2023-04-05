<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PromptGenerateTest extends TestCase
{
    public function test_store_prompt_generate_returns_a_successful_response(): void
    {
        $response = $this->post(route('api.prompt.generate.store', [1]), [
            'weather' => 'sunny',
            'prompt' => 'banging clams',
        ]);

        $response->assertStatus(200);
    }

}
