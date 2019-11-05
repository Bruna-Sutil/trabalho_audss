@extends('layouts.app')

@section('content')

<div class="container">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
				Galeria do usuário
			</h3>
			<br>
            <div class="card-deck">
                @if(!empty($images))
                    @foreach($images as $image)
                    <div class="card" style="max-width: 18rem !important;">
                        <img 
                            class="imageCard card-img-top"
                            src="{{asset("storage/images/{$image->name}")}}" 
                            alt=""
                        >
                        <div class="card-body">
                            <p class="card-text">Id do usuário: {{ $image->user_id }}</p>
                            <p class="card-text">Criada em: {{ $image->created_at }}</p>
                        </div>
                    </div>
                    @endforeach
            </div>
</div>

	
@else
	<h4>Não tem mensagens ocultas</h4>
@endif


@endsection