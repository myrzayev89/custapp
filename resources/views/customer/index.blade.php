@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            Müştərilərin Siyahısı&nbsp;
                            <a href="{{ route('front.customer.create') }}" class="btn btn-success">
                                <i class="fas fa-plus"></i>
                            </a>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Müştərilərin Siyahısı</li>
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
                                            <th>Ad</th>
                                            <th>Soyad</th>
                                            <th>Ata Adı</th>
                                            <th>Ünvan</th>
                                            <th>Mobil</th>
                                            <th>Əməliyyat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customers as $customer)
                                            <tr>
                                                <td>{{ $customer->firstname }}</td>
                                                <td>{{ $customer->lastname }}</td>
                                                <td>{{ $customer->fathername }}</td>
                                                <td>{{ $customer->address }}</td>
                                                <td>{{ $customer->mobile }}</td>
                                                <td>
                                                    <a href="{{ route('front.customer.edit', ['id' => $customer->id]) }}" class="btn btn-primary">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>&nbsp;
                                                    <form action="{{ route('front.customer.destroy', ['id' => $customer->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
														<button type="submit" class="btn btn-danger show_confirm">
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
				text: "QEYD: Müştəri bazadan birdəfəlik silinəcək",
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