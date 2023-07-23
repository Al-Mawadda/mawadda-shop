@extends('layout.app')

@section('content')

	

		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Slider</h1>
                            </div>
                            @if ($msg = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">X</button>
                                    <strong>{{$msg}}</strong>
                                </div>
                              @endif
                              @if(count($errors) >0)
                                <div class="alert alert-danger">

                                    <ul>
                                        @foreach( $errors->all() as $error)
                                            <li>
                                                {{$error}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                    
                            <form class="user" enctype="multipart/form-data" method="post">

                            	{{ @csrf_field() }}
                                <div class="form-group ">
                                    <label >اسم المنتج</label>
                                    <input type="text" value="{{ $data->name }}" name="name" class="form-control form-control-user" id="exampleLastName" placeholder="Name" style="height: 60px !important;">
                                </div>
                                <div class="form-group ">
                                    <label>الوصف</label>
                                    <input type="text" value="{{ $data->disc }}" name="disc" class="form-control form-control-user" id="exampleLastName" placeholder="Name" style="height: 60px !important;">
                                </div>
                                <div class="form-group ">
                                    <label>السعر</label>
                                    <input type="text" value="{{ $data->price }}" name="price" class="form-control form-control-user" id="exampleLastName" placeholder="Name" style="height: 60px !important;">
                                </div>
                                <div class="form-group ">
                                    <label>الكمية</label>
                                    <input type="text" value="{{ $data->qty }}" name="qty" class="form-control form-control-user" id="exampleLastName" placeholder="Name" style="height: 60px !important;">
                                </div>



                                <div class="form-group ">
                                    <label>القسم</label>
                                    <select type="text" name="cat_id" class="form-control form-control-user" id="exampleLastName" >
                                        <option value="{{ $data->cat_id }}"> {{ $data->cat->name }}</option>
                                        
                                        @if($x??'')
                                            @foreach($x as $row)
                                                <option value="{{ $row->id }}"> {{ $row->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group ">
                                    <label>صورة المنتج</label>
                                    <input type="file" name="img" class="form-control form-control-user" id="exampleLastName" style="height: 60px !important;">
                                    <div>
                                        <img  width="100" height="100" src="{{ asset($data->img) }}">
                                    </div>
                                </div>
                                <button  class="btn btn-primary btn-user btn-block">
                                    حفظ
                                </button>
                                
                            </form>
                           
                        </div>
                    </div>
		</div>


@endsection