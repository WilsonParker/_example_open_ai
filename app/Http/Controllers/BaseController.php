<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use OpenApi\Annotations as OA;

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

    /**
     * @throws \Throwable
     */
    protected function transaction(callable $callback, callable $errorCallback = null)
    {
        $result = null;
        try {
            DB::beginTransaction();
            $result = $callback();
            DB::commit();
        } catch (\Throwable $throwable) {
            DB::rollBack();
            if (is_callable($errorCallback)) {
                $result = $errorCallback($throwable);
            } else {
                throw $throwable;
            }
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

}
