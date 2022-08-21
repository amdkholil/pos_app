@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Kategori</h2>
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Tambah Kategori
                </button>
            </div>
        </div>
    </div>
    <div class="row m-t-25">
        <div class="col-12">
            <div class="p-6 rounded-md shadow bg-white">
                @include('components.alerts')
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach ($categories as $cat)
                        <div class="bg-indigo-50 shadow-md p-3 border border-gray-600 flex gap-2 rounded-md">
                            <div class="flex-auto">
                                {{ $cat->name }}
                            </div>
                            <div class="flex-none">
                                <button class="w-7 h-7 rounded-full bg-blue-500 text-white edit" data-id="{{ $cat->id }}" data-val="{{$cat->name}}" data-toggle="tooltip"
                                    title="Ubah">
                                    <i class="fas fa-pencil-alt fa-sm"></i>
                                </button>
                                <button class="w-7 h-7 rounded-full bg-red-600 text-white drop" data-id="{{ $cat->id }}" data-toggle="tooltip"
                                    title="Hapus">
                                    <i class="fas fa-times fa-sm"></i>
                                </button>
                            </div>
                            <form method="POST" id="drop-{{ $cat->id }}" action="/admin/category/{{ $cat->id }}">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection

@push('modal')
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="/admin/category">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama kategori</label>
                            <input type="text" name="name" id="" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="" id="form-edit">
                @csrf
                @method('put')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama kategori</label>
                            <input type="text" name="name" id="cat-edit" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endpush

@push('script')
    <script src="/assets/js/sweetalert2.js"></script>
    <script>
            $('.drop').click(function(){
                let id = this.dataset.id
                Swal.fire({
                  title: 'Peringatan!',
                  text:'Apakah yakin akan menghapus data ini?',
                  icon: 'question',
                  confirmButtonColor:'red',
                  confirmButtonText: 'Hapus',
                  cancelButtonText: 'Batal',
                  showCancelButton: true,
                  showCloseButton: true
                })
                .then((r)=>{
                    if(r.value){
                        $('#drop-'+id).submit()
                    }
                })
            })

            $('.edit').click(function(){
                let id = this.dataset.id
                let val = this.dataset.val
                let url = '/admin/category/'+id
                $('#cat-edit').val(val)
                $('#form-edit')[0].action= url
                $('#modal-edit').modal('show')
            })
    </script>
@endpush
