<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Demande;
 
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Demande::orderBy('created_at', 'DESC')->get();
 
        return view('products.index', compact('product'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Demande::create($request->all());
 
        return redirect()->route('admin/products')->with('success', 'Product added successfully');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Demande::findOrFail($id);
 
        return view('products.show', compact('product'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Demande::findOrFail($id);
 
        return view('products.edit', compact('product'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Demande::findOrFail($id);
 
        $product->update($request->all());
 
        return redirect()->route('admin/products')->with('success', 'product updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Demande::findOrFail($id);
 
        $product->delete();
 
        return redirect()->route('admin/products')->with('success', 'product deleted successfully');
    }
}