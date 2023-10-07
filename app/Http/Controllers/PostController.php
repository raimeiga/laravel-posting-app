<?php   //このファイルはコントローラのファイル。
namespace App\Http\Controllers;   // ← namespace（名前空間）はクラスの住所を示す

use Illuminate\Http\Request;
/* ↑ use宣言=このファイルではこのクラスを使います」と宣言
  このファイルではIlluminate\Httpフォルダの中にあるRequestクラスを使うよ.と宣言
  宣言により、そのファイル内ではRequestと記述するだけでRequestクラスを呼び出せるようになる*/
   
  // やりとりするモデルを宣言。storeアクションでデータベース（postsテーブル）とやりとりするためにPostモデルを使うので、use宣言しておく
  use App\Models\Post;
  class PostController extends Controller {
   // 一覧(投稿一覧)ページ
   public function index() {        
    return view('posts.index');
   } 
      /* ↑ view()ヘルパー=ビューを表示するためのもの。
   　　  view('posts.index')のように、表示したいビューを引数として指定する
   　　  postsフォルダのindex.blade.phpファイル（ビュー画面のファイル）
   　　  resources/views/posts/index.blade.phpというURLだが、
   　　  resources/viewsを省略し、フォルダ名.ファイル名（.blade.phpは不要）と記述*/
   
   // 作成（新規投稿）ページ
   public function create() {
    return view('posts.create');
}
    /* ↑ 表示するビューに、resources/views/posts/create.blade.phpを指定
         resources/viewsを省略し、フォルダ名.ファイル名（.blade.phpは不要）と記述*/

      // 作成機能
      public function store(Request $request) {
      $post = new Post();                          // ← Postモデルをインスタンス化
      $post->title = $request->input('title');     // ← 「$post->title」はPostモデルとつながるPostsテーブル（データベース）のtitleカラムに投稿一覧のテキストボックスに書いたメッセージを代入
      $post->content = $request->input('content'); // ← 「$post->content」はPostモデルとつながるPostsテーブル（データベース）のcontentカラムに投稿一覧のテキストボックスに書いたメッセージを代入
      $post->save(); // ← postsテーブルに↑で取得・代入したデータを保存する必要があるらしい

      return redirect()->route('posts.index')->with('flash_message', '投稿が完了しました。');
      /*redirect()ヘルパー = Laravelでリダイレクトさせるためのヘルパー。リダイレクト先の指定方法は複数
      ある（教材に詳細）が、route()メソッドを使う方法が見やすくURLの変更にも影響を受けないのでおすすめ。
      route()メソッド＝名前付きルートを指定するメソッド 「return redirect()->route('ルート名');」って記述。
      with()メソッド=フラッシュメッセージ（「投稿が完了しました」処理結果をユーザーに伝えるメッセ）を表示させるメソッド
      　　　　　　　  第1引数にキー、第2引数に値を指定することで、セッション(データ保存機能）にそのデータを保存できる。
                     セッションに保存されたデータはsession()ヘルパーを使えば取得でき、別ファイル（ビュー）で呼び出すように表示できる。
                     例えばビュー内で{{ session('flash_message') }}と記述し、flash_messageというキーの値を表示できる。
      */     
   }
}
   