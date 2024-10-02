<x-layout>

    <a href="/articles/index" class="ms-4 mt-3"><<< Torna a tutti gli articoli</a>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 d-flex flex-column align-items-center">
                <h3 class="display-4 mb-4">{{$article->title}}</h3>
                <h4 class="mb-4">{{$article->body}}</h4>
            </div>
            <h3>Autore:</h3>
        </div>
    </div>

</x-layout>