<?php

namespace App\Http\Controllers;
use App\Models\Billing;


use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billing = Billing::where('user_id',auth()->user()->id)->first();
        return view('profile.billing',compact('billing'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $billing = Billing::where('user_id',auth()->user()->id)->first();
        if($billing)
        {
        $billing->name = $request->name ?? $billing->name;
        $billing->credit_card_number = $request->credit_card_number ?? $billing->credit_card_number;
        $billing->cvc_number = $request->cvc_number ?? $billing->cvc_number;
        $billing->expire_date = $request->expire_date ?? $billing->expire_date;
        $billing->country = $request->country ?? $billing->country;
        $billing->city = $request->city ?? $billing->city;
        $billing->state = $request->state ?? $billing->state;
        $billing->zip_code = $request->zip_code ?? $billing->zip_code;
        $billing->user_id = auth()->user()->id;
        $billing->save();
        return back()->with('success','billing updated successfully');

        }
        else
        {
        $billingAddress =new Billing();
        $billingAddress->name = $request->name ?? '';
        $billingAddress->credit_card_number = $request->credit_card_number ?? '';
        $billingAddress->cvc_number = $request->cvc_number ?? '';
        $billingAddress->expire_date = $request->expire_date ?? '';
        $billingAddress->country = $request->country ?? '';
        $billingAddress->city = $request->city ?? '';
        $billingAddress->state = $request->state ?? '';
        $billingAddress->zip_code = $request->zip_code ?? '';
        $billingAddress->user_id = auth()->user()->id;
        $billingAddress->save();
        return back()->with('success','billing create successfully');
        }
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
