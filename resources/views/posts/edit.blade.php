<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>投稿編集</title>    
 </head>
 
 <body>
     <header>
         <nav>
             <div>                
                 <a href="{{ route('posts.index') }}">投稿アプリ</a>          
             </div>
         </nav>
     </header>
 
     <main>
         <article>
             <div>                
                 <h1>投稿編集</h1>   
                    @if ($errors->any())   <!--　←　エラーメッセージの表示機能 -->
                       <div>
                           <ul>
                               @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                       </div>
                   @endif
                                 
                 <div>
                     <a href="{{ route('posts.index') }}">&lt; 戻る</a>                                  
                 </div>
                 
                 <!-- ↓ formタグのaction属性にはupdateアクションへのルートを指定し、
                 更新するPostモデルのインスタンス（$post）を渡す -->
                 <form action="{{ route('posts.update', $post) }}" method="post">
                     @csrf
                     @method('patch') 
                     <!-- ↑ HTMLのフォームはGETとPOST以外のHTTPリクエストメソッドをサポートしていないため、 
                            formタグ内にatマークmethod('patch')と書き、GETとPOST以外のHTTPリクエストメソッドが使用可能にする -->
                     <div>
                         <label for="title">タイトル</label>
                         <input type="text" name="title" value="{{ old('title', $post->title) }}">
                     </div>
                            <!-- ↑ ↓ old()ヘルパー=引数にフォームのname属性の値を指定することで、そのフォームの直前の入力値を
                            取得直前の入力値が存在しない場合はNULLを返すので、エラー時以外は通常どおり初期値は空欄になるらしい。
                            しかし、 投稿編集ページは、すでに初期値が設定されているので、第2引数に「直前の入力値が存在しない場
                            合の初期値」、つまり「エラー時以外の通常の初期値」を指定することで、NULLの代わりに第2引数の値を返し
                            てくれる。。。ということらしい（意味不明）。-->
                     <div>
                         <label for="content">本文</label>
                         <textarea name="content">{{ old('content', $post->content) }}</textarea>
                     </div>
                     <button type="submit">更新</button>
                 </form>
             </div>
         </article>
     </main>
 
     <footer>        
         <p>&copy; 投稿アプリ All rights reserved.</p>
     </footer>
 </body>
 
 </html>
