<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('style.css') }}" rel="stylesheet">



    <title>Comment</title>
</head>

<body>
    <div class="comment-title">{{ $post->title }}</div> <!-- Afficher les elements de postControllor simplement -->
    <!-- <div class="comment-title">{{ $post->title ?? null }}</div>  Afficher les elements de post simplement -->
    <br><br>
    <div class="comment-post">{{ $post->description }}</div>
    <br><br><br>


    <form id="comment-post" name="comment-post" method="post" action=" {{ route('blog-post', $post->id) }}">
        

        @csrf
        <label>name</label>
        <input id="name" type="text" name="name">
        <label>prenom</label>
        <input id="prenom" type="text" name="prenom">
        <label>comment</label>
        <input id="comment" type="text" name="comment" placeholder="Comment">

        @if (Auth::check() && Auth::user())
            <button id="submit" type="submit" name="submit" value="Submit">Add Comment</button>
        @elseif(Auth::guest())
            <a class="comment-lien" href="{{ route('login') }}">Add Comment</a>
            <!-- Redirection vers la page de login -->
        @endif
    </form>

    <br><br>
    @foreach ($comments as $comment)
        <!-- Afficher les  comments de PostPageController -->
        <div>{{ $comment->name }}</div>
        <div>{{ $comment->prenom }}</div>
        <div>{{ $comment->comment }}</div>
        <div>{{ $comment->updated_at }}</div>
        <br>
    @endforeach



</body>

</html>
