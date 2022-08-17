@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Yangi xarid qo'shing </h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('products.index') }}"> Orqaga </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="services">Nomi</label>
                                <input required="" type="text" name="name" class="form-control" id="name"
                                       placeholder="Nomi">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="services">Turi</label>
                                <input required="" type="text" name="type" class="form-control" id="type"
                                       placeholder="Turi">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="services">Vazni</label>
                                <input required="" type="number" name="weight" class="form-control" id="weight"
                                       placeholder="Vazni">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="services">Narxi</label>
                                <input required="" type="number" name="price" class="form-control" id="price"
                                       placeholder="Narxi">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection


