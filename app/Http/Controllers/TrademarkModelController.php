<?php

namespace App\Http\Controllers;

use App\Models\TrademarkModel;
use App\Http\Requests\StoreTrademarkModelRequest;
use App\Http\Requests\UpdateTrademarkModelRequest;

class TrademarkModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = TrademarkModel::paginate(5);
        return view('models.index',compact('models'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('models.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrademarkModelRequest $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
        ]);

        $model                  = new TrademarkModel;
        $model->trademark_id    = request('trademark_id');
        $model->name            = request('name');
        $model->save();

        return redirect(route('trademarkmodels-index'));

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $model = TrademarkModel::findOrFail($id);
        return view('models.show', ['model' => $model]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrademarkModel $trademarkModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrademarkModelRequest $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
        ]);
        $model                  = TrademarkModel::findOrFail($id);
        $model->trademark_id    = request('trademark_id');
        $model->name            = request('name');
        $model->save();
        
        return redirect(route('trademarkmodels-index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $model  = TrademarkModel::findOrFail($id)->delete();
        return redirect(route('trademarkmodels-index'));
    }
}
