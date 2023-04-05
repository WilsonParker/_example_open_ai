<?php

namespace App\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      @OA\Property(property="id", type="integer", description="primary key", readOnly="true", example="1"),
 *      @OA\Property(property="created_at", type="string", format="date-time", description="Initial creation timestamp", readOnly="true", example="2023-01-01 00:00:00"),
 *      @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp", readOnly="true", example="2023-01-01 00:00:00"),
 * )
 * @OA\SecurityScheme(
 *     securityScheme="bearer_token",
 *     type="http",
 *     in="header",
 *     scheme="bearer",
 * ),
 * Class BaseResources
 *
 * @package App\Resources
 */
class BaseResources extends JsonResource
{
    protected string $format = 'Y-m-d H:i:s';

    protected function formatDateTime(Carbon|string $date): string
    {
        if (is_string($date)) {
            $date = Carbon::parse($date);
        }
        return $date->format($this->format);
    }
}
