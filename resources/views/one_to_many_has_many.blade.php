

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <small>{{$user->address->country}}</small>
                @foreach ($user->articles as $article)
                <h1>{{$article->title}}</h1>
                <p>{{$article->body}}</p>
                @endforeach
        </div>
    </div>
</div>

