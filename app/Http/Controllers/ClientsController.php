<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreclientsRequest;
use App\Http\Requests\UpdateclientsRequest;
use App\Http\Resources\ClientResourceCollection;
use App\Models\clients;
use Exception;
use Illuminate\Support\Facades\Log;

class ClientsController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients  = clients::all();
        // $client = new ClientResourceCollection($client);
        return  view("admin.index", compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreclientsRequest $request)
    {

        try {
            $name = $request->name;
            $lastname = $request->lastname;
            clients::create([
                'name' => $name,
                'lastname' => $lastname,
                'address' => "",
                'phone' => "",
                'city' => "",
                'email' => ""

            ]);
        } catch (\Throwable $th) {
            throw new Exception($th);
        }

        return redirect()->route("client.index");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = clients::findOrFail($id);
        return $client;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(clients $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateclientsRequest $request, clients $clients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(clients $clients)
    {
        //
    }
}
