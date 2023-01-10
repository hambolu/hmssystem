<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phamarcy;

class PhamarcyController extends Controller
{
    //

    public function index()
    {
        return view('phamarcy.index');
    }

    public function create(Request $request)
    {
        Phamarcy::create($request->all());
        return back();
    }

    public function edit(Request $request, $id)
    {
        $phamarcy = Phamarcy::find($id);
        return view('phamarcy.edit',compact('phamarcy'));
    }

    public function updated(Request $request)
    {
        $phamarcy = Phamarcy::find($id);
        $phamarcy->update($request->all());

    //     $speakUpdate  = Speaker::findOrFail($id);

    // $input = $request->all();

    // $speakUpdate->fill($input)->save();
        return back();
    }
}
