<?php
// ↓ namespace（名前空間）= クラスの住所を示す
namespace App\Http\Controllers;

/* ↓use宣言=このファイルではこのクラスを使います」と宣言
    このファイルではIlluminate\Httpフォルダの中にあるRequestクラスを使うよ.と宣言
    宣言により、そのファイル内ではRequestと記述するだけでRequestクラスを呼び出せるようになる*/
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller {
   // 一覧ページ
   public function index() {        
    return view('posts.index');
   }
}
