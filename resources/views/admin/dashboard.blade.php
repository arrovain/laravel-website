@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ürün Yönetimi</h5>
                        <p class="card-text">Ürünleri ekleyin, düzenleyin veya silin.</p>
                        <a href="{{ route('admin.products') }}" class="btn btn-primary">Ürünlere Git</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Haber Yönetimi</h5>
                        <p class="card-text">Haberleri ekleyin, düzenleyin veya silin.</p>
                        <a href="{{ route('admin.news') }}" class="btn btn-primary">Haberlere Git</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
