<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Bansos;
use App\Models\User;

class HistoryAssistanceController extends Controller
{
    public function index (){
        $breadcrumb = (object) [
            'title' => 'Welcome Back at SIMPEL',
            'list' => ['Home','Dashboard']
        ];

        // $dataAssitance = Bansos::all();

        return view('admin.HistoryAssistance.index', ['breadcrumb' => $breadcrumb]);
    }

    public function list(Request $request)
    {
        $dataAssitance = Bansos::with('penduduk')
        ->whereNotNull('updated_at')
        ->select(
            'id_alternatif',
            'id_penduduk',
            'updated_at'
        );

        return DataTables::of($dataAssitance)
            ->addIndexColumn()
            ->addColumn('NoKK', function ($data) {
                return $data->penduduk->NoKK;
            })
            ->editColumn('updated_at', function ($data) {
                return date('d/m/Y', strtotime($data->created_at));
            })
            ->make(true);
    }

}
