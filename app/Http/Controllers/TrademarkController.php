<?php

namespace App\Http\Controllers;

use App\Models\Trademark;
use App\Http\Requests\StoreTrademarkRequest;
use App\Http\Requests\UpdateTrademarkRequest;

class TrademarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trademarks = Trademark::paginate(5);
        return view('trademarks.index',compact('trademarks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trademarks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrademarkRequest $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
        ]);

        $trademark              = new Trademark;
        $trademark->name        = request('name');
        $trademark->contact     = request('contact');
        $trademark->save();
        return redirect(route('trademarks-index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $trademark = Trademark::findOrFail($id);
        return view('trademarks.show', ['trademark' => $trademark]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trademark $trademark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrademarkRequest $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
        ]);
        $trademark              = Trademark::findOrFail($id);
        $trademark->name        = request('name');
        $trademark->contact     = request('contact');
        $trademark->save();
        
        return redirect(route('trademarks-index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $trademark  = Trademark::findOrFail($id)->delete();
        return redirect(route('trademarks-index'));
    }
}
