@extends('layouts.app')

@section('content')

<div class="container">
	{{-- <div class="table-wrapper">
		<div class="table-title">
			<div class="row">
				<div class="col-sm-6">
					<h2>Imagens com mensagem oculta</h2>
				</div>
			</div>
		</div>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Usuário</th>
				</tr>
			</thead>
			<tbody>
				@if(!empty($images))
					@foreach($images as $image)
					<tr>
						<td>{{ $image->nome }}</td>
						<td>{{ $image->tipo }}</td>
						<td>
							<a href="#decodeMessage" class="decode" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Decode">&#xE254;</i></a>
						</td>
					</tr>
					@endforeach
			</tbody>
		</table>

	</div> --}}

			<h3 class="pb-4 mb-4 font-italic border-bottom">
				Imagens
			</h3>
			<br>
			<div class="card-group" style="width: 70rem;">
				@if(!empty($images))
					@foreach($images as $image)
						<div class="card">
							<div>
								{{ $image->image }}
								{{-- <img src="data:image/png;base64,{{ chunk_split(base64_encode($image->image)) }}" /> --}}
								{{-- <img src="{{Storage::url('images/{{$image->id}}')}}"> --}}
							</div>
							<div class="card-body">
							<p class="card-text">{{ $image->id }}</p>
							</div>
						</div>
					@endforeach
			</div>
</div>

	
@else
	<h4>Não tem mensagens ocultas</h4>
@endif


@endsection