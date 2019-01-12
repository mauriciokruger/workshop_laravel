<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Quote;
use Auth;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::get();
        foreach ($quotes as $quote) {
            $quote->user;
            $quote->total_likes = $quote->likes()->count();
        }

        return view('home', compact('quotes'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $validation = $this->validation($data);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        Quote::create($data);

        return redirect()->back()->with('message', 'Registro cadastrado com sucesso!');
    }

    public function edit(Quote $quote)
    {
        return view('edit', compact('quote'));
    }

    public function update(Request $request, Quote $quote)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $validation = $this->validation($data);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $quote->update($data);

        return redirect()->route('quotes.index')->with('message', 'Registro atualizado com sucesso!');
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();

        return redirect()->route('quotes.index')->with('message', 'Registro atualizado com sucesso!');
    }

    private function validation(array $data)
    {
        $validation = [
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
            'author' => 'required|string|max:250'
        ];
        return Validator::make($data, $validation);
    }
}