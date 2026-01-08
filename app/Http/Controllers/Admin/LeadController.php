<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $query = auth()->user()->leads()->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(fn($q) => $q->where('full_name', 'like', '%' . $search . '%')->orWhere('phone', 'like', '%' . $search . '%'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        $leads = $query->paginate(10);
        return view('admin.leads.index', compact('leads'));
    }

    public function create() {
        return view('admin.leads.create');
    }


    public function store(StoreLeadRequest $request) {
        auth()->user()->leads()->create($request->validated());
        return redirect()->route('leads.index')->with('success', 'Лид создан');
    }

    public function show(Lead $lead) {
        Gate::authorize('view', $lead);
        $lead->load('tasks');
        return view('admin.leads.show', compact('lead'));
    }

    public function edit(Lead $lead)
    {
        Gate::authorize('update', $lead);
        return view('admin.leads.edit', compact('lead'));
    }

    public function update(StoreLeadRequest $request, Lead $lead) {
        Gate::authorize('update', $lead);
        $lead->update($request->validated());
        return redirect()->route('leads.index')->with('success', 'Lead updated.');
    }

    public function destroy(Lead $lead) {
        Gate::authorize('delete', $lead);
        $lead->delete();
        return redirect()->route('leads.index');
    }
}
