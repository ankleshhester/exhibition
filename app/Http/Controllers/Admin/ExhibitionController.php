<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exhibition;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExhibitionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('exhibition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.exhibition.index');
    }

    public function create()
    {
        abort_if(Gate::denies('exhibition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.exhibition.create');
    }

    public function edit(Exhibition $exhibition)
    {
        abort_if(Gate::denies('exhibition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.exhibition.edit', compact('exhibition'));
    }

    public function show(Exhibition $exhibition)
    {
        abort_if(Gate::denies('exhibition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.exhibition.show', compact('exhibition'));
    }
}
