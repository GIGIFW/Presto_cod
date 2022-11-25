<x-layout>

    <div class="container">
        <div class="row justify-content-center">
            {{-- carosello --}}
            <div class="col-12 col-md-5">

                <div id="carouselExampleControls" class="carouselPosition carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="https://picsum.photos/300/200" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/300/200" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/300/200" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>

            </div>
            {{-- descrizione --}}
            <div class="col-12 col-md-4">
                <div class="description ">
                    <h1>descrizione</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi incidunt deserunt autem et! Nemo quos eum ab modi quidem quasi magni explicabo possimus ipsum, enim cumque quisquam fugiat laboriosam unde!</p>
                </div>
            </div>
            {{-- form cerca --}}
            <div class="col-12 col-md-3">
                <div class="shadow-lg SearchBar d-flex flex-column-reverse">
                    <form class="my-3" role="search">
                        @csrf
                        <label for="search">Cosa cerchi?</label>
                        <input class="form-control me-2 d-inline my-2" name="search" type="search"
                            placeholder="Macchina vintage, monete antiche..." aria-label="Search">
                            <label for="category" class="form-label">In quale categoria?</label>
                    <select wire:model.defer="category" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        <option value="{{ $category->id }}">{{ $category->all }}</option>
                    </select>
                        <label for="place">Dove?</label>
                        <input class="form-control me-2 my-2" name="place" type="search" placeholder="Luogo" aria-label="Search">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="container BoxWelcomeCards">
        <div class="row justify-content-center">
            @foreach ($lastArticles as $lastArticle)
                <div class="col-12 col-md-4">
                    <div class="card OurCards">
                        <img src="{{ Storage::url($lastArticle->cover) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lastArticle->title }}</h5>
                            <p class="card-text">{{ $lastArticle->description }}</p>
                            <p class="card-text">{{ $lastArticle->created_at }}</p>
                            <p class="card-text">Prezzo: {{ $lastArticle->price }}</p>
                            <a href="#" class="btn btn-primary">Scopri di più</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <x-footer />
</x-layout>
