@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Book New Ticket</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/book/save') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="trip_id">Trips: </label>
                            <select class="form-control" name="d[trip_id]">
                                @foreach($costs as $c)
                                    <option value="{{ $c['id'] }}">{{ $c['trip_from'] }} to {{ $c['trip_to'] }} : {{ $c['cost'] }} SAR</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" value="{{ $userid }}" name="d[passenger_id]" />
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>

                    <table width="100%">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Details
                                </th>
                                <th>
                                    Control
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
                                        {{ $c['trip_from'] }} to {{ $c['trip_to'] }} : {{ $c['cost'] }} SAR
                                    </td>
                                    <td>
                                        <a href="{{ url('/book/delete/'.$t->id) }}" class="btn btn-danger">Cancel</a>
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
