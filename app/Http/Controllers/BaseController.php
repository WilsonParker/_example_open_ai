<?php

namespace App\Http\Controllers;

use App\Services\ServiceContract;
use Illuminate\Support\Facades\DB;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 * @OA\Info(
 *     version="1.0",
 *     title="Example for response examples value"
 * )
 * @OA\PathItem(path="/api")
 * @OA\Schema(
 *  schema="Result",
 *  title="Sample schema for using references",
 * 	@OA\Property(
 *      property="message",
 *      type="string",
 *      example="A simple of response message"
 *    ),
 * 	@OA\Property(
 *     property="data",
 *     type="Object",
 *    )
 * )
 */
class BaseController extends Controller
{
    public function __construct(protected ServiceContract $service) {}

    protected function transaction(callable $callback, callable $errorCallback = null)
    {
        $result = null;
        try {
            DB::beginTransaction();
            $result = $callback();
            DB::commit();
        } catch (\Throwable $throwable) {
            if (is_callable($errorCallback)) {
                $result = $errorCallback($throwable);
            }
            DB::rollBack();
            // Todo : Log
        }
        return $result;
    }

    protected function run(callable $callback, callable $errorCallback = null)
    {
        $result = null;
        try {
            $result = $callback();
        } catch (\Throwable $throwable) {
            if (is_callable($errorCallback)) {
                $result = $errorCallback($throwable);
            }
        }
        return $result;
    }

    protected function response($data, string $message, int $code = ResponseAlias::HTTP_OK)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}
