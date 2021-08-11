<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use Carbon\Carbon;
use Alert;

class BlogController extends Controller
{
    public function dashboard()
    {
        $sidebar = 'dashboard';
        $totalblog = Blog::count();
        $totalusers = User::count();
        $totalblogperhari = Blog::whereDate('created_at', strtok(Carbon::now()," "))->get();
        return view('dashboard.dashboard', compact('totalblog', 'totalusers', 'totalblogperhari', 'sidebar'));
    }

    /**
     * index
     * 
     * @return void
     */
    public function index()
    {
        $sidebar = 'blog';
        $blogs = Blog::latest()->get();
        return view('blog.index', compact('blogs', 'sidebar'));
    }

public function create()
{
    $sidebar = 'blog';
    return view('blog.tambah_blog', compact('sidebar'));
}


/**
* store
*
* @param  mixed $request
* @return void
*/
public function store(Request $request)
{
    $this->validate($request, [
        'image'     => 'required|image|mimes:png,jpg,jpeg|max:3048',
        'title'     => 'required|string|min:6',
        'konten'   => 'required|string|min:14',
    ]);

    // UPLOAD IMAGE IN STORAGE
    $image = $request->file('image');
    $image->storeAs('public/blogs', $image->hashName());

    $blog = Blog::create([
        'image'     => $image->hashName(),
        'title'     => $request->title,
        'content'   => $request->konten
    ]);

    if($blog){
        Alert::success('BERHASIL', 'Data Blog Berhasil Disimpan!');
        return redirect('/blog');
    }else{
        Alert::warning('GAGAL', 'Data Blog Gagal Disimpan!');
        return redirect('/blog');
    }
}

public function show($id)
{
    $sidebar = 'blog';
    $details = Blog::findOrFail($id);
    return view('blog.detail_blog', compact('details', 'sidebar'));
}

public function edit(Blog $blog)
{
    $sidebar = 'blog';
    return view('blog.edit_blog', compact('blog', 'sidebar'));
}


/**
* update
*
* @param  mixed $request
* @param  mixed $blog
* @return void
*/
public function update(Request $request, Blog $blog)
{
    $this->validate($request, [
        'title'     => 'required|string|min:6',
        'konten'   => 'required|string|min:14',
    ]);

    // GET DATA BLOG BY ID
    $blog = Blog::findOrFail($blog->id);

    if($request->file('image') == "") {

        $blog->update([
            'title'     => $request->title,
            'content'   => $request->konten
        ]);

    } else {

        // DELETE OLD IMAGE FROM STORAGE
        Storage::disk('local')->delete('public/blogs/'.$blog->image);

        // UPLOAD NEW IMAGE IN STORAGE
        $image = $request->file('image');
        $image->storeAs('public/blogs', $image->hashName());

        $blog->update([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->konten
        ]);

    }

    if($blog){
        //redirect dengan pesan sukses
        Alert::success('BERHASIL', 'Data Blog Berhasil Diupdate!');
        return redirect('/blog');
    }else{
        //redirect dengan pesan error
        Alert::warning('GAGAL', 'Data Blog Gagal Diupdate!');
        return redirect('/blog');
    }
}

    public function destroy($id)
    {
    $blog = Blog::findOrFail($id);
    Storage::disk('local')->delete('public/blogs/'.$blog->image);
    $blog->delete();
    
    if($blog){
        //redirect dengan pesan sukses
        Alert::success('BERHASIL', 'Data Blog Berhasil Dihapus!');
        return redirect('/blog');
    }else{
        //redirect dengan pesan error
        Alert::warning('GAGAL', 'Data Blog Gagal Dihapus!');
        return redirect('/blog');
    }
    }
}