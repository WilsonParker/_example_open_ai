<?php

namespace App\Models;

class Prompt extends BaseModel
{
    protected $with = ['options'];

    public function options(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PromptOption::class);
    }
}
