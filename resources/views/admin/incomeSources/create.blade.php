@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.incomeSource.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.income-sources.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.incomeSource.fields.name') }}*</label>
                <select name="name" id="name" class="form-control select2" required>
                    @foreach($client as $id => $income_source)
                    <option value="{{ $income_source->company }}">{{ $income_source->company }}</option>
                    @endforeach
                </select>
                @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('penganteran') ? 'has-error' : '' }}">
                <label for="penganteran">Penganteran/minggu*</label>
                <input type="text" id="name" name="penganteran" class="form-control" value="{{ old('penganteran', isset($incomeSource) ? $incomeSource->penganteran : '') }}" required>
                @if($errors->has('penganteran'))
                <p class="help-block">
                    {{ $errors->first('penganteran') }}
                </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.incomeSource.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fee_percent') ? 'has-error' : '' }}">
                <label for="fee_percent">{{ trans('cruds.incomeSource.fields.fee_percent') }}</label>
                <input type="number" id="fee_percent" name="fee_percent" class="form-control" value="{{ old('fee_percent', isset($incomeSource) ? $incomeSource->fee_percent : '') }}" step="0.01">
                @if($errors->has('fee_percent'))
                <p class="help-block">
                    {{ $errors->first('fee_percent') }}
                </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.incomeSource.fields.fee_percent_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection