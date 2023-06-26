<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;

class LessonController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $inscricoes = Lesson::paginate(5);
        return view('lessons.index',compact('inscricoes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     */
    public function approve($id)
    {
        
        $inscricao  = Lesson::findOrFail($id);
        $inscricao->aceita = true;
        $inscricao->save();

        return redirect(route('lessons-index'));

    }
}
