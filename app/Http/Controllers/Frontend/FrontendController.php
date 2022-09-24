<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FeaturedPost;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\Reservation;
use App\Models\Slider;
use App\Models\Team;

class FrontendController extends Controller
{
    public function showHomePage()
    {
        
        $sliders= Slider::where('status',true)->get();
        $featured= FeaturedPost::where('status',true)->take(8)->get();
        return view('frontend.pages.index',[
            'all_sliders' => $sliders,
            'all_featured' => $featured,
        ]);
    }
    public function showMenuPage()
    {
        $menus= Menu::where('status',true)->get();
        return view('frontend.pages.menu', [
            'all_menus' => $menus,
        ]);
    }
    public function showTeamPage()
    {
        $teams= Team::where('status',true)->get();
        return view('frontend.pages.team', [
            'all_teams' => $teams,
        ]);
        
    }
    public function showGalleryPage()
    {
        $gallery= Gallery::where('status',true)->get();
        return view('frontend.pages.gallery', [
            'all_gallery' => $gallery,
        ]);
    }
    public function showReservationPage()
    {
        return view('frontend.pages.reservation');
    }
}
