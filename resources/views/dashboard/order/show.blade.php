@extends('layout.app')

@section('content')
		<!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>customer name</th>
                                <th>total price</th>
                                <th>address</th>
                                <th>Status</th>
                                <th> product name , price , quentity and images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($ord)

                                @foreach($ord as $row)

                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->cus_name }}</td>
                                        <td>{{ $row->total }}</td>
                                        <td>{{ $row->address }}</td>
                                        <td>{{ $row->status ==0?"pending":"accepted"}}</td>
                                        <td>
                                            @foreach($row->itemord as $x)
                                                {{ $x->name }}
                                                {{ $x->price }}
                                                {{ $x->qty }}
                                                <img src="{{$x->img}}" width="70",height="70">
                                                <br>
                                                <br>
                                                <br>
                                            @endforeach
                                        </td>
                                        <td> 
                                            <a href="{{ route('order-view',$row->id) }}" class="btn btn-warning"> Edit</a>
                                            <a href="{{ route('order-delete',$row->id) }}" class="btn btn-danger"> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


@endsection