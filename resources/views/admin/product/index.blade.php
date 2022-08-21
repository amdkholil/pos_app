@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Produk</h2>
                <a href="product/create" class="btn btn-md btn-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Tambah Produk
                </a>
            </div>
        </div>
    </div>
    <div class="row m-t-25">
        <div class="col-12">
            <div class="bg-white rounded-md shadow p-4">

                @include('components.alerts')

                <table class="table table-bordered" id="datatable">
                    <thead>
                        <tr class="bg-green-600 text-white">
                            <th>No.</th>
                            <th>Nama Produk</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    <form action="" id="form-drop" class="hidden" method="post">
        @csrf
        @method('delete')
    </form>
@endpush

@push('head')
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.bootstrap4.min.css') }}">
@endpush

@push('script')
    <script src="{{ asset('assets/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.js')}}"></script>

    <script>
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "/admin/product",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'category',
                    name: 'categories.name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('table').delegate('.drop','click',function(e) {
            let id = this.dataset.id
            let uri = '/admin/product/' + id
            Swal.fire({
                title: 'Hapus',
                icon: 'question',
                text: 'Apakah yakin akan menghapus data ini?',
                confirmButtonColor: 'red',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal',
                showCancelButton: true,
                showCloseButton: true
            }).then((e) => {
                if (e.value) {
                    document.getElementById('form-drop').action = uri
                    document.getElementById('form-drop').submit()
                }
            })
        });
    </script>
@endpush
