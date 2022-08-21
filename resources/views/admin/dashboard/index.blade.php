@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">overview</h2>
            </div>
        </div>
    </div>
    <div class="row m-t-25">
        <div class="col-sm-4 col-lg-3">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix pb-6 px-6">
                        <div class="icon">
                            <i class="fa fa-cube" aria-hidden="true"></i>
                        </div>
                        <div class="text">
                            <span class="text-white">Produk</span>
                            <h2>{{$totalProduct}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-lg-3">
            <div class="overview-item overview-item--c4">
                <div class="overview__inner">
                    <div class="overview-box clearfix pb-6 px-6">
                        <div class="icon">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                        </div>
                        <div class="text">
                            <span class="text-white">Kategori</span>
                            <h2>{{$totalCategory}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
