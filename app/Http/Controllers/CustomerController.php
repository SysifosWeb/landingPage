<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Mail\NewCustomer;
use App\Mail\SendCustomer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('/contacto');
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
    public function store(StoreCustomerRequest $request)
    {
        try {
            $customer = Customer::create($request->validate([
                'name' => ['required', 'max:50'],
                'email' => ['required', 'max:50', 'email'],
                'message' => ['required', 'max:255'],
            ]));

            Mail::to('contacto@sysifosweb.cl')->send(new NewCustomer($customer));
            Mail::to($customer->email)->send(new SendCustomer());

            return back()->with('success', 'Tu mensaje ha sido enviado exitosamente.');
        } catch (\Throwable $_) {
            return back()->with('error', 'No hemos logrado enviar tu mensaje, intenta nuevamente.');
        }
        // catch(Exception $ex){
        //     return back()->with('error', "error: $ex->getMessage()");
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
