<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'duration' => 'required|integer',
            'price' => 'nullable|numeric',
            'description' => 'nullable|string',
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')
            ->with('success', 'Service créé avec succès!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')
            ->with('success', 'Service supprimé!');
    }
}