<div class="card m-4">
    <div class="card-body">
        <h5 class="card-title">{{$article->title}}</h5>
        <p class="card-text card-body">{{$article->body}}</p>
        <p class="card-text">Autore: {{$article->user->name}}</p> {{-- TRAVERSAL MODEL --}}
        @if($article->tags->isNotEmpty())
        <div class="mb-3">
            <p>Tag:
                @foreach ($article->tags as $tag)
                    <span class="badge text-bg-light mb-4">#{{$tag->name}}</span>
                @endforeach
            </p>
        </div>
        @else
        <div class="mb-3">
            <p>Tag: Nessun tag</p>
        </div>
        @endif
        <div class="buttonwrapper container my-auto">
            <a href="{{route('articles.detail', compact('article'))}}"><button type="button" class="btn btn-primary me-2">Dettaglio</button></a>
            <a href="{{route('articles.edit', compact('article'))}}"><button type="button" class="btn btn-warning me-2">Modifica</button></a>
            <form method="POST" action="{{route('articles.destroy', compact('article'))}}" ><button class="btn btn-danger me-2" type="submit">Elimina</button>
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</div>