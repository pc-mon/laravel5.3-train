@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Passengers</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/passengers/passengers/create') }}" class="btn btn-primary btn-xs" title="Add New Passenger"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Email </th><th> Fullname </th><th> Idno </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($passengers as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->email }}</td><td>{{ $item->fullname }}</td><td>{{ $item->idno }}</td>
                                        <td>
                                            <a href="{{ url('/admin/passengers/passengers/' . $item->id) }}" class="btn btn-success btn-xs" title="View Passenger"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/passengers/passengers/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Passenger"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/passengers/passengers', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Passenger" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Passenger',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $passengers->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection