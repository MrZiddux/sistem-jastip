<?php

namespace App\Http\Controllers;

use App\Models\Recipient;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JastipController extends Controller
{
    private $recipient;

    public function __construct(Recipient $recipient)
    {
      $this->recipient = $recipient;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.jastip.index');
    }

    public function getJastip()
    {
      $data = $this->recipient->with('packages');
      return response()->json($data);
      // return DataTables::of($data)
      //   ->addIndexColumn()
      //   ->editColumn('price_per_kg', function($data) {
      //     return "Rp. " . number_format($data->price_per_kg, 0, ',', '.');
      //   })
      //   ->addColumn('action', function($data) {
      //     $buttons = '<button class="btn icon btn-info btn-edit me-1" data-uri="' . route("jenis-harga.update", $data->id) . '" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil-square"></i></button>';
      //     $buttons .= '<button class="btn icon btn-danger btn-delete" data-uri="' . route('jenis-harga.destroy', $data->id) . '" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button>';
      //     return $buttons;
      //   })
      //   ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
        return view('pages.jastip.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.jastip.edit');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
