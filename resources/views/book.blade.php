@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('app.booknewticket') }}</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/book/save') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="trip_id">{{ trans('app.trips') }}: </label>
                            <select class="form-control" name="d[trip_id]">
                                @foreach($costs as $c)
                                    <option value="{{ $c['id'] }}">{{ $c['trip_from'] }} to {{ $c['trip_to'] }} : {{ $c['cost'] }} SAR</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" value="{{ $userid }}" name="d[passenger_id]" />
                        <button type="submit" class="btn btn-default">{{ trans('app.save') }}</button>
                    </form>

                    <table width="100%">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    {{ trans('app.details') }}
                                </th>
                                <th>
                                    {{ trans('app.control') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $t)
                                <tr>
                                    <td>
                                        {{ $t->id }}
                                    </td>
                                    <td>
                                        {{ $c['trip_from'] }} to {{ $c['trip_to'] }} : {{ $c['cost'] }} {{ trans('app.sar') }}
                                    </td>
                                    <td>
                                        <a href="{{ url('/book/delete/'.$t->id) }}" class="btn btn-danger">{{ trans('app.cancel') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
