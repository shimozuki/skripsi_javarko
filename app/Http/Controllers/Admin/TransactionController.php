<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransactionRequest;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\IncomeSource;
use App\Project;
use App\Transaction;
use App\TransactionType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File;

class TransactionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transactions = Transaction::all();

        return view('admin.transactions.index', compact('transactions'));
    }

    public function create()
    {
        abort_if(Gate::denies('transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaction_types = TransactionType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $income_sources = IncomeSource::all()->pluck('fee_percent', 'id')->prepend(trans('global.pleaseSelect'), '');
        $income_sources1 = IncomeSource::all();
        $name = Client::pluck('company','country')->prepend(trans('global.pleaseSelect'), '');
        $currencies = Currency::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transactions.create', compact('projects', 'transaction_types', 'income_sources', 'income_sources1',  'currencies', 'name'));
    }

    public function store(StoreTransactionRequest $request)
    {
        if ($request->bukti_tf == null) {
            $transaction = Transaction::create($request->all());
        }else {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->bukti_tf->extension());
            $transaction = Transaction::create(['bukti_tf' => $filename, 'amount' => $request->amount, 'transaction_date' => $request->transaction_date, 'name' => $request->name, 'description' => $request->description,
                'project_id' => $request->project_id, 'transaction_type_id' => $request->transaction_type_id, 'income_source_id' => $request->income_source_id, 'currency_id' => $request->currency_id]);
            $request->bukti_tf->move('storage/bukti_tf', $filename);
        } 
            return redirect()->route('admin.transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaction_types = TransactionType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $income_sources = IncomeSource::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaction->load('project', 'transaction_type', 'income_source', 'currency');

        $income_sources = IncomeSource::all()->pluck('fee_percent', 'id')->prepend(trans('global.pleaseSelect'), '');
        $income_sources1 = IncomeSource::all();
        return view('admin.transactions.edit', compact('projects', 'transaction_types', 'income_sources1', 'currencies', 'transaction'));
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->all());

        return redirect()->route('admin.transactions.index');
    }

    public function show(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->load('project', 'transaction_type', 'income_source', 'currency');

        return view('admin.transactions.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransactionRequest $request)
    {
        Transaction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
