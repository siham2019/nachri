<?php

namespace App\Http\Controllers;

use App\Models\Photo as ModelsPhoto;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function save(Request $request)
    {
        $extension = $request->h->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $request->h->move('photo',$filename);

        ModelsPhoto::create([
            'h'=>   $filename
        ]);
        
        dd( $filename);
    }
}
