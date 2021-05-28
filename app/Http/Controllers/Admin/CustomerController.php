<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view('admin.customers.index',['customers' => Customer::paginate(10)]);
        dd('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('admin.addform');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate($this->validationRules());
        // 1st method
        // $customer = new Customer;
        // $customer->firstname = $request->firstname;
        // $customer->lastname = $request->lastname;
        // $customer->phone = $request->phone;
        // $customer->email = $request->email;
        // $customer->address = $request->address;
        // $customer->save();

        // 2nd method : mass assignment
        $customer = Customer::create($validatedData);

        return redirect()->route('customers.show', $customer)->with('storeCustomer', "Customer has been added successfuly");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {

        return view('admin.customers.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', ['customer' => $customer]);


    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate($this->validationRules());
        // 1st method
        // $customer = new Customer;
        // $customer->firstname = $request->firstname;
        // $customer->lastname = $request->lastname;
        // $customer->phone = $request->phone;
        // $customer->email = $request->email;
        // $customer->address = $request->address;
        // $customer->save();

        // 2nd method : mass assignment
        $customer ->update($validatedData);

        return redirect()->route('customers.show', $customer)->with('storeCustomer', "Customer has been updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {   $customer ->delete();
        return redirect()->route('customers.index', $customer)->with('deleteCustomer', "Customer has been deleted successfuly");
    }

    private function validationRules()
    {
        return [
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ];
    }
}

