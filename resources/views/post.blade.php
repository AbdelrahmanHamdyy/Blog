<!DOCTYPE html>

<title>My Blog</title>
<link rel="stylesheet" href="/app.css">

<body>
    <article>
        <h1><?= $post->title; ?></h1>

        <div>
            <!-- Because this is html we use this-->
            {!! $post->body !!}
        </div>
    </article>

    <a href='/'>Go Back</a>
</body>



