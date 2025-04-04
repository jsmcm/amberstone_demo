<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $entity)
    {

        $checks = [
            "check user auth",
            "check for filters and pagination etc",
        ];
        $action = [];

        if ($entity === 'distributor') {
            $action = [
                "return DISTRIBUTORS purchase orders"
            ];
        } elseif ($entity === 'supplier') {
            $action = [
                "return SUPPLIERS purchase orders"
            ];        
        }

        return array_merge($checks, $action);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $entity)
    {       
        $checks = [
            "check user auth",
        ];

        $action = [];

        if ($entity === 'distributor') {
            $action = [
                "return DISTRIBUTORS purchase order form"
            ];
        } elseif ($entity === 'supplier') {
            $action = [
                "return SUPPLIERS purchase order form"
            ];        
        }

        return array_merge($checks, $action);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $checks = [
            "check user auth",
            "create new purchase order model with status = pending",
            "dispatch CreatePODJob, passing in the new POD, or have an event listener for newly created PO models",
            "wait for PM to confirm that suppliers can supply, ie, do nothing more here",
            "If PM confirms supply then set status to 'accepted'. In a job like CreatePOSFromPOD create the POS => create new delivery (models not created here) => Notify logistics primary contact.",
            "If PM cannot confirm supply then PO needs to be rejected by FSA. Send notification to logistics primary contact"
        ];

    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        $checks = [
            "check user auth",
            "Get the PO model instance. If its a POD then redirect the the POD specific view. If its a POS then redirect to the POS specific view",
        ];

        return $checks;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        $checks = [
            "check user auth",
            "Show the supplier/distributor view",
        ];

        return $checks;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        $checks = [
            "check user auth",
            "validate input",
            "Update the purchase order",
        ];

        return $checks;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        $checks = [
            "check user auth",
            "Nuke it",
        ];

        return $checks;
    }
}
