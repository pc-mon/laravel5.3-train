@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Ticket {{ $ticket->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/tickets/tickets/' . $ticket->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Ticket"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/tickets/tickets', $ticket->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Ticket',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $ticket->id }}</td>
                                    </tr>
                                    <tr><th> Passenger Id </th><td> {{ $ticket->passenger_id }} </td></tr><tr><th> Trip Id </th><td> {{ $ticket->trip_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection