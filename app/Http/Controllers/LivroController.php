<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Livro;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;

class LivroController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('log.acesso');
    // }

    function selectLivros()
    {
        $query = Foto::select(
            "livros.id",
            "livros.titulo",
            "livros.subtitulo",
            "livros.isbn",
            "livros.edicao",
            "livros.ano",
            "fotos.alt",
            "fotos.src"
        )->leftJoin("livros", "livros.id", "=", "fotos.livro_id")->orderBy('livros.id', 'desc');

        // return $query ->paginate(4);
        return $query;
    }

    function pesquisaLivros($valueTermo)
    {
        $livros = Foto::select(
            "livros.id",
            "livros.titulo",
            "livros.subtitulo",
            "livros.isbn",
            "livros.edicao",
            "livros.ano",
            "fotos.alt",
            "fotos.src"
        )->leftJoin("livros", "livros.id", "=", "fotos.livro_id")
            ->where('livros.titulo', 'like', '%' . $valueTermo . '%')
            ->orWhere('livros.subtitulo', 'like', '%' . $valueTermo . '%')
            ->orWhere('livros.isbn', 'like', '%' . $valueTermo . '%')
            ->orWhere('livros.ano', '=', $valueTermo)
            ->orWhere('livros.edicao', '=', $valueTermo)
            ->orderBy('livros.id', 'desc');

        return $livros;
    }


    public function home()
    {
        return view('home');
    }

    public function pdfStream()
    {

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }

    public function pdfDownload(Request $request)
    {

        $termo = request('termo');
        if ($termo) {
            $livros = $this->pesquisaLivros($termo)->get();
        } else {
            $livros = $this->selectLivros()->get();
        }


        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $pdf = PDF::loadView('livros_pdf', ['termo' => $termo, 'livros' => $livros])
            ->setPaper('A4', 'portrait');

        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );

        return $pdf->stream(); //download('livros.pdf')
    }


    public function livros(Request $request)
    {
        $msg = request('msg');
       
        $termo = request('termo');
        if ($termo) {
            $livros = $this->pesquisaLivros($termo)->paginate(4);
        } else {
            $livros = $this->selectLivros()->paginate(4);
        }

        return view('livros', ['msg'=>$msg,'termo' => $termo, 'livros' => $livros]);
    }

    public function livrosCadastrar()
    {
        return view('livros_cadastro');
    }


    public function livrosEditar($id)
    {
        $livro = Livro::find($id);
        return view('livros_editar', ['livro' => $livro]);
    }
    public function deletar($id){
    // {"livros", "livros.id", "=", "fotos.livro_id"
        $fotos = Foto::where('livro_id',$id)->first();
        
        if ($fotos != null) {
            $fotos->delete();           
        }

    //    Livro::find($id)->delete();
       
        return redirect()->route('livros.listar');
    }


    public function pesquisar(Request $request)
    {
        $termo = request('termo');
        if ($termo) {
            $livros = $this->pesquisaLivros($termo);
        } else {
            $livros = $this->selectLivros();
        }

        return view('livros', ['termo' => $termo, 'livros' => $livros]);
    }

    public function livrosForm(Request $request)
    {
        $request->validate(
            [
                'titulo' => 'required|min:3|max:200',
                'isbn' => 'required|min:10|max:13',
                'edicao' => 'required',
                'ano' => 'required|min:4',
                'paginas' => 'required|max:200',
                'texto_alt' => 'required|min:4',
                'imagem_src' => 'required|min:4'
            ],
            [
                'titulo.required' => 'O título do livro é um dado obrigatório!',
                'titulo.min' => 'O título do livro deve ter no mínimo 3 caracteres!',
                'titulo.max' => 'O título do livro deve ter no máximo 200 caracteres!',
                'isbn.required' => 'O isbn é obrigatório!',
                'isbn.min' => 'O isbn deve ter no mínimo 10 caracteres!',
                'isbn.max' => 'O isbn deve ter no máximo 13 caracteres!',

                'required' => 'Este campo é obrigatório!'
            ]
        );
        $livroSalvo = Livro::create($request->all());
        if ($request->has('imagem_src')) {
            $image = $request->file('imagem_src');
            $reImage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('/resources/fotos');
            $image->move($dest, $reImage);
            // Salvando a imagem 
            $foto = new Foto();
            $foto->alt = $request->texto_alt;
            $foto->src = $reImage;
            $foto->livro_id = $livroSalvo->id;
            $foto->save();
            return redirect()->route('livros.listar')->with('success', 'Arquivo salvo com sucesso!');
        } else {
            return redirect()->route('livros.listar')->with('msg', 'É preciso escolher um arquivo!');
        }
    }

    public function livrosAtualizarDados(Request $request)
    {
        $request->validate(
            [
                'titulo' => 'required|min:3|max:200',
                'isbn' => 'required|min:10|max:13',
                'edicao' => 'required',
                'ano' => 'required|min:4',
                'paginas' => 'required|max:200',
               
            ],
            [
                'titulo.required' => 'O título do livro é um dado obrigatório!',
                'titulo.min' => 'O título do livro deve ter no mínimo 3 caracteres!',
                'titulo.max' => 'O título do livro deve ter no máximo 200 caracteres!',
                'isbn.required' => 'O isbn é obrigatório!',
                'isbn.min' => 'O isbn deve ter no mínimo 10 caracteres!',
                'isbn.max' => 'O isbn deve ter no máximo 13 caracteres!',

                'required' => 'Este campo é obrigatório!'
            ]
        );

        
        $livro = Livro::find(request('id'));
        $update = $livro->update($request->all());
        $msg = '';
        $termo='';

        if ($update) {
           $msg = "$livro->titulo foi atualizado com sucesso!"; 
           $termo=$livro->titulo;          
        } else {
            $msg = "$livro->titulo não foi atualizado!";            
        }
       
        return redirect()->route('livros.listar',['msg'=>$msg,'termo'=>$termo]);
    }


    public function uploadImage(Request $request)
    {
        // validação de imagem
        $this->validate($request, ['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);

        $image = false;

        $image = $request->file('image');

        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();


        // pasta de imagens
        $destinationPath = public_path('/imagens');

        $image->move($destinationPath, $input['imagename']);        

        return back()->with('success', 'Imagem submetida com sucesso!');
    }

    public function testes()
    {
        return view('testes');
    }
}
