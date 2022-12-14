@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull">
                            <h2> Mahsulotlar </h2>
                        </div>
                        <div class="pull-right">
{{--                            @can('role-create')--}}
                                <a class="btn btn-success" href="{{ route('posts.create') }}"> Qo`shish </a>
{{--                            @endcan--}}
                        </div>
                        <div class="pull-left">
                            <a class="btn btn-primary" href="{{ route('home') }}"> Orqaga </a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered table-hover" style="font-size: 12px;">
                        <tr>

                            <th style="width: 3%">Id</th>
                            <th>Sarlavha</th>
                            <th>Matn</th>
                            <th>Surat</th>

                            <th class="w-25">Amallar</th>
                        </tr>
                        @foreach ($posts as $key => $user)

                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->title }}</td>
                                    <td>{{ $user->text }}</td>
                                    <td><img src="{{ asset('images/'.$user->image) }}"
                                             style="height: 100px; width: 150px;"></td>
                                    <td >

                                        <form action="{{ route('posts.destroy',$user->id) }}" method="POST">

                                            <a class="btn btn-primary" href="{{ route('posts.edit',['id'=>$user->id]) }}"><i
                                                    class="fa fa-pen"></i></a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>

                        @endforeach
                    </table>
                    {{$posts->links()}}
                    <div class="container">
                        <div class="row justify-content-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if(session('success'))
{{--qo'shish--}}
        <script>
            swal({
                icon: 'success',
                text: 'Muvaffaqqiyatli bajarildi',
                confirmButtonText: 'Continue',
            })
        </script>
    @endif

{{--o'chirish--}}
    <script>
        $('.show_confirm').click(function (event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Haqiqatan ham bu yozuvni o??chirib tashlamoqchimisiz?`,
                text: "Agar siz buni o'chirib tashlasangiz, u abadiy yo'qoladi.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ['Yo`q', 'Ha']
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
