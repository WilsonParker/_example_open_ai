<?php

namespace App\Resources\Prompt;

use App\Resources\BaseResources;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *  @OA\Property(
 *     property="id",
 *     type="integer",
 *     description="id",
 *         @OA\Examples(value="1"),
 *  ),
 *  @OA\Property(
 *     property="url",
 *     type="string",
 *     description="image url",
 *     example="https://oaidalleapiprodscus.blob.core.windows.net/private/org-aoEz5iNLIebmbf63rluY80og/user-qu4iAXir7V7epx4GnSdnMeVz/img-ioNQVko8vomEodTbjN965eBP.png?st=2023-04-04T07%3A39%3A18Z&se=2023-04-04T09%3A39%3A18Z&sp=r&sv=2021-08-06&sr=b&rscd=inline&rsct=image/png&skoid=6aaadede-4fb3-4698-a8f6-684d7786b067&sktid=a48cca56-e6da-484e-a814-9c849652bcb3&skt=2023-04-04T08%3A35%3A10Z&ske=2023-04-05T08%3A35%3A10Z&sks=b&skv=2021-08-06&sig=qH5M9JKZhHSr4mGafIaT/p29MX9OP2aHaicAuWCO5JA%3D"
 *  )
 * )
 * Class PromptGenerateResultResources
 *
 * @package App\Resources\Prompt
 */
class PromptGenerateResultResources extends BaseResources
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
        ];
    }

}
