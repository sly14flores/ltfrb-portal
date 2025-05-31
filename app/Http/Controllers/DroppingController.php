<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dropping;
use Illuminate\Support\Facades\Auth;

class DroppingController extends Controller
{
    private $dropping;
    
    public function __construct(Dropping $dropping)
    {
        $this->dropping = $dropping;
    }

    public function store(Request $request)
    {
        $request->validate([
            'vap' => 'required|mimes:jpg,jpeg,png',
            'gov_id' => 'required|mimes:jpg,jpeg,png',
            'orcr' => 'required|mimes:jpg,jpeg,png',
            'surrender' => 'required|mimes:jpg,jpeg,png',
            'cert_non_apprehension' => 'required|mimes:jpg,jpeg,png',
            'lto_cert' => 'required|mimes:jpg,jpeg,png',
            'lto_auth' => 'required|mimes:jpg,jpeg,png',
        ]);

        $this->dropping->application_id = $request->app_id;
         
        $this->dropping->gov_id = 'data:image/' . $request->gov_id->extension() . ';base64,' . base64_encode(file_get_contents($request->gov_id));

        $this->dropping->or_cr = 'data:image/' . $request->orcr->extension() . ';base64,' . base64_encode(file_get_contents($request->orcr));

        $this->dropping->surrender_of_plates = 'data:image/' . $request->surrender->extension() . ';base64,' . base64_encode(file_get_contents($request->surrender));

        $this->dropping->non_apprehension = 'data:image/' . $request->cert_non_apprehension->extension() . ';base64,' . base64_encode(file_get_contents($request->cert_non_apprehension));

        $this->dropping->lto_cert = 'data:image/' . $request->lto_cert->extension() . ';base64,' . base64_encode(file_get_contents($request->lto_cert));

        $this->dropping->lto_auth = 'data:image/' . $request->lto_auth->extension() . ';base64,' . base64_encode(file_get_contents($request->lto_auth));

        $this->dropping->save();

        return back();
    }
}
