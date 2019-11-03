<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Model\Image;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        return view('images', compact('images'));
    }

    public function viewCrud()
    {
        $images = Image::all();
        return view('images', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view('produtoservicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nameFile = null;
    
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
    
            // Recupera a extensão do arquivo
            $extension = $request->image->extension();
    
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
    
            // Faz o upload:
            $upload = $request->image->storeAs('images', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
    
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            $request->name = $nameFile;

            $usuario = Auth::user();
            $usuario->images()->create(
                $request->all()
            );

            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
    
        }

      

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imageShow = Auth::user()
            ->images()
            ->findOrFail($id);
        return view('Image.show',compact(
            'imageShow'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtoservicos = ProdutoServico::findOrFail($id);
        return view("/produtoservicocrud/$id/editar", compact('produtoservicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produtoservicos = ProdutoServico::findOrFail($id);
        $produtoservicos->nome = $request->nome;
        $produtoservicos->descricao = $request->descricao;
        $produtoservicos->preco = $request->preco;
        $produtoservicos->tipo = $request->tipo;
        $produtoservicos->save();

        return redirect('/produtoservicocrud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produtoservicos = ProdutoServico::findOrFail($id);
        $produtoservicos->delete();
        return redirect('/produtoservicocrud');
    }

}
