

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                @foreach ($articles as $article)
                <h1>{{$article->title}} <small>{{$article->getPosterUsername->name}}</small>, {{$article->getPapername->name}}</h1>
                <p>{{$article->body}}</p>
                @endforeach
        </div>
    </div>
</div>

