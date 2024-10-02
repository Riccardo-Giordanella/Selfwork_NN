<x-layout>

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <section class="container storeform mt-4 p-3 rounded">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{route('articles.update', compact('article')) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Nuovo titolo dell'articolo</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Titolo" value="{{$article->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Nuovo corpo dell'articolo</label>
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Descrizione dettagliata dell'articolo">{{$article->body}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="checkwrapper" class="form-label">Tags</label>
                        <div class="form-control bg-dark">
                            @foreach ($tags as $tag)
                            <div class="btn-group my-1 mx-1" role="group" aria-label="Basic checkbox toggle button group" id="checkwrapper">
                                <input type="checkbox" class="btn-check" id="{{$tag->id}}" name="tags[]" value="{{$tag->id}}" @if($article->tags->contains($tag)) checked @endif>
                                <label class="btn btn-outline-info" for="{{$tag->id}}">{{$tag->name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Aggiorna l'articolo</button>
                </form>
            </div>
        </div>
    </section>

</x-layout>