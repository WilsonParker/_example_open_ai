<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use GuzzleHttp\Client;
use OpenAI\Laravel\Facades\OpenAI;
use Tests\TestCase;

class OpenAITest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_call_open_ai_image(): void
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.openai.com',
            // You can set any number of default request options.
            'timeout' => 2.0,
        ]);
        $response = $client->request('post', '/v1/images/generations', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            ],
            'form_params' => [
                'prompt' => 'A cute baby sea otter',
                'n' => 2,
                'size' => '512x512',
            ]
        ]);

        dump($response->getBody()->getContents());
    }

    public function test_call_open_ai_using_library(): void
    {
        $result = OpenAI::images()->create([
            // A text description of the desired image(s). The maximum length is 1000 characters.
            'prompt' => 'A cute baby sea otter',
            // The number of images to generate. Must be between 1 and 10.
            'n' => 2,
            // The size of the generated images. Must be one of 256x256, 512x512, or 1024x1024.
            'size' => '512x512',
            // The format in which the generated images are returned. Must be one of url or b64_json.
            // 'response_format' => 'url',
            // A unique identifier representing your end-user, which can help OpenAI to monitor and detect abuse
            // 'user' => '',
        ]);
        dump($result);
    }
}
