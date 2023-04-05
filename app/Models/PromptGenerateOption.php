<?php

namespace App\Models;

class PromptGenerateOption extends BaseModel
{
    public function promptGenerate(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PromptGenerate::class);
    }

    public function option(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PromptOption::class, 'prompt_option_id');
    }
}
