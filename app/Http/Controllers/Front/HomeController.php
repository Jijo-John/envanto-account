<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $item_types = [
            'photos' => 'Photos',
            'stock-video' => 'Stock Video',
            'graphic-templates' => 'Graphic Templates',
            'wordpress' => 'WordPress',
            '3d' => '3D',
            'web-templates' => 'Web Templates',
            'graphics' => 'Graphics',
            'cms-templates' => 'CMS Templates',
            'video-templates' => 'Video Templates',
            'sound-effects' => 'Sound Effects',
            'presentation-templates' => 'Presentation Templates',
            'fonts' => 'Fonts',
        ];
        return view('welcome', compact('item_types'));
    }
    
    public function search(Request $request)
    {
        if (!filter_var($request->search, FILTER_VALIDATE_URL) === false) {
            $values = parse_url($request->search);
            if(isset($values['path'])){
              return redirect(''.$values['path']);
            }
        }
        
        $item_type = $request->item_type;
        $search = $request->search;
        
        return redirect(route('items', ['page' => $item_type. '/'. $search ]));
    }
    
    public function packages()
    {
        return view('front.packages');
    }
}
