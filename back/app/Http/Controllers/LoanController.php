<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoansCheckRequest;
use App\Models\Computer;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::with(['user', 'computer', 'loaner'])
            ->active()
            ->get();

        $computers = Computer::whereDoesntHave('loans', static function ($query) {
            $query->whereNull('end_at');
        })->available()->get();

        return view('loan.index', [
            'loans' => $loans,
            'computers' => $computers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('loan.create', [
            'computersNames' => Computer::select('name')->get()->pluck('name', 'name'),
            'users' => User::select('name', 'id')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $user = User::where('email', '=', $request->email)->whereDoesntHave('currentLoan')->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()
                ->withErrors(['email' => 'L\'utilisateur a déjà un prêt en cours.']);
        }

        if ($request->computer_uuid) {
            $computerId = Computer::where('id', '=', $request->computer_uuid)->firstOrFail()->id;
        } else {
            $computerName = Computer::where('name', '=', $request->computer_name)->firstOrFail();
            $computerId = $computerName->id;
        }

        $loan = new Loan([
            'start_at' => now(),
            'end_at' => null,
        ]);

        $loan->user()->associate($user);
        $loan->computer()->associate($computerId);
        $loan->loaner()->associate(Auth::user());
        $loan->save();

        return redirect(route('loans.create'));
    }

    public function checkValidateValue(LoansCheckRequest $request)
    {
        $computerUuid = null;

        if (isset($request->validated()['computer_uuid'])) {
            $computerUuid = $request->validated()['computer_uuid'];
            $request->session()->flash('computer_uuid', $computerUuid);
        } else {
            $computerName = $request->validated()['computer_name'];
            $computerUuid = Computer::where('name', '=', $computerName)->first()->id;
            $request->session()->flash('computer_name', $computerName);
        }

        $loan = Loan::where('computer_id', '=', $computerUuid)
            ->orderBy('start_at', 'desc')
            ->first();

        if (isset($loan) && $loan->end_at === null) {
            $request->session()->flash('return_computer', $loan->id);
        }

        return redirect(route('loans.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        return view('loan.edit', [
            'loan' => $loan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        if ($request->defect === 'on') {
            $loan->computer()->update(['available' => false]);
        }
        $loan->end_at = now();
        $loan->return_status = $request->returnStatus;
        $loan->returnLoaner()->associate(Auth::user());
        $loan->save();

        return redirect(route('loans.create'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
