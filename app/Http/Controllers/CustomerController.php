<?php

namespace App\Http\Controllers;

use App\Events\WelcomeCustomerEvent;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->paginate();
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(CustomerRequest $request)
    {
       $customer = Customer::create($request->validated());
       event(new WelcomeCustomerEvent($customer));

       return redirect(route('customers.index'));
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(Customer $customer, CustomerRequest $request)
    {
        $customer->update($request->validated());
        event(new WelcomeCustomerEvent($customer->fresh()));

        return redirect(route('customers.index'));
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect(route('customers.index'));
    }
}
