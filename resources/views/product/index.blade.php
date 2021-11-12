@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            Malların Siyahısı&nbsp;
                            <a href="{{ route('front.product.create') }}" class="btn btn-success">
                                <i class="fas fa-plus"></i>
                            </a>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Malların Siyahısı</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Malın Adı</th>
                                            <th>Miqdarı</th>
                                            <th>Satış Qiyməti</th>
                                            <th>Alış Qiyməti</th>
                                            <th>Əməliyyat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->qty }}</td>
                                                <td>{{ $product->pur_price }}</td>
                                                <td>{{ $product->sel_price }}</td>
                                                <td>
                                                    <a href="{{ route('front.product.edit', ['id' => $product->id]) }}" class="btn btn-primary">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>&nbsp;
                                                    <form action="{{ route('front.product.destroy', ['id' => $product->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
														<button type="button" class="btn btn-danger show_confirm">
															<i class="fas fa-trash-alt"></i>
														</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.show_confirm').click(function(event) {
			var form =  $(this).closest("form");
			event.preventDefault();
			swal({
				title: `Silmək istədiyinizdən əminsinizmi?`,
				text: "QEYD: Mal bazadan birdəfəlik silinəcək",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				buttons: ['İmtina', 'Sil']
			})
			.then((willDelete) => {
				if (willDelete) {
					form.submit();
				}
			});
		});
	</script>
@endsection
