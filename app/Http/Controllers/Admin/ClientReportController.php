<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Project;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientReportController extends Controller
{
    public function index(Request $request)
    {
        $q = Transaction::with('project')
            ->with('transaction_type')
            ->with('income_source')
            ->with('currency')
            ->where('deleted_at', NULL)
            ->orderBy('transaction_date', 'desc');

        if ($request->has('project')) {
            $q->where('project_id', $request->project);
        }

        $transactions = $q->get();

        $entries = [];

        foreach ($transactions as $row) {
            if ($row->transaction_date != null) {
                $date = Carbon::createFromFormat(config('panel.date_format'), $row->transaction_date)->format("Y-m");

                if (!isset($entries[$date])) {
                    $entries[$date] = [];
                }

                $currency = $row->currency->code;

                if (!isset($entries[$date][$currency])) {
                    $entries[$date][$currency] = [
                        'income'   => 0,
                        'expenses' => 0,
                        'fees'     => 0,
                        'total'    => 0,
                        'sisa'     => 0,
                        'penjualan' => 0,
                    ];
                }

                $income   = 0;
                $expenses = 0;
                $fees     = 0;
                $penjualan = 0;

                if ($row->amount > 0) {
                    $income += $row->amount;
                } else {
                    $expenses += $row->amount;
                }

                if (!is_null($row->income_source->fee_percent)) {
                    $fees = $row->amount * ($row->income_source->fee_percent / 100);
                }
                $projectse = Project::all();
                foreach ($projectse as $key => $value) {
                    $pembelian = $value->budget;
                }
               
                $tabung = $row->income_source->fee_percent;
                if ($tabung == 0) {
                    $tb = $pembelian;
                }else{
                    $tb = $pembelian - $tabung;
                }
                $total = $income + $expenses - $fees;
                $entries[$date][$currency]['income'] += $income;
                $entries[$date][$currency]['expenses'] += $expenses;
                $entries[$date][$currency]['fees'] += $fees;
                $entries[$date][$currency]['total'] += $total;
                $entries[$date][$currency]['sisa'] = $tb;
                $entries[$date][$currency]['penjualan'] = $tabung;
                
            }
        }

        $projects = Project::pluck('name', 'id')->prepend('--- ' . trans('cruds.clientReport.reports.allProjects') . ' ---', '');
        if ($request->has('project')) {
            $currentProject = $request->get('project');
        } else {
            $currentProject = '';
        }
        return view('admin.clientReports.index', compact(
            'entries',
            'projects',
            'currentProject',
        ));
    }
}
