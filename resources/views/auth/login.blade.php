<x-layout>

    <section class="contaier">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <form class="mt-4 text-white bg-dark p-3 rounded" method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Indirizzo mail</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Accedi</button>
                </form>
            </div>
        </div>
    </section>

</x-layout>