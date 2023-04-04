<?php

namespace App\Http\Controllers\Prompt;

use App\Http\Controllers\BaseController;
use App\Http\Requests\StorePromptGenerateRequest;
use App\Http\Requests\UpdatePromptGenerateRequest;
use App\Models\PromptGenerate;
use OpenApi\Annotations as OA;

class PromptGenerateController extends BaseController
{
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
     *     path="/api/prompt/generate",
     *     summary="Adds a new prompt generate",
     *     tags={"prompt generate"},
     *     @OA\Parameter(
     *         description="weather example",
     *         in="query",
     *         name="weather",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="sunny", value="sunny", summary="weather"),
     *         @OA\Examples(example="wendy", value="wendy", summary="weather"),
     *     ),
     *     @OA\Parameter(
     *         description="prompt example",
     *         in="query",
     *         name="prompt",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="banging clams", value="banging clams", summary="prompt"),
     *         @OA\Examples(example="catching fish", value="catching fish", summary="prompt"),
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
    public function store(StorePromptGenerateRequest $request)
    {
        $validated = $request;
        $callback = function () use ($validated) {
            dd($validated);
        };
        $errorCallback = function (\Throwable $throwable) {};
        return $this->transaction($callback, $errorCallback);
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
