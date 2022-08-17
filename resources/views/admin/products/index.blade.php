@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull">
                            <h2> Maxsulotlar </h2>
                        </div>
                        <div class="pull-right">
{{--                            @can('role-create')--}}
                                <a class="btn btn-success" href="{{ route('products.create') }}"> Qo`shish </a>
{{--                            @endcan--}}
                        </div>
                        <div class="pull-left">
                            <a class="btn btn-primary" > Orqaga </a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered table-hover" style="font-size: 12px;">
                        <tr>

                            <th style="width: 10%">Id</th>
                            <th>Maxsulot nomi</th>
                            <th>Maxsulot turi</th>
                            <th>Maxsulot vazni</th>
                            <th>Maxsulot narxi</th>

                            <th class="w-25">Amallar</th>
                        </tr>
                        @foreach ($products as $key => $user)

                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <a href="{{ route ('products.show', ['$products->id']) }}">{{ $user->name }}</a>
                                        </td>
                                    <td>{{ $user->type }}</td>
                                    <td>{{ $user->weight }}</td>
                                    <td>{{ $user->price }}</td>

                                    <td >

                                        <form action="{{ route('products.destroy',$user->id) }}" method="POST">


                                            <a class="btn btn-primary" href="{{ route('products.edit', $user->id) }}"><i
                                                    class="fa fa-pen"></i></a>

                                            @csrf
                                            @method('DELETE')


                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>

                        @endforeach
                    </table>


                    <div class="container">
                        <div class="row justify-content-center">
                            @if ($products->links())
                                <div class="mt-4 p-4 box has-text-centered">
                                    {{ $products->links() }}
                                </div>
                            @endif
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
                title: `Haqiqatan ham bu yozuvni oʻchirib tashlamoqchimisiz?`,
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
