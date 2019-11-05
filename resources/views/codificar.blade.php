@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row w-100">
        <div class="col-6">

            <form 
                action="{{route('imagesupload')}}" 
                method="POST" 
                class="form"
                enctype="multipart/form-data"
            >
                @csrf
                <span>Faça o upload de uma imagem: </span>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="name">
                        <input type="file" id="file" name="image" />
                    </div>
                    <div class="col-6">
                        <div class="card" style="width: 50rem; border:none;">
                            <img id="preview" class="card-img-top" />
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-6">
                        <span>Mensagem: </span>
                        <hr>
                        <div class="col">
                            <div id="choose" class="row">
                                <div class="col-8">
                                    <textarea 
                                        id="message" 
                                        class="form-control"
                                        maxlength='1000'
                                        placeholder='Escreva a mensagem que deseja ocultar.'
                                        required
                                    >
                                    </textarea>
                                </div>
                            </div>
                            <span>Senha:</span>
                            <div class="row">
                                <div class="col-4">
                                    <input 
                                        id="password"
                                        type="password" 
                                        placeholder='Senha'
                                        required
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        {{-- <span>Resultado</span> --}}
                        <canvas id='canvas'></canvas>
                        <div id='resulta'>
                            <div class="card" style="width: 50rem; border:none;">
                                <img id="output" class="card-img-top" />
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <button 
                    id="encode" 
                    class="btn btn-outline-primary"
                    type="submit" 
                >
                    Ocultar Mensagem
                </button>
            </form>
        </div>
        <div class="col-6">
                <span>Decodificar </span>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <span>Mostrar Dados </span>
                        <hr>
                        <div class="col">
                            <div id="choose" class="row">
                            <span>Senha:</span>
                            <div class="col-6">
                                <input 
                                    type='password' 
                                    id='password2' 
                                    class='password'
                                    placeholder='Senha' 
                                />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id='reveal' class="col-6">
                        <span>Mensagem oculta:</span>
                        <div id='messageDecoded'></div>
                    </div>
                <br>
                <br>
                <button id='encode' class='submit' hidden></button>
                <button 
                    id="decode" 
                    class="submit"
                >
                    Revelar Mensagem
                </button>
        </div>
    </div>
</div>	

@endsection