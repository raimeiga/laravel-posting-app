<!-- このファイルは、ビュー画面・新規投稿（作成）ページ -->
<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>新規投稿</title>    
 </head>
 
 <body>
     <header>
         <nav>
             <div>                
                 <a href="{{ route('posts.index') }}">投稿アプリ</a>    <!-- index = 投稿一覧ページ -->      
             </div> 
                        <!-- ↑ route()ヘルパー＝名前付きルートを呼び出すヘルパー
                        例）<a href="{{ route('posts.index') }}">投稿アプリ</a>のように書く
                        'posts.index'部分は、名前付きルートの名前の部分で、
                         posts/index.blade.phpというURLの、フォルダ名.blade.phpを省略した書き方 -->
         </nav>
     </header>
 
     <main>
         <article>
             <div>                
                 <h1>新規投稿</h1>   
                  @if ($errors->any())  <!--　←　エラーメッセージの表示機能 -->
                     <div>
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                  @endif
                 
                 <div>
                     <a href="{{ route('posts.index') }}">&lt; 戻る</a>   <!-- index = 投稿一覧ページ -->                               
                 </div>
 
                 <form action="{{ route('posts.store') }}" method="post"> 
                     <!-- ↓ CSRF=サイバー攻撃からアプリを保護するためのコード。
                            Laravelでフォームを作成するときは必ず@csrfを記述。
                            Laravelではformタグ内にcsrfと記述するだけでCSRF対策が可能 -->
                      @csrf 
                     <div>
                         <label for="title">タイトル</label>
                         <input type="text" name="title" value="{{ old('title') }}">
                     </div>
                     <!-- ↑ ↓ old()ヘルパー=引数にフォームのname属性の値を指定することで、そのフォームの直前の
                     　　　　 入力値を取得直前の入力値が存在しない場合はNULLを返すので、エラー時以外は通常どお
                              り初期値は空欄になる -->
                     <div>
                         <label for="content">本文</label>
                         <textarea name="content">{{ old('content') }}</textarea>
                     </div>
                     <button type="submit">投稿</button>
                 </form>
             </div>
         </article>
     </main>
 
     <footer>        
         <p>&copy; 投稿アプリ All rights reserved.</p>
     </footer>
 </body>
 
 </html>
