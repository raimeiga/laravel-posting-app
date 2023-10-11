<!-- 親ビューのファイル。投稿一覧・新規投稿・投稿編集・投稿詳細ページの共通コードを書いてる。
これがあると、４つの画面（ビュー）の共通コードを一元的に管理できる。そして上記４つのビュー固有
の部分を子ファイル（index,show,create,edit.blade.php）に書いてる。-->

<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>@yield('title')</title>
 
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
                 <h1 class="fs-2 my-3">@yield('title')</h1>
                 @yield('content')
             </div>
         </article>
     </main>
 
     <footer class="d-flex justify-content-center align-items-center bg-light fixed-bottom" style="height: 60px;"> 
         <p class="text-muted small mb-0">&copy; 投稿アプリ All rights reserved.</p>
     </footer>
 </body>
 
 </html>
