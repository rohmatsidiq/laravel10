<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataTableController extends Controller
{
    public function clientSide(Request $request)
    {
        $data = new User();

        if ($request->get('search')) {
            $data = $data->where('name', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('email', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $data->get();

        return view('datatable.clientside', compact('data', 'request'));
    }

    public function serverSide(Request $request)
    {

        if ($request->ajax()) {
            // $data = new User();
            // $data = $data->latest();

            $data = User::latest()->get();
            return DataTables::of($data)
                ->addColumn('no', function ($data) {
                    return 'ini nomer';
                })
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('email', function ($data) {
                    return $data->email;
                })
                ->addColumn('action', function ($data) {
                    return ' <a href=' . 'edit/' . $data->id . ' class="btn btn-warning">Edit</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus' . $data->id . '">
                                                Hapus
                                            </button>';
                })
                ->make(true);
        }

        // $data = $data->get(); 

        return view('datatable.serverside');
    }
}
