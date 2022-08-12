{{--@extends('admin.custumers')--}}
@section('content')
    <div class="col-md-12">

        <a href="{{ route('products.index') }}">Orqaga</a>
        <table class="table table-border">
            <tr>
                <td>Maxsulot nomi</td>
                <td>{{$products->mane}}</td>
            </tr>
            <tr>
                <td>Maxsulot turi</td>
                <td>{{$products->type}}</td>
            </tr>
            <tr>
                <td>Og'irligi</td>
                <td>{{$products->waight}}</td>
            </tr>
            <tr>
                <td>Narxi</td>
                <td>{{$products->price}}</td>
            </tr>
            <tr>
                <td>Qo'shilgan vaxti</td>
                <td>{{$products->created_at}}</td>
            </tr>
        </table>
    </div>
@endsection
