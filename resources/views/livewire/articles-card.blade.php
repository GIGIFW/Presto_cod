
    <div class="container">
        <div class="row justify-content-center">
            @foreach($articles as $article)
            <div class="col-12 col-md-4">
                {{-- Card --}}
                <div class="card my-5 OurCards">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="https://picsum.photos/200/135" class="img-fluid CardImg" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->description }}</p>
                            <p class="card-text">{{ $article->created_at }}</p>
                            <p class="card-text">Prezzo: {{ $article->price }}</p>
                        <a href="#!" class="btn btn-primary">Scopri di più</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

