<x-layout>
    <!-- Sezione per il messaggio di sessione -->
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Sezione di benvenuto -->
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">Bentornato, Amministratore {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>

    <!-- Sezione delle richieste per il ruolo di amministratore -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per il ruolo di amministratore</h2>
                <x-requests-table :roleRequests="$adminRequests" role="amministratore"/>
            </div>
        </div>
    </div>

    <!-- Sezione delle richieste per il ruolo di revisore -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per il ruolo di revisore</h2>
                <x-requests-table :roleRequests="$revisorRequests" role="revisore"/>
            </div>
        </div>
    </div>

    <!-- Sezione delle richieste per il ruolo di redattore -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per il ruolo di redattore</h2>
                <x-requests-table :roleRequests="$writerRequests" role="redattore"/>
            </div>
        </div>
    </div>

    <!-- Sezione per tutti i tags -->
    <hr>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Tutti i tags</h2>
                <x-metainfo-table :metaInfos="$tags" metaType="tags"/>
            </div>
        </div>
    </div>

    <!-- Sezione per tutte le categorie -->
    <hr>
    <div class="container my-5">
        <div class="row justify-content-between">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h2>Tutte le categorie</h2>
                    <form action="{{ route('admin.storeCategory') }}" method="POST" class="w-50 d-flex m-3">
                        @csrf
                        <input type="text" name="name" class="form-control me-2" placeholder="Inserisci una nuova categoria">
                        <button type="submit" class="btn btn-outline-secondary">Inserisci</button>
                    </form>
                </div>
                <x-metainfo-table :metaInfos="$categories" metaType="categorie" />
            </div>
        </div>
    </div>
</x-layout>
