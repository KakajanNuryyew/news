<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::query()
            ->orderBy('id', 'desc')
            ->paginate(4);
        return view('pages.admin.news.index', compact ('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,bmp,png',          
        ]);

        $imagePath = Storage::disk('local')
            ->put(Image::STORAGE_DIR, $request->file('image'));  

        $pathParts = pathinfo($imagePath);

        $news = News::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $pathParts['basename'],
            'author' => $user->login
        ]);                

        return back()->with('success', 'Üstünlikli ýatda saklanyldy!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::findOrFail($id);
        return view ('pages.admin.news.edit', compact('new'));
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
        $rules = [];

        if ($request->hasFile('image')) {
            $rules['image'] = 'required|mimes:jpg,bmp,png,webp';
        }

        $rules['name'] = 'required';
        $rules['description'] = 'required';

        $request->validate($rules);            
        
        $new = News::findOrFail($id);

        if ($request->hasFile('image')) {
            if (Storage::disk('local')->exists(Image::dir($new->image))) {
                Storage::delete(Image::dir($new->image));
            }

            $imagePath = Storage::disk('local')
                ->put(Image::STORAGE_DIR, $request->file('image'));  

            $pathParts = pathinfo($imagePath);

            $new->image = $pathParts['basename'];
        }

        $new->name = $request->name;
        $new->description = $request->description;

        if (!$new->save()) {
            return back()->with('error', 'Ýatda saklamakda mesele ýüze çykdy!');
        }

        return back()->with('success', 'Üstünlikli ýatda saklanyldy!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::findOrFail($id);

        if (Storage::disk('local')->exists(Image::dir($new->image))) {
            Storage::delete(Image::dir($new->image));
        }

        $new->delete();

        return back()->with('success', 'Maglumat üstünlikli pozuldy!');
    }

    function getByPage(Request $request)
    {
        if($request->ajax())
        {
            $news = News::query()
                ->orderBy('id', 'desc')
                ->paginate(4);

            return view('includes.admin.news-items', compact('news'))->render();
        }
    }
}
