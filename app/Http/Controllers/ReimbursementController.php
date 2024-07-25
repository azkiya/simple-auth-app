<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reimbursement;

class ReimbursementController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:reimbursement-approval'], ['only' => ['index', 'approval']]);
        $this->middleware(['permission:payment-list'], ['only' => ['payment']]);
    }
    public function index()
    {
        $data = Reimbursement::latest()->paginate(10);

        return view('reimbursement.index', compact('data'));
    }

    public function approval(Request $request, string $id)
    {
        $data = Reimbursement::findOrFail($id);
        $request->validate([
            'status' => 'required',
        ]);
        $data->status = (int) $request['status'];
        $data->save();

        $data = Reimbursement::latest()->paginate(10);
        return view('reimbursement.index', compact('data'));
    }

    public function payment()
    {
        $data = Reimbursement::where('status',1)->get();
        return view('reimbursement.payment', compact('data'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
