<!-- このファイルはビュー画面・投稿一覧ページのファイル -->
<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>投稿一覧</title>

     @vite(['resources/js/app.js'])     
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
                 <h1>投稿一覧</h1>    
                        <!-- ↓ ディレクティブ（directive）= アットマークから始まるコード. 「命令」という意味
                       Laravelのビュー内ではアットマークifやアットマークforeachのように@をつけると、PHPやLaravelの処理を実行できる -->
                 @if (session('flash_message'))
                     <p>{{ session('flash_message') }}</p>
                 @endif
 
                 <div>
                     <a href="{{ route('posts.create') }}">新規投稿</a>                                   
                 </div> 
                 
                 <!-- ↓　PostController.phpファイルに書いた$posts = Post::latest()->get();に
                 より取得したpostsテーブルのtitleとcontentカラムの値を取得している -->
                 @foreach($posts as $post)
                     <div>
                         <div>
                             <h2>{{ $post->title }}</h2>
                             <p>{{ $post->content }}</p>    
                             
                             <div>
                                 <a href="{{ route('posts.show', $post) }}">詳細</a>
                                 <a href="{{ route('posts.edit', $post) }}">編集</a>  
                                 
                                 <form action="{{ route('posts.destroy', $post) }}" method="post">
                                     @csrf
                                     @method('delete')                                        
                                     <button type="submit">削除</button>
                                 </form>
                                 
                             </div> 
                         </div>
                     </div>
                 @endforeach  

             </div>
         </article>
     </main>
 
     <footer>        
         <p>&copy; 投稿アプリ All rights reserved.</p>
     </footer>
 </body>
 
 </html>