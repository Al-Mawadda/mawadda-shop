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
                                            <th>name</th>
                                            <th>disc</th>
                                            <th>price</th>
                                            <th>qty</th>
                                            <th>category</th>
                                            <th>img</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if($data)
                                            @foreach($data as $x)
                                                <tr>
                                                    <td>{{ $x->id }}</td>
                                                    <td>{{ $x->name }}</td>
                                                    <td>{{ $x->disc }}</td>
                                                    <td>{{ $x->price }}</td>
                                                    <td>{{ $x->qty }}</td>
                                                    <td>{{ $x->cat->name ??""}}</td>
                                                    <td><img  width="100" height="100" src="{{ asset($x->img) }}"></td>
                                                    <td> 
                                                        <a href="{{ route('prod-edit',$x->id) }}" class="btn btn-warning"> Edit</a>
                                                        <a href="{{ route('prod-delete',$x->id) }}" class="btn btn-danger"> Delete</a>

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