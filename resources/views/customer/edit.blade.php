@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Müştəri - {{ $customer->firstname.' '.$customer->lastname }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('front.customer.index') }}"> Müştərilərin
                                    Siyahısı</a></li>
                            <li class="breadcrumb-item active">{{ $customer->firstname.' '.$customer->lastname }}</li>
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
                            <form action="{{ route('front.customer.update', ['id' => $customer->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="firstname">Adı</label>
                                            <input type="text" value="{{ $customer->firstname }}" name="firstname" class="form-control @error('firstname') is-invalid @enderror" id="firstname">
                                        </div>
                                        <div class="col-4">
                                            <label for="lastname">Soyadı</label>
                                            <input type="text" value="{{ $customer->lastname }}" name="lastname" class="form-control" id="lastname">
                                        </div>
                                        <div class="col-4">
                                            <label for="fathername">Ata Adı</label>
                                            <input type="text" value="{{ $customer->fathername }}" name="fathername" class="form-control" id="fathername">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="address">Ünvan</label>
                                            <input type="text" value="{{ $customer->address }}" name="address" class="form-control" id="address">
                                        </div>
                                        <div class="col-6">
                                            <label for="mobile">Mobil</label>
                                            <input type="text" value="{{ $customer->mobile }}" name="mobile" class="form-control" id="mobile">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="more">Ətraflı</label>
                                            <textarea name="more" id="more" class="form-control" rows="5">{{ $customer->more }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Redaktə et</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
