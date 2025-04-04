<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessCreateRequest;
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
        $isApi = $request->header("accept") == "application/json";

        $businessBuilder = Business::with("salesContact")
        ->with("logisticsContact")
        ->orderBy("name", "ASC");

        if ($request->filled("type")) {
            $businessBuilder->where("type", $request["type"]);
        }

        if ($request->filled("per_page")) {
            $businesses = $businessBuilder->paginate($request["per_page"])->withQueryString();
        } else {
            $businesses = $businessBuilder->get();
        }

        $data = [
            "businesses" => $businesses,
            "filters"    => $request->only('type', 'per_page', 'page'),
        ];

        if ($isApi) {
            return response()->json($data);
        }

        return Inertia::render("businesses/Index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("businesses/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessCreateRequest $request)
    {
        Business::create($request->all());
        return redirect()->route('businesses')->with('success', 'Business created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Business $business)
    {
        if ( ! auth()->user()->can("view", $business)) {
            abort(403, "Not authorized");
        }

        //return Inertia::render("businesses/Business", $business);
        return $business;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business)
    {
        if ( ! auth()->user()->can("view", $business)) {
            abort(403, "Not authorized");
        } 
        
        return "show update form";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Business $business)
    {
        if ( ! auth()->user()->can("update", $business)) {
            abort(403, "Not authorized");
        }  

        $return = [
            "validate data",
            "set the new values",
            "save (\$business->save();",
            "redirect to /business with flash message",
        ];
        
        return $return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business)
    {
        if ( ! auth()->user()->can("delete", $business)) {
            abort(403, "Not authorized");
        }  
    }
}
