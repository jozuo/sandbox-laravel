<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChirpStoreRequest;
use App\Http\Requests\ChirpUpdateRequest;
use App\Models\Chirp;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ChirpController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Chirps/Index', [
            'chirps' => Chirp::with('user:id,name')->latest()->get(),
        ]);
    }

    public function store(ChirpStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $request->user()->chirps()->create($validated);

        return redirect(route('chirps.index'));
    }

    public function update(ChirpUpdateRequest $request, Chirp $chirp): RedirectResponse
    {
        $validated = $request->validated();
        $chirp->update($validated);

        return redirect(route('chirps.index'));
    }

    public function destroy(Chirp $chirp): RedirectResponse
    {
        $this->authorize('delete', $chirp);
        $chirp->delete();
        return redirect(route('chirps.index'));
    }
}
