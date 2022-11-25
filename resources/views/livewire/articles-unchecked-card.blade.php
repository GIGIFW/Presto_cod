    <div class="container">
        <div class="row justify-content-center">
            @foreach ($articles_unchecked as $article_unchecked)
                <div class="col-12 col-md-4">
                    {{-- Card --}}
                    <div class="card my-5 OurCards">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{Storage::url($article_unchecked->cover)}}" class="img-fluid" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$article_unchecked->title}}</h5>
                            <p class="card-text">Descrizione card creata . . . . .</p>
                            <a href="{{route('article.unchecked', compact('article_unchecked'))}}" class="btn btn-primary">Revisiona articolo</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>