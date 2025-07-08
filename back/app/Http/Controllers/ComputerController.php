<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComputerStoreRequest;
use App\Models\Computer;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('computer.index', [
            'computers' => Computer::all()->sortByDesc('available'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('computer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComputerStoreRequest $request)
    {
        Computer::create([
            'id' => Uuid::fromString($request->id),
            'brand' => $request->brand,
            'model' => $request->model,
            'available' => true,
            'name' => $request->name,
        ]);

        return redirect('/computers');
    }

    /**
     * Display the specified resource.
     */
    public function show(Computer $computer)
    {
        $computerHistory = $computer->loans()
            ->with(['user', 'loaner', 'returnLoaner'])
            ->whereNotNull('end_at')
            ->orderBy('end_at', 'desc')
            ->get();

        return view('computer.show', [
            'computerHistory' => $computerHistory,
            'computer' => $computer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Computer $computer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Computer $computer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Computer $computer)
    {
        //
    }
}
