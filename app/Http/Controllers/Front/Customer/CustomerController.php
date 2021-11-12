<?php

namespace App\Http\Controllers\Front\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
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
        $customers = Customer::orderBy('id', 'desc')->get();
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'fathername' => 'required',
            'address' => 'required',
            'mobile' => 'required',
        ]);
        $create = Customer::create($request->all());
        if ($create) {
            return redirect()->back()->with('success', 'Müştəri əlavə edildi');
        } else {
            return redirect()->back()->with('error', 'Xəta baş verdi! Müştəri əlavə edilmədi');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Customer::find($id)->update($request->all());
        if ($update) {
            return redirect()->back()->with('success', 'Müştəri redaktə edildi');
        } else {
            return redirect()->back()->with('error', 'Xəta baş verdi! Müştəri redaktə edilmədi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect()->back()->with('success', 'Müştəri silindi');
    }
}
