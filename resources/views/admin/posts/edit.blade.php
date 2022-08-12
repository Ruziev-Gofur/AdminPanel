@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Tahrirlash </h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Orqaga</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="{{route('posts.update',$posts->id)}}" method="post">

                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="services">Sarlavha</label>
                                <input required="" type="text" name="title" class="form-control" value="{{$posts->title}}" id="title"
                                       placeholder="Sarlavha">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="services">Matn</label>
                                <input required="" type="text" name="text" value="{{$posts->text}}" class="form-control" id="text"
                                       placeholder="Matn">
                            </div>
                        </div>

                        @csrf
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="services">Surat</label>
                                <input required="" type="file" name="image" class="form-control" id="file"
                                       placeholder="Surat" value="{{$posts->image}}">
                            </div>
                        </div>


                        <div>
                            <lebel>Imege</lebel>
                            <input type="file" name="image"  required>
                        </div>

                        @foreach($posts as $posts)
                            <td><img height="200" width="200" src="/foodimage/{{$posts->image}}" ></td>
                        @endforeach


                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
