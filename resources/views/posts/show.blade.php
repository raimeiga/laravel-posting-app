<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>投稿詳細</title>
 </head>
 
 <body>
     <header>
         <nav>
             <div>                
                 <a href="{{ route('posts.index') }}">投稿アプリ</a>    <!-- index = 投稿一覧ページ -->
             </div>
         </nav>
     </header>
 
     <main>
         <article>
             <div>                
                 <h1>投稿詳細</h1>  
 
                 <div>    
                     <a href="{{ route('posts.index') }}">&lt; 戻る</a>  <!-- index = 投稿一覧ページ -->                            
                 </div>
 
                 <div>
                     <div>
                         <h2>{{ $post->title }}</h2>
                         <p>{{ $post->content }}</p>
                         <div>                            
                             <a href="{{ route('posts.edit', $post) }}">編集</a>
                         </div>
                     </div>
                 </div>                 
             </div>
         </article>
     </main>
 
     <footer>        
         <p>&copy; 投稿アプリ All rights reserved.</p>
     </footer>
 </body>
 
 </html>
