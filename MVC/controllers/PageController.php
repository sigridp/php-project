<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\News;
use Auth;

class PageController extends Controller
{

    /**
	 * Geef de home pagina weer
	 *
	 * @return \Illuminate\View\View
	 */

    public function index(){
        return view('pages.index');
    }

    /**
	 * Geef de pagina zoals in de url
	 *
	 * @return \Illuminate\View\View
	 */

    public function show($url){
       $page = Page::ActivePage($url);  
       return view('pages.show',
                    compact('page')
        );
    }

    /**
     * Weergave van de users-profile
     * 
     * @return \Illuminate\Contracts\View\Factory\Illuminate\View\View
     */
    public function profile($url = 'profile'){
        $user = Auth::user();
        $page = Page::ActivePage($url);

        return view('pages.profile',
                    compact('page', 'user', $user)
        );
    }

    /**
     * Voor het uploaden van een avatar met versturen van een bevestiging
     * 
     * @param $request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_avatar(Request $request){
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user();
        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
    
        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully uploaded your image.');
    }
}
