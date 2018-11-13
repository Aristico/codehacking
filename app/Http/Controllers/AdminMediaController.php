<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediaController extends Controller
{

    public function mediaDelete(Request $request) {

        if(isset($request->single_delete)) {

            $photo = Photo::findOrFail($request->single_delete);
            unlink(public_path() . $photo->file);
            $photo->delete();
            return redirect(route('media.index'));

        } elseif (isset($request->delete_all) && !empty($request->mediaSelectArray)) {

            $photos = Photo::findOrFail($request->mediaSelectArray);
            foreach ($photos as $photo) {

                unlink(public_path() . $photo->file);
                $photo->delete();
            }

        return redirect()->back();

        } else {

            return redirect()->back();

        }



    }


    public function index()  {

        $photos = Photo::all();

        return view('admin.media.index', compact('photos'));
    }

    public function create() {

        return view('admin.media.create');

    }

    public function store (Request $request) {

        $file = $request->file('file');
        $name = time() . '-' . $file->getClientOriginalName();
        $file->move('images', $name);
        Photo::create(['file'=>$name]);

    }

    public function destroy(Request $request)

    {



    }


}
