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
                                            <th>img</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($data)
                                            @foreach($data as $row)
                                                <tr>
                                                    <td>{{ $row->id }}</td>
                                                    <td><img  width="100" height="100" src="{{ asset($row->img) }}"></td>
                                                    <td> 
                                                        <a href="{{ route('slider-edit',$row->id) }}" class="btn btn-warning"> Edit</a>
                                                        <a href="{{ route('slider-delete',$row->id) }}" class="btn btn-danger"> Delete</a>

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