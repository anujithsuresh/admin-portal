<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class EntityApiController extends Controller
{

    public function handleEntity(Request $request)
    {
        if ($request->isMethod('get')) {
            $customerId = $request->query('id');

            if ($customerId) {
                $customer = Customer::with('invoices')->find($customerId);
                if (!$customer) {
                    return response()->json(['error' => 'Customer not found'], 404);
                }

                return response()->json([
                    'customer' => $customer,
                    'invoices' => $customer->invoices,
                ]);
            }

            // Return all if no customer_id is passed
            // return response()->json([
            //     'customers' => Customer::all(),
            //     'invoices' => Invoice::all(),
            // ]);
        }

        $type = $request->input('type');

        switch ($type) {
            case 'customer':
                $validated = $request->validate([
                    'name' => 'required',
                    'email' => 'nullable|email',
                    'phone' => 'nullable|string',
                    'address' => 'nullable|string',
                ]);
                $customer = Customer::create($validated);
                return response()->json(['message' => 'Customer created', 'data' => $customer]);

            case 'invoice':
                $validated = $request->validate([
                    'customer_id' => 'required|exists:customers,id',
                    'amount' => 'required|numeric',
                    'date' => 'required|date',
                    'status' => 'required|in:Unpaid,Paid,Cancelled',
                ]);
                $invoice = Invoice::create($validated);
                return response()->json(['message' => 'Invoice created', 'data' => $invoice]);

            default:
                return response()->json(['error' => 'Invalid type'], 400);
        }
    }

    public function index()
    {
    
        return view('api.index');
    }
}
