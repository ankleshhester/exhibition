<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LinkStatistic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class LinkStatisticController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('link_statistic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.link-statistic.index');
    }

    public function create()
    {
        abort_if(Gate::denies('link_statistic_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.link-statistic.create');
    }

    public function edit(LinkStatistic $linkStatistic)
    {
        abort_if(Gate::denies('link_statistic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.link-statistic.edit', compact('linkStatistic'));
    }

    public function show(LinkStatistic $linkStatistic)
    {
        abort_if(Gate::denies('link_statistic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $linkStatistic->load('link', 'visitor');

        return view('admin.link-statistic.show', compact('linkStatistic'));
    }
}
