<x-layout>
    <article>
        <h1>{!! $post->title; !!}</h1>

        <div>
            <!-- Because this is html we use this-->
            {!! $post->body !!}
        </div>
    </article>

    <a href='/'>Go Back</a>
</x-layout>



