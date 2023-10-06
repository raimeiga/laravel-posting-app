<?php   //このファイルはコントローラのファイル。
namespace App\Http\Controllers;   // ← namespace（名前空間）はクラスの住所を示す

use Illuminate\Http\Request;

/* ↑ use宣言=このファイルではこのクラスを使います」と宣言
  このファイルではIlluminate\Httpフォルダの中にあるRequestクラスを使うよ.と宣言
  宣言により、そのファイル内ではRequestと記述するだけでRequestクラスを呼び出せるようになる*/
class PostController extends Controller {
   // 一覧ページ
   public function index() {        
    return view('posts.index');
   } 
}
   /* ↑ view()ヘルパー=ビューを表示するためのもの。
　　  view('posts.index')のように、表示したいビューを引数として指定する
　　  postsフォルダのindex.blade.phpファイル（ビュー画面のファイル）
　　  resources/views/posts/index.blade.phpというURLだが、
　　  resources/viewsを省略し、フォルダ名.ファイル名（.blade.phpは不要）と記述*/
