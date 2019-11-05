@extends('layouts.app')

@section('content')

<div class="container">
    <form 
        action="{{route('imagesupload')}}" 
        method="POST" 
        class="form"
        enctype="multipart/form-data"
    >
        @csrf
        <div class="row w-100 align-items-center" style="height: 200px;">
            <div class="col-4">
                <input type="file" id="file" name="image"/>
            </div>
            <div class="col-6">
                <div class="card" style="width: 500px; border:none;">
                    <img id="preview" class="card-img-top" />
                </div>
            </div>
            <div class="col align-self-end" style="width: 500px; border:none;">
                <canvas id='canvas' style="max-width: 200px;" hidden></canvas>
                {{-- <div id='resulta'>
                    <div class="card">
                        <img id="output" class="card-img-top" />
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="row w-100 align-items-end" style="height: 200px;">
            <div class="col-6">
                <div class="row">
                    <div class="col-8">
                        <textarea 
                            id="message" 
                            class="form-control"
                            maxlength='1000'
                            placeholder='Escreva a mensagem que deseja ocultar.'
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
                        />
                    </div>
                </div>
                <div class="row w-100 justify-content-end">
                    <a 
                        href="#resulta" 
                        id="encode" 
                        class="btn btn-outline-primary" 
                        data-toggle="modal">
                        <span>Ocultar Mensagem</span>
                    </a>
                </div>
            </div>
        
            <div class="col-6">
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
                    <div class="row justify-content-end">
                        <a 
                            href="#resulta-mensagem" 
                            id="decode" 
                            class="btn btn-outline-primary" 
                            data-toggle="modal">
                            <span>Revelar Mensagem</span>
                        </a>
                    </div>
            </div>
        </div>
        <div id="resulta" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Mensagem oculta</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <div class="card">
                                    <input type="file" id="fileHidden" hidden/>
                                    <img id="output" class="card-img-top"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-primary">
                                Salvar no Banco
                            </button>
                        </div>
                </div>
            </div>
        </div>
        
        <div id="resulta-mensagem" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Mensagem oculta</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div >
                                <div id='reveal' class="col-6">
                                    <span>Mensagem oculta:</span>
                                    <div id='messageDecoded'></div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </form>
</div>	


@endsection