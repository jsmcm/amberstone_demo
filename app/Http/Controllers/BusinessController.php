<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessIndexRequest;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BusinessIndexRequest $request)
    {
        Log::debug("in businesscontroller index");
        $businessBuilder = Business::with("primaryContact");

        if ($request->filled("type")) {
            $businessBuilder->where("type", $request["type"]);
        }

        if ($request->filled("per_page")) {
            $businesses = $businessBuilder->paginate($request["per_page"])->withQueryString();
        } else {
            $businesses = $businessBuilder->get();
        }

        return Inertia::render("businesses/Index", [
            "businesses" => $businesses,
            "filters"    => $request->only('type', 'per_page', 'page'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
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
    public function show(Business $business)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Business $business)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business)
    {
        //
    }
}
