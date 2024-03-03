<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = [
            [
                "id" => 1,
                "name" => "edward"
            ],
            [
                "id" => 2,
                "name" => "briiian"
            ],
            [
                "id" => 3,
                "name" => "laravel"
            ]
        ];

        return view(
            'admin.index',
            [
                'users' => $users
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stripe = new \Stripe\StripeClient("sk_test_51GzWBTJXQpzchPKbrTpU5yI9B3BOvrJfgAPoNNt5OStBaZjoxJiUdaOSAKBfBeEh5KeKMmlVWWrP22WnDVtEt6KI00jzYWQlUc");

        $product = $stripe->products->create([
            'name' => 'pagos de municios',
            'description' => 'pagos de servicios de agua',
        ]);

        $price = $stripe->prices->create([
            'unit_amount' => 300,
            'currency' => 'usd',
            'recurring' => ['interval' => 'month'],
            'product' => $product['id'],
        ]);


        $intents = $stripe->paymentIntents->create([
            'amount' => 2000,
            'currency' => 'usd',
            'automatic_payment_methods' => ['enabled' => true],
        ]);

        return  $intents;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input("name");
        $email = $request->input("email");

        $stripe = new \Stripe\StripeClient('sk_test_51GzWBTJXQpzchPKbrTpU5yI9B3BOvrJfgAPoNNt5OStBaZjoxJiUdaOSAKBfBeEh5KeKMmlVWWrP22WnDVtEt6KI00jzYWQlUc');

        $response = $stripe->customers->create([
            'name' => $name,
            'email' => $email
        ]);

        return $response;
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
