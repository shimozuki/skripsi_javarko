<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Transaction;
use App\Project;
use App\ProjectStatus;
use Illuminate\Support\Facades\DB;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $querry = "SELECT projects.*, CASE WHEN ISNULL(a.fee_percent) THEN 0 ELSE a.fee_percent END AS jml_tabung, (projects.budget - a.fee_percent) AS sisa FROM `projects` LEFT JOIN (SELECT transactions.project_id, income_sources.fee_percent FROM transactions LEFT JOIN income_sources ON transactions.income_source_id = income_sources.id WHERE transactions.deleted_at is null) AS a ON projects.id = a.project_id WHERE projects.deleted_at is NULL";
        $projects = DB::select($querry);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = ProjectStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.projects.create', compact('statuses'));
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $statuses = ProjectStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project->load('status');

        return view('admin.projects.edit', compact('statuses', 'project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());

        return redirect()->route('admin.projects.index');
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->load('status');

        return view('admin.projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        Project::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
