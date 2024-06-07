<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fornecedor = Fornecedor::all();
        return view("fornecedor.index", compact('fornecedor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fornecedor.create'); // nome da pasta . nome do arquivo
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Fornecedor::create([
            'razaoSocial' => $request->input('razaoSocial'),
            'cnpj' => $request->input('cnpj'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email')
        ]);

        return redirect()->route('fornecedor.index')->with('success', 'Registro inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('fornecedor.edit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->update([
            'razaoSocial' => $request->input('razaoSocial'),
            'cnpj' => $request->input('cnpj'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email')
        ]);

        return redirect()->route('fornecedor.index')->with('success', 'Registro alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();
        return redirect()->route('fornecedor.index')->with('success', 'Registro excluído com sucesso!');
    }

    public function delete(string $id) {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('fornecedor.delete', compact('fornecedor'));
    }
}
