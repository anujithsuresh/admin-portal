<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function customers()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function addCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email'
        ]);

        Customer::create($request->all());
        return redirect()->back()->with('success', 'Customer Added');
    }

    public function invoices()
    {
        $invoices = Invoice::with('customer')->get();
        $customers = Customer::all();
        return view('invoices.index', compact('invoices', 'customers'));
    }

    public function addInvoice(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required',
            'status' => 'required'
        ]);

        Invoice::create($request->all());
        return redirect()->back()->with('success', 'Invoice Added');
    }
}