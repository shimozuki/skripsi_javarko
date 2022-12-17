<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\ClientStatus;
use App\Project;
use App\IncomeSource;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClientRequest;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all();

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        abort_if(Gate::denies('client_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = ClientStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $project = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.clients.create', compact('statuses', 'project'));
    }

    public function store(StoreClientRequest $request)
    {
        $dataclient = [
            'email' => $request->email,
            'phone' => $request->phone,
            'skype' => '-',
            'company' => $request->company,
            'website_id' => $request->website_id,
            'country' => $request->country,
            'last_name' => $request->last_name,
            'status_id' => $request->status_id,
            'first_name' => $request->first_name,
        ];
        $dataincome = [
            'name' => $request->company,
            'fee_percent' => 0,
            'penganteran' => 1,
            'alamt' => $request->country,
        ];
        $datauser = [
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->phone.'@gmail.com',
            'password' => $request->phone,
        ]; 
        $roles = 3;
        DB::beginTransaction();
        try {
            $client = Client::create($request->all());
            $IncomeSource = DB::table('income_sources')->insert($dataincome);
            $user = User::create($datauser);
            $user->roles()->sync($roles);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $errormsg = 'Database error!! ' . $e->getMessage();
        }
        return redirect()->route('admin.clients.index');   
        // echo "<pre>";
        // print_r($IncomeSource);
        // echo "</pre>";
    }

    public function edit(Client $client)
    {
        abort_if(Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = ClientStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $project = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $client->load('status');
        $client->load('project');
        return view('admin.clients.edit', compact('statuses', 'client', 'project'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->all());

        return redirect()->route('admin.clients.index');
    }

    public function show(Client $client)
    {
        abort_if(Gate::denies('client_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client->load('status');

        return view('admin.clients.show', compact('client'));
    }

    public function destroy(Client $client)
    {
        abort_if(Gate::denies('client_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientRequest $request)
    {
        Client::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
