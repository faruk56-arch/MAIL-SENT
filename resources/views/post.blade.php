<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Post</title>
</head>

<body>
    <div>
        @foreach($posts as $post)
        <!--Pacourir le tableau  d'un table -->
        <h1 class="post-title" value="{{$post->title}}">{{$post->title}}</h1> <!-- to get just single element -->
        <h2 id="post" class="post-description" value="{{$post->description}}">{{$post->description}}</h2> <!-- to get just single element -->
        <a href="{{ route('blog-post', $post->id) }}">Voir ce post</a>
        @endforeach
    </div>

</body>

</html>