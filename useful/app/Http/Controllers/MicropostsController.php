<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MicropostsController extends Controller
{
    public function index(Request $request)
    {
        if (\Auth::check()) { //閲覧者が認証済みの場合

            $categories = \App\Category::all();
            $category_id = $request->input('category_id');


            if (isset($category_id)) {
                $microposts = \App\Micropost::where('category_id', $category_id)->get();
            }else{
                $microposts = \App\Micropost::all();
            }

            $data = [
            'microposts'=> $microposts,
            'categories' => $categories,
            ];


            return view('microposts.index', $data);
        } else {
            return view('welcome');
        }
    }

     /*public function index(Request $request)
    {
        // 認証済みユーザ取得
        $user = \Auth::user();
        $categories = \App\Category::all();
        $microposts = \App\Micropost::sortable();

        $category_id = $request->input('category_id');


        if (isset($category_id)) {
            $microposts = \App\Micropost::sortable()->where('category_id', $category_id)->paginate(10);
        }

        $data = [
            'user' => $user,
            'microposts'=> $microposts,
            'categories' => $categories,
        ];


        return view('microposts.index', $data);
    }*/

    public function create()
    {
        $micropost = new \App\Micropost;

        // 投稿作成ビューを表示
        return view('microposts.form', [
            'micropost' => $micropost,
        ]);
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
            'category_id' => 'required',
        ]);

        // 認証済みユーザ（閲覧者）の投稿として作成
        $request->user()->microposts()->create([
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);

        $microposts = \App\Micropost::all();

        return view('microposts.index', [
            'microposts' => $microposts
        ]);
    }

    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $micropost = \App\Micropost::findOrFail($id);

        // 認証済みユーザがその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $micropost->user_id) {
            $micropost->delete();
        }

        $microposts = \App\Micropost::all();

        return view('microposts.index', [
            'microposts' => $microposts
        ]);
    }
}
