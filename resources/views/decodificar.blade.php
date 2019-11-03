@extends('layouts.app')

@section('content')

<div class="container">
      
            <span>Faça o upload de uma imagem: </span>
            <hr>
            <div class="row">
                <div class="col-6">
                    <input type="text" name="name">
                    <input type="file" id="file" name="image" required/>
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
                <canvas id='canvas'></canvas>
                <div id='resulta'>
                    <div class="card" style="width: 50rem; border:none;">
                        <img id="output" class="card-img-top" />
                    </div>
                </div>
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

@endsection