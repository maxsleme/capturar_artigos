<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Artigo;
use Auth;


class HomeController extends Controller {

	public function getIndex()
	{
    if (Auth::check())
    {
      return redirect('sistema');
    }

    return view('index');
  }

  public function postIndex(Request $request)
  {
       //dd($request->all());
    if (Auth::attempt(['name' => $request->name, 'password' => $request->password]))
    {
      return redirect()->intended('sistema');
    }

    return redirect('/')->withInput()->with('error', 'Login incorreto');
  } 
    
  public function getSistema()
  {


    if (Auth::check())
    {
      $artigos = Artigo::whereIdUsuario(Auth::user()->id)->get();
      return view('sistema.index', compact('artigos'));
    }
     

    return view('index');
  } 

  public function postSistema(Request $request)
  {    
      
      if($request->pesquisar == '')
      {
          return redirect('sistema')->with('error', 'Você precisa preencher algo para efetuar a busca');
      }

      $argumento = str_replace(' ', '+', $request->pesquisar);
    
      $url = file_get_contents('https://www.uplexis.com.br/blog/?s='.$argumento);
      $noticia_principal = explode('<div class="col-md-6 title">', $url);
      $noticia_principal_url = explode('<div class="col-md-6 d-flex align-items-center justify-content-center">', $url);
      
      $noticias_extras = explode('<div class="title">', $url);
      $noticias_extras_ocorrencias = count($noticias_extras);
      if(isset($noticia_principal[1]))
      {
      
        $noticia_partes = explode('</div>', $noticia_principal[1]);
        $title = $noticia_partes[0];

        $url_comeco = explode('<a href="', $noticia_principal_url[1]);
        
        $url_tratada = explode('" class="btn-uplexis orange">Continue Lendo</a>', $url_comeco[1]);
        
        $url = $url_tratada[0];
        
        Artigo::create(['id_usuario' => Auth::user()->id, 'titulo' => $title, 'link' => $url]);
        

      }else{ return redirect('sistema')->with('error', 'Não foi encontrada nenhuma publicação com esse termo'); }
      
      if($noticias_extras_ocorrencias >= 2)
      {
          $i = 0;
         foreach ($noticias_extras as $noticia) {
            if($i != 0)
            {
              $noticia_partes = explode('</div>', $noticia);
              $title = $noticia_partes[0];
              
              $url_comeco = explode('<a href="', $noticia);
              $url_tratada = explode('" class="btn-uplexis orange">Continue Lendo</a>', $url_comeco[1]);
              $url = $url_tratada[0];
              
              Artigo::create(['id_usuario' => Auth::user()->id, 'titulo' => $title, 'link' => $url]);
            }


            $i++;
         }
      }


    return redirect('sistema')->with('ok', 'Os artigos foram capturados');
  } 

  public function getLogout()
  {
    Auth::logout();
    return redirect('/');
  }  
}