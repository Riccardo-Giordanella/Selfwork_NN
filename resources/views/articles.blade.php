<x-layout>

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <header class="container-fluid vh-100 header-custom d-flex align-items-center justify-content-center">
        <h6 class="title-pages">Gli articoli del sito</h6>
    </header>

    <section class="container">
        <div class="row cardrow">
            @foreach($articles as $article)
            <div class="col-4 d-flex flex-wrap">
                <x-card :article="$article"/>
            </div>
            @endforeach
        </div>
    </section>
</x-layout>