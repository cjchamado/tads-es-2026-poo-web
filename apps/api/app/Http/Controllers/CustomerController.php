<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::paginate();
    }

    public function store(CustomerStoreRequest $request)
    {
        return Customer::create(
            $request->validated()
        );
    }

    public function show(Customer $customer)
    {
        return $customer;
    }

    public function update(
        CustomerUpdateRequest $request,
        Customer $customer
    ) {
        $customer->update(
            $request->validated(),
        );

        return $customer;
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json([], 204);
    }
}
