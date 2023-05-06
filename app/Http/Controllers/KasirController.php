<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasir;

class KasirController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Aplikasi Kasir';
        $data['q'] = $request->get('q');
        $data['kasirs'] = Kasir::where('code', 'like', '%' . $data['q'] . '%')->get();
        return view('kasirs.index', $data);
    }

    public function create()
    {
        $data['title'] = '';
        return view('kasirs.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $kasir = new Kasir($request->all());
        $kasir->save();
        return redirect('kasirs')->with('success', 'Data Berhasil ditambah');
    }

    public function edit(Kasir $kasir)
    {
        $data['title'] = '';
        $data['kasirs'] = $kasir;
        return view('kasirs.edit', $data);
    }

    public function update(Request $request, Kasir $kasir)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $kasir->code = $request->code;
        $kasir->name = $request->name;
        $kasir->price = $request->price;
        $kasir->stock = $request->stock;
        $kasir->save();
        return redirect('kasirs')->with('success', 'Data Berhasil di ubah');
    }

    public function destroy(Kasir $kasir)
    {
        $kasir->delete();
        return redirect('kasirs')->with('success', 'Brthasil di hapus');
    }
}
