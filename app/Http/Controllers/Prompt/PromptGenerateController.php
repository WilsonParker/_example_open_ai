<?php

namespace App\Http\Controllers\Prompt;

use App\Http\Controllers\BaseController;
use App\Http\Requests\StorePromptGenerateRequest;
use App\Http\Requests\UpdatePromptGenerateRequest;
use App\Models\Prompt;
use App\Models\PromptGenerate;
use App\Resources\Prompt\PromptGenerateResources;
use App\Services\OpenAI\Images\ImageSize;
use App\Services\Prompt\PromptGenerateServiceContract;
use OpenApi\Annotations as OA;

class PromptGenerateController extends BaseController
{
    public function __construct(protected PromptGenerateServiceContract $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @OA\Post(
     *     path="/api/prompt/{prompt}/generate",
     *     summary="Adds a new prompt generate",
     *     tags={"prompt generate"},
     *     @OA\Parameter(
     *         description="prompt id example",
     *         in="path",
     *         name="prompt",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="1", value="1", summary="1"),
     *     ),
     *     @OA\Parameter(
     *         description="weather value example",
     *         in="query",
     *         name="p1",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="sunny", value="sunny", summary="sunny"),
     *         @OA\Examples(example="wendy", value="wendy", summary="wendy"),
     *     ),
     *     @OA\Parameter(
     *         description="prompt value example",
     *         in="query",
     *         name="p2",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="banging clams", value="banging clams", summary="banging clams"),
     *         @OA\Examples(example="catching fish", value="catching fish", summary="catching fish"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             oneOf={
     *                 @OA\Schema(ref="#/components/schemas/Result"),
     *             },
     *             @OA\Property(property="data", type="object", ref="#/components/schemas/PromptGenerateResources"),
     *         ),
     *      ),
     * )
     */
    public function store(Prompt $prompt, StorePromptGenerateRequest $request)
    {
        $validated = $request->validated();
        $callback = function () use ($validated, $prompt) {
            $promptGenerate = $this->service->store($prompt, auth()->user(), $validated);
            $this->service->callApi($promptGenerate, 1, ImageSize::s256);
            return $this->response(new PromptGenerateResources($promptGenerate), 'prompt generate store success');
        };
        return $this->transaction($callback, function (\Throwable $throwable) {
            dd($throwable);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(PromptGenerate $promptGenerate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PromptGenerate $promptGenerate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromptGenerateRequest $request, PromptGenerate $promptGenerate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PromptGenerate $promptGenerate)
    {
        //
    }
}
