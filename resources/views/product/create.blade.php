@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Yeni Mal</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('front.product.index') }}"> Malların Siyahısı</a></li>
                            <li class="breadcrumb-item active">Yeni Mal</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-success">{{ session('error') }}</div>
                        @endif
                        <div class="card">
                            <form action="{{ route('front.product.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="name">Malın Adı</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name">
                                        </div>
                                        <div class="col-6">
                                            <label for="qty">Miqdar</label>
                                            <input type="number" name="qty" class="form-control" id="qty">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="purPrice">Alış Qiyməti</label>
                                            <input type="text" name="pur_price" class="form-control" id="purPrice">
                                        </div>
                                        <div class="col-6">
                                            <label for="selPrice">Satış Qiyməti</label>
                                            <input type="text" name="sel_price" class="form-control" id="selPrice">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="more">Ətraflı</label>
                                            <textarea name="more" id="more" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Əlavə et</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
