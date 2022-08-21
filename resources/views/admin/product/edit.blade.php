@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h4 class="title-2">Ubah produk</h4>
            </div>
        </div>
    </div>
    <div class="row m-t-25">
        <div class="col-sm-8">
            <div class="bg-white rounded-md shadow p-8">
                @include('components.alerts')
                <form action="/admin/product/{{ $product->id }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" name="name" id="name" value="{{ $product->name }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Deskripsi Produk</label>
                        <textarea name="description" class="form-control" id="description" rows="5">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Harga Produk</label>
                        <input type="number" name="price" id="price" value="{{ $product->price }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Kategori Produk</label>
                        <select name="category_id" id="category" class="form-control">
                            <option value="">Pilih Kategori Produk</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Foto Produk</label>
                        <input type="file" accept=".jpg,.jpeg,.png,.gif,.webp" name="photo" class="block"
                            id="photo">
                    </div>
                    <div class="form-group">
                        <div id="preview" class="h-32 w-32 bg-gray-200 flex">
                            <img src="{{ asset($product->photo) }}" id="imageprev" alt=""
                                class="img-thumbnail img-fluid m-auto">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-lg btn-primary">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.tiny.cloud/1/ol18z6hbzphfaxtjccqlnidc34f5hd5a3p4uvqomssvf7fbn/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#description',
            menubar: false,
            statusbar: false,
            max_height: 300,
            plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist',
            toolbar_mode: 'floating',
        });

        $('select').select2();

        document.getElementById('photo').onchange = evt => {
            const [file] = document.getElementById('photo').files
            if (file) {
                document.getElementById('imageprev').src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
