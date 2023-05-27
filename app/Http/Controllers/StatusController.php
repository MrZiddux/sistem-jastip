<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Models\Status;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StatusController extends Controller
{
    private $status;

    public function __construct(Status $status)
    {
      $this->status = $status;
    }

    public function index()
    {
      return view('pages.status.index');
    }

    public function getStatuses()
    {
      $data = $this->status->all();
      return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data) {
          $buttons = '<button class="btn icon btn-info btn-edit me-1" data-uri="' . route("status.update", $data->id) . '" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil-square"></i></button>';
          $buttons .= '<button class="btn icon btn-danger btn-delete" data-uri="' . route('status.destroy', $data->id) . '" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button>';
          return $buttons;
        })
        ->toJson();
    }

    public function store(StatusRequest $request)
    {
      $this->status->create(['name' => $request->name]);
      return response()->json(['messages' => 'Jenis Harga Berhasil Ditambahkan'], 200);
    }

    public function update(StatusRequest $request, Status $status)
    {
      $status->update(['name' => $request->name]);
      return response()->json(['messages' => 'Jenis Harga Berhasil Diedit'], 200);
    }

    public function destroy(Status $status)
    {
      $status->delete();
      return response()->json(['messages' => 'Jenis Harga Berhasil Dihapus'], 200);
    }
}
