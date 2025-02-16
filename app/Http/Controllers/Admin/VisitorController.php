<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VisitorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('visitor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.visitor.index');
    }

    public function create()
    {
        abort_if(Gate::denies('visitor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.visitor.create');
    }

    public function edit(Visitor $visitor)
    {
        abort_if(Gate::denies('visitor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.visitor.edit', compact('visitor'));
    }

    public function show(Visitor $visitor)
    {
        abort_if(Gate::denies('visitor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visitor->load('country', 'exhibition');

        return view('admin.visitor.show', compact('visitor'));
    }
}
