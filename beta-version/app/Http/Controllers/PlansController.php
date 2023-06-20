<?php

namespace App\Http\Controllers;

use App\Models\Plans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plans::all();
        return view('backend.plans.plans',[
            'plans' => $plans,
        ]);
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
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'type' => 'required|string',
            'duration' => 'required|integer',
        ]);

        $plans = Plans::create($validate);
        $plans->created_at = Carbon::now()->addMonths(3);
        $plans->save();


        Alert::toast('Plan Added Successfully','success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Plans $plans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Plans::find($id);
        return view('backend.plans.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'type' => 'required|string',
            'duration' => 'required|integer',
        ]);

        $find = Plans::find($id);
        $find->update($validate);
        $find->updated_at = Carbon::now();

        Alert::toast('Plan Updated Successfully','success');
        return redirect()->route('plans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Plans::find($id)->delete();
        Alert::toast('Plan Delete Successfully','success');
        return redirect()->route('plans.index');
    }
}
