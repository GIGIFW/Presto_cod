<x-layout>

    <div class="container">
        <div class="row justify-content-center">
                @forelse ($articles_searched as $article)
                    <div class="col-12 col-md-4">
                        <div class="card my-5 OurCards">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="{{Storage::url($article->cover)}}" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$article->title}}</h5>
                                <p class="card-text">Descrizione card creata . . . . .</p>
                                <a href="#!" class="btn btn-primary">Scopri di più</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-danger">
                            <p>Non ci sono annunci relativi alla tua ricerca</p>
                        </div>
                    </div>
                @endforelse
        </div>
    </div>
    
    <x-footer />
</x-layout>