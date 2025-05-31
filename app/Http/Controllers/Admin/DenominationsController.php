<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Denomination;

class DenominationsController extends Controller
{
    private $denomination;

    public function __construct(Denomination $denomination)
    {
        $this->denomination = $denomination;
    }

    public function index()
    {
        $all_denominations = $this->denomination->all();

        return view('admin.denominations.index')->with('all_denominations', $all_denominations);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $this->denomination->name = $request->name;
        $this->denomination->save();

        return back();
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'new_name' => 'required'
        ]);

        $deno = $this->denomination->findOrFail($id);
        $deno->name = $request->new_name;
        $deno->save();

        return back();
    }

    public function destroy($id)
    {
        $this->denomination->destroy($id);
        
        return back();
    }
}
