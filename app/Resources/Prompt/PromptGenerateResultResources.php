<?php

namespace App\Resources\Prompt;

use App\Resources\BaseResources;

class PromptGenerateResultResources extends BaseResources
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
            'created_at' => $this->formatDateTime($this->created_at),
            'expired_at' => $this->formatDateTime($this->expired_at),
        ];
    }

}
