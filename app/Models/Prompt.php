<?php

namespace App\Models;

class Prompt extends BaseModel
{

    public function options(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PromptOption::class);
    }
}
