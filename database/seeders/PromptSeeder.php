<?php

namespace Database\Seeders;

use App\Models\Prompt;
use Illuminate\Database\Seeder;

class PromptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prompt = Prompt::create([
            'title' => 'A cute baby sea otter',
            'description' => 'A cute baby sea otter',
            'template' => 'Cute baby sea otter doing [PROMPT] the weather [WEATHER]',
            'user_id' => 1,
        ]);

        $prompt->options()->create([
            'name' => 'WEATHER',
        ]);

        $prompt->options()->create([
            'name' => 'PROMPT',
        ]);
    }
}
