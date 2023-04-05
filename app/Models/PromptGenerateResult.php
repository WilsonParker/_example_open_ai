<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromptGenerateResult extends Model
{
    protected $fillable = [
        'url',
        'expired_at',
    ];

    public function promptGenerate(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PromptGenerate::class);
    }
}
