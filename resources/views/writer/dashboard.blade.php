<x-layout>
    <div class="container-fluid p-5 text-center" 
         style="background-image: url('/storage/images/immagine.jpeg'); 
                background-size: cover; 
                background-position: center;">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-4 display-md-2 display-lg-1" 
                    style="font-family: 'Courier New', monospace; color: #ffffff; 
                           text-shadow: 0 0 10px rgb(0, 174, 162), 0 0 20px #0ff; text-align: center;">
                  Bentornato, Redattore {{ Auth::user()->name }}
                </h1>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli in attesa di revisione</h2>
                <x-writer-articles-table :articles="$unrevisionedArticles" />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli pubblicati</h2>
                <x-writer-articles-table :articles="$acceptedArticles" />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli respinti</h2>
                <x-writer-articles-table :articles="$rejectedArticles" />
            </div>
        </div>
    </div>
</x-layout>
