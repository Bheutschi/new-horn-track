<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoanResource;
use App\Models\Computer;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Throwable;

class LoanController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return LoanResource::collection(Loan::paginate());
    }

    /**
     * @throws Throwable
     */
    public function show(string $id): JsonResource
    {
        return Loan::findOrFail($id)->toResource();
    }

    public function store(Request $request): JsonResponse
    {
        $user = User::where('email', '=', $request->email)->firstOrFail();
        if ($request->computer_uuid) {
            $computerId = Computer::where('id', '=', $request->computer_uuid)->firstOrFail()->id;
        } else {
            $computerName = Computer::where('name', '=', $request->computer_name)->firstOrFail();
            $computerId = $computerName->id;
        }

        $loan = Loan::create([
            'start_at' => now(),
            'end_at' => null,
        ]);

        $loan->user()->associate($user);
        $loan->computer()->associate($computerId);
        $loan->loaner()->associate($user);
        $loan->save();

        return (new LoanResource($loan))
            ->response()
            ->setStatusCode(201);
    }
}
