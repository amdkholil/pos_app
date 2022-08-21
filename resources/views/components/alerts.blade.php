@if (session('status'))
    @if (session('status') == 'success-saved')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h4 class="text-green-700">Success!</h4>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data berhasil disimpan!
        </div>
    @elseif (session('status') == 'success-deleted')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h4 class="text-green-700">Success!</h4>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data berhasil dihapus!
        </div>
    @endif
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <h4 class="text-red-900">Error!</h4>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
