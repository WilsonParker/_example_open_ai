<?php

namespace App\Services\OpenAI\Images;

use OpenAI\Laravel\Facades\OpenAI;

class ApiService
{
    public function call(string $prompt, int $n = 1, ImageSize $size = ImageSize::s512): array
    {
        return OpenAI::images()->create([
            // A text description of the desired image(s). The maximum length is 1000 characters.
            'prompt' => $prompt,
            // The number of images to generate. Must be between 1 and 10.
            'n' => $n,
            // The size of the generated images. Must be one of 256x256, 512x512, or 1024x1024.
            'size' => $size->value,
            // The format in which the generated images are returned. Must be one of url or b64_json.
            // 'response_format' => 'url',
            // A unique identifier representing your end-user, which can help OpenAI to monitor and detect abuse
            // 'user' => '',
        ]);
    }
}
