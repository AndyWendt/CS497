<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Posts</h1>

@foreach($posts as $post)
<div>
    <h2>Title: {{ $post->title }}</h2>
    <h3>Tags</h3>
    <ul>
        @foreach($post->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>

    <h3>Content</h3>
    <p>{{ $post->content }}</p>
</div>
@endforeach


</body>
</html>