<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreclientsRequest;
use App\Http\Requests\UpdateclientsRequest;
use App\Models\Customer;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class CustomerController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $clients  = Customer::all();
        return  view("client.index", compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("client.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreclientsRequest $request): RedirectResponse
    {

        try {
            $name = $request->name;
            $email = $request->email;
            Customer::create([
                'name' => $name,
                'address' => "",
                'phone' => "",
                'email' => $email

            ]);
        } catch (\Throwable $th) {
            Log::info($th);
            throw new Exception($th);
        }

        return redirect()->route("client.index")->with('success', 'client created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $clients): View
    {
        // $client = clients::findOrFail($clients);
        return view("client.show", compact("clients"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($clients): View
    {
        $client = Customer::find($clients);
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateclientsRequest $request, Customer $clients): RedirectResponse
    {
        $clients->update($request->all());
        return redirect()->route("client.index")->with('success', 'client updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $clients): RedirectResponse
    {
        $clients->delete();
        return redirect()->route("client.index")->with('danger', 'client destroyed');
    }
}
