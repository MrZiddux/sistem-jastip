<?php

namespace App\Http\Controllers;

use App\Http\Requests\PricingOptionRequest;
use App\Models\PricingOption;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PricingOptionController extends Controller
{
    private $pricingOption;

    public function __construct(PricingOption $pricingOption)
    {
      $this->pricingOption = $pricingOption;
    }

    public function index()
    {
      return view('pages.pricing-options.index');
    }

    public function getPricingOptions()
    {
      $data = $this->pricingOption->all();
      return DataTables::of($data)
        ->addIndexColumn()
        ->editColumn('price_per_kg', function($data) {
          return "Rp. " . number_format($data->price_per_kg, 0, ',', '.');
        })
        ->addColumn('action', function($data) {
          $buttons = '<button class="btn icon btn-info btn-edit me-1" data-uri="' . route("jenis-harga.update", $data->id) . '" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil-square"></i></button>';
          $buttons .= '<button class="btn icon btn-danger btn-delete" data-uri="' . route('jenis-harga.destroy', $data->id) . '" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button>';
          return $buttons;
        })
        ->toJson();
    }

    public function store(PricingOptionRequest $request)
    {
      $this->pricingOption->create(['name' => $request->name, 'price_per_kg' => $request->price_per_kg]);
      return response()->json(['messages' => 'Jenis Harga Berhasil Ditambahkan'], 200);
    }

    public function update(PricingOptionRequest $request, PricingOption $pricingOption)
    {
      $pricingOption->update(['name' => $request->name, 'price_per_kg' => $request->price_per_kg]);
      return response()->json(['messages' => 'Jenis Harga Berhasil Diedit'], 200);
    }

    public function destroy(PricingOption $pricingOption)
    {
      $pricingOption->delete();
      return response()->json(['messages' => 'Jenis Harga Berhasil Dihapus'], 200);
    }
}
