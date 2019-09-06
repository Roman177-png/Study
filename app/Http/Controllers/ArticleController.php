<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Topic;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    public function addArticle()
    {
        $users = User::get();
        $topics = Topic::get();
        return view('articles.add-article', compact('users', 'topics'));
    }

    public function submitArticle(Request $request)
    {
        $article = Article::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'topic_id' => $request->input('topic_id'),
            'user_id' =>Auth::user()->id,
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = "public/articles/{$article->id}";
            Storage::makeDirectory($path);
            if ($article->images && is_file(storage_path("app/$path/$article->images"))){
                unlink(storage_path("app/$path/$article->images"));
            }
            $file->move(storage_path("app/$path"),$file->getClientOriginalName());
            $article->images = $file->getClientOriginalName();
            $article->save();
        };
        return redirect()->route('index');
    }

    public function editArticle($article_id)
    {
        $article = Article::find($article_id);
        $users = User::get();
        $topics = Topic::get();
        return view('articles.edit-article', compact('article','users','topics'));
    }
    public function submitEditArticle(Request $request, $article_id)
    {
        $article = Article::find($article_id);
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->topic_id = $request->input('topic_id');
        $article->user_id = $request->input('user_id');
        $article->save();
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $path = "public/articles/{$article->id}";
            Storage::makeDirectory($path);
            $file->move(storage_path("app/$path"), $file->getClientOriginalName());
            $article->images= $file->getClientOriginalName();
            $article->save();
        };

        return redirect()->route('index');
    }
    public function deleteArticle($article_id)
    {
        $article=Article::find($article_id);
        $article->delete();
        return redirect()->route('index');
    }
}