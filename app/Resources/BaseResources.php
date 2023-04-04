<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 * @OA\Property(property="id", type="integer", description="primary key", readOnly="true", example="1"),
 * @OA\Property(property="created_at", type="string", format="date-time", description="Initial creation timestamp", readOnly="true", example="2023-01-01 00:00:00"),
 * @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp", readOnly="true", example="2023-01-01 00:00:00"),
 * )
 * Class BaseResources
 *
 * @package App\Resources
 */
class BaseResources extends JsonResource
{

}
