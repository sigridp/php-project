<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Page;


class NewsController extends Controller
{
    /**
     * Laat alle berichten zien en sorteer deze op publish_date
     * paginate-method voor het plaatsen van 6 items per pagina.
     * 
     * @return \Illuminate\Contracts\View\Factory\Illuminate\View\View
     */
    public function index($url="news"){
        $newsItems = News::orderBy('publish_date', 'desc')->paginate(6);
        $page = Page::where('url', $url)->first();

        return view('news.index',
                    compact('newsItems', 'page')            
        );
    }

    /**
     * Toon één news-bericht op basis van url
     * 
     * @param  string $url
     * 
     * @return \Illuminate\Contracts\View\Factory\Illuminate\View\View
     */
    public function show($url){
        $item = News::where('url', $url)->first();
        
        return view('news.show',
                    compact('item')
        );
    }

    /**
     * aanmaken van een nieuw news-bericht
     * 
     * @return \Illuminate\Contracts\View\Factory\Illuminate\View\View
     */
    public function create(){
        return view('news.create');
    }

     /**
     * opslaan van een nieuw bericht in database
     * voor de url worden alle spaties vervangen door - tekens
     * redirect naar overzichtspagina news met bevestiging
     * 
     * @param $request
     *
     * @return void
     */
    public function store(Request $request){
        $request['url'] = str_slug($request->url, '-');
        $request['user_id'] = $request->user()->id;
        
        $this->validate(request(),[
            'title'         =>  'required|min:5|max:150',
            'url'           =>  'required',
            'content'       =>  'required',
            'publish_date'  =>  'nullable|date'
        ]);
        
        News::create(request(['title','url', 'content', 'publish_date', 'user_id']));

        return redirect('/news')
                ->with('success', 'Post updated successfully');
    }

    /**
     * verwijderen van nieuwsitem uit database
     * redirect naar overzichtspagina news met bevestiging
     * 
     * @param int $news_id
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($item_id){
        News::find($item_id)->delete();
        
        return redirect('/news')
                ->with('success', 'Post deleted successfully');;
    }

    /**
     * updaten van een bestaand nieuwsitem in database
     * redirect naar news-item-pagina met bevestiging
     * 
     * @param \App\News $news
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(News $item){
        $this->validate(request(), [
            'title'         => 'required|min:5|max:150',
            'url'           => 'required',
            'content' => 'required',
            'publish_date'  => 'nullable|date',
        ]);
        
        $item->update(request(['title', 'url', 'content', 'publish_date']));
        return redirect('/news/' . $item->url)
                       ->with('success', 'Post updated successfully');
    }

    /**
     * ophalen van bestaande gegevens van een news-item
     * zodat deze aangepast kan worden.
     * 
     * @param \App\News $news
     * 
     * @return \Illuminate\Contracts\View\Factory\Illuminate\View\View
     */
    public function edit(News $item){
        if(session()->hasOldInput()){
            $item->title        == session()->getOldInput('title');
            $item->content      == session()->getOldInput('content');
            $item->publish_date == session()->getOldInput('publish_date');
        }

        return view('news.edit',
                    compact( 'item' )
        );
    }

}