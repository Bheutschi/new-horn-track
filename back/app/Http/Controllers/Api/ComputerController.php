<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComputerResource;
use App\Models\Computer;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Throwable;

class ComputerController extends Controller
{
    /**
     * @throws Throwable
     */
    public function index(): ResourceCollection
    {
        return ComputerResource::collection(Computer::paginate());
    }

    /**
     * @throws Throwable
     */
    public function show(string $id): JsonResource
    {
        return Computer::findOrFail($id)->toResource();
    }
}
