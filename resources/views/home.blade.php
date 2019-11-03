@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                        action="{{route('imagesupload')}}" 
                        method="POST" 
                        class="form"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <label for="imagem">Imagem:</label>
                        <img id="preview" />
                        <input type="text" name="name">
                        <input type="file" id="file" name="image"/>
                        <br/>
                        <input type="submit" value="Enviar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
