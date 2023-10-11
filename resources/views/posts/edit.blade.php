<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>投稿編集</title>   
     
     @vite(['resources/js/app.js'])
 </head>
 
 <body style="padding: 60px 0;">
     <header>
        <nav class="navbar navbar-light bg-light fixed-top" style="height: 60px;">
            <div class="container">                
                <a href="{{ route('posts.index') }}" class="navbar-brand">投稿アプリ</a>         
             </div>
         </nav>
     </header>
 
     <main>
         <article>
            <div class="container">                
                <h1 class="fs-2 my-3">投稿編集</h1>  
                    @if ($errors->any())   <!--　←　エラーメッセージの表示機能 -->
                        <div class="alert alert-danger">
                           <ul>
                               @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                       </div>
                   @endif
                                 
                 <div class="mb-2">
                    <a href="{{ route('posts.index') }}" class="text-decoration-none">&lt; 戻る</a>                                  
                 </div>
                 
                 <!-- ↓ formタグのaction属性にはupdateアクションへのルートを指定し、
                 更新するPostモデルのインスタンス（$post）を渡す -->
                 <form action="{{ route('posts.update', $post) }}" method="post">
                     @csrf
                     @method('patch') 
                     <!-- ↑ HTMLのフォームはGETとPOST以外のHTTPリクエストメソッドをサポートしていないため、 
                            formタグ内にatマークmethod('patch')と書き、GETとPOST以外のHTTPリクエストメソッドが使用可能にする -->
                     <div class="form-group mb-3">
                         <label for="title">タイトル</label>
                         <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
                     </div>
                            <!-- ↑ ↓ old()ヘルパー=引数にフォームのname属性の値を指定することで、そのフォームの直前の入力値を
                            取得直前の入力値が存在しない場合はNULLを返すので、エラー時以外は通常どおり初期値は空欄になるらしい。
                            しかし、 投稿編集ページは、すでに初期値が設定されているので、第2引数に「直前の入力値が存在しない場
                            合の初期値」、つまり「エラー時以外の通常の初期値」を指定することで、NULLの代わりに第2引数の値を返し
                            てくれる。。。ということらしい（意味不明）。-->
                     <div class="form-group mb-3">
                         <label for="content">本文</label>
                         <textarea class="form-control" name="content">{{ old('content', $post->content) }}</textarea> 
                     </div>
                     <button type="submit" class="btn btn-outline-primary">更新</button>
                 </form>
             </div>
         </article>
     </main>
 
     <footer class="d-flex justify-content-center align-items-center bg-light fixed-bottom" style="height: 60px;">
        <p class="text-muted small mb-0">&copy; 投稿アプリ All rights reserved.</p>
     </footer>
 </body>
 
 </html>
