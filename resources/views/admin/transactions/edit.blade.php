@extends('layouts.admint')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transaction.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.transactions.update", [$transaction->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
                <label for="project">{{ trans('cruds.transaction.fields.project') }}*</label>
                <select name="project_id" id="project" class="form-control select2" required>
                    @foreach($projects as $id => $project)
                    <option value="{{ $id }}" {{ (isset($transaction) && $transaction->project ? $transaction->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_id'))
                <p class="help-block">
                    {{ $errors->first('project_id') }}
                </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('transaction_type_id') ? 'has-error' : '' }}">
                <label for="transaction_type">{{ trans('cruds.transaction.fields.transaction_type') }}*</label>
                <select name="transaction_type_id" id="transaction_type" class="form-control select2" required>
                    @foreach($transaction_types as $id => $transaction_type)
                    <option value="{{ $id }}" {{ (isset($transaction) && $transaction->transaction_type ? $transaction->transaction_type->id : old('transaction_type_id')) == $id ? 'selected' : '' }}>{{ $transaction_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('transaction_type_id'))
                <p class="help-block">
                    {{ $errors->first('transaction_type_id') }}
                </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('income_source_id') ? 'has-error' : '' }}">
                <label for="income_source" id="agen"></label>
                <select name="income_source_id" id="qty" class="form-control select2" required>
                    <option value="">Please select</option>
                    @foreach($income_sources1 as $id => $income_source)
                    <option value="{{ $income_source->id }}" data-price="{{ $income_source->fee_percent }}" {{ (isset($transaction) && $transaction->income_source ? $transaction->income_source->id : old('income_source_id')) == $income_source->id ? 'selected' : '' }}>{{$income_source->name}}</option>
                    @endforeach
                </select>
                <br>
                <label for="income_source" id="label_tabung"></label>
                <input type="text" id="tabung" name="tabung" class="form-control" readonly>
                @if($errors->has('income_source_id'))
                <p class="help-block">
                    {{ $errors->first('income_source_id') }}
                </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                <label for="amount">{{ trans('cruds.transaction.fields.amount') }}*</label>
                <input type="number" id="total" name="amount" class="form-control" value="{{ old('amount', isset($transaction) ? $transaction->amount : '') }}" readonly>
                @if($errors->has('amount'))
                <p class="help-block">
                    {{ $errors->first('amount') }}
                </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.transaction.fields.amount_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('currency_id') ? 'has-error' : '' }}">
                <label for="currency">{{ trans('cruds.transaction.fields.currency') }}*</label>
                <select name="currency_id" id="currency" class="form-control select2"  onchange="yesnoCheck(this);" required>
                    @foreach($currencies as $id => $currency)
                    <option value="{{ $id }}" {{ (isset($transaction) && $transaction->currency ? $transaction->currency->id : old('currency_id')) == $id ? 'selected' : '' }}>{{ $currency }}</option>
                    @endforeach
                </select>
                @if($errors->has('currency_id'))
                <p class="help-block">
                    {{ $errors->first('currency_id') }}
                </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('currency_id') ? 'has-error' : '' }}">
                <label for="currency" id="text">Bukti Transfer*</label>
                <br>
                <input type="file" name="bukti_tf" id="upload" multiple />
                @if($errors->has('bukti_tf'))
                <p class="help-block">
                    {{ $errors->first('bukti_tf') }}
                </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('transaction_date') ? 'has-error' : '' }}">
                <label for="transaction_date">{{ trans('cruds.transaction.fields.transaction_date') }}*</label>
                <input type="text" id="transaction_date" name="transaction_date" class="form-control date" value="{{ old('transaction_date', isset($transaction) ? $transaction->transaction_date : '') }}" required>
                @if($errors->has('transaction_date'))
                <p class="help-block">
                    {{ $errors->first('transaction_date') }}
                </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.transaction.fields.transaction_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.transaction.fields.name') }}</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($transaction) ? $transaction->name : '') }}">
                @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.transaction.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.transaction.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($transaction) ? $transaction->description : '') }}</textarea>
                @if($errors->has('description'))
                <p class="help-block">
                    {{ $errors->first('description') }}
                </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.transaction.fields.description_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function yesnoCheck(that) {
        if (that.value == 2) {
            $('#upload').show();
            $('#text').show();
        } else {
            $('#upload').hide();
            $('#text').hide();
        }
    }
</script>
<script>
    document.getElementById("label_tabung").innerText = "Jumlah Tabung*";
    document.getElementById("agen").innerText = "Agen*";
    $('#qty').on('change', function() {
        const qty = $('#qty option:selected').data('price');
        const totalDiscount = (qty * 15000);
        $('[name=tabung').val(qty + ' Tabung');
        $('[name=amount]').val(totalDiscount);

    });
</script>
@endsection