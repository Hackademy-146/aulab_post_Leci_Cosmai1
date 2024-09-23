<x-layout>
    <div class="container-fluid p-5 text-center text-white" style="background-image: url('{{ asset('/storage/images/immagine.jpeg') }}'); background-size: cover; background-position: center; width: 100%; padding: 50px 0;">
        <div class="row justify-content-center">
            <div class="header">
                
                <h1 style="font-family: 'Courier New', monospace; font-size: 8vw; color: #ffffff; text-shadow: 0 0 10px rgb(0, 174, 162), 0 0 20px #0ff; text-align: center;">The Aulab Post</h1>
                <h3 style="font-family: 'Courier New', monospace; font-size: 3vw; color: #ffffff; text-shadow: 0 0 10px rgb(0, 174, 162), 0 0 20px #0ff;">La tua finestra sul mondo</h3>
            </div>

            @if (session('message'))
                <div class="alert alert-success mt-4" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            @if (session('alert'))
                <div class="alert alert-danger mt-4" role="alert">
                    {{ session('alert') }}
                </div>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-lg article-card" style="border-radius: 15px; overflow: hidden;">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="Article image" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->excerpt }}</p>
                            <a href="{{ route('article.show', $article) }}" class="btn btn-primary" style="border-radius: 20px;">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        /* Media Queries per rendere il testo responsive su altri dispositivi */
        @media (max-width: 768px) {
            h1 {
                font-size: 6vw; /* Dimensioni del titolo su tablet */
            }
            h3 {
                font-size: 2.5vw; /* Dimensioni del sottotitolo su tablet */
            }
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 5vw; /* Dimensioni per schermi molto piccoli */
            }
            h3 {
                font-size: 2vw;
            }
        }
    </style>

    <script>
        document.getElementById('search').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const articles = document.querySelectorAll('.article-card');

            articles.forEach(function(card) {
                const title = card.querySelector('.card-title').innerText.toLowerCase();
                if (title.includes(searchValue)) {
                    card.parentElement.style.display = 'block';
                } else {
                    card.parentElement.style.display = 'none';
                }
            });
        });

        document.querySelectorAll('.article-card').forEach(function(card) {
            card.addEventListener('mouseenter', function() {
                card.classList.add('shadow-lg');
                card.style.transform = 'scale(1.03)';
            });
            card.addEventListener('mouseleave', function() {
                card.classList.remove('shadow-lg');
                card.style.transform = 'scale(1)';
            });
        });
    </script>
</x-layout>
