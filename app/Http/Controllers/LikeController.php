<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Like;
use Auth;

class LikeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $validation = $this->validation($data);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        Like::create($data);

        return redirect()->route('quotes.index')->with('message', 'Registro atualizado com sucesso!');
    }

    private function validation(array $data)
    {
        $validation = [
            'user_id' => 'required|exists:users,id',
            'quote_id' => 'required|exists:quotes,id'
        ];
        return Validator::make($data, $validation);
    }
}