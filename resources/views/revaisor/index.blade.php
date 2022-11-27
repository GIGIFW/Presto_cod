<x-layout>
    <div class="container-fluid formCreate mt-0">
        <div class="row text-center justify-content-center RowRevaisor">
            <div class="col-12 col-md-8">
                {{-- se ci sono annunci primo titolo altrimenti secondo --}}
                {{$articles_unchecked ? 'Tutti gli articoli da revisionare' : 'Non ci sono articoli da revisionare'}}
            </div>
        </div>
    </div>
    {{-- messaggi di sessione flash --}}

        {{-- messaggio accetta --}}
            @if(session('accept'))
                <div class="alert alert-success">
                    {{session('accept')}}
                </div>
            @endif
        {{-- end messaggio accetta --}}

        {{-- messaggio rifiuta --}}
            @if(session('reject'))
                <div class="alert alert-success">
                    {{session('reject')}}
                </div>
            @endif
        {{-- end messaggio rifiuta --}}
        
    {{-- end messaggi di sessione flash --}}

    {{-- se ci sono gli annunci --}}
        @if($articles_unchecked)
            @livewire('articles-unchecked-card')
        @endif
    {{-- end --}}

    {{-- gli annunci revisionati dal revisore loggato --}}
        <div class="container-fluid mt-5">
            <div class="row text-center justify-content-center RowRevaisor">
                <div class="col-12 col-md-8">
                    {{-- se ci sono annunci primo titolo altrimenti secondo --}}
                    {{$articles_checked ? 'Tutti gli articoli revisionati da te' : 'Non ci sono articoli revisionati da te'}}
                </div>
            </div>
        </div>
        {{-- se ci sono gli annunci --}}
            @if($articles_checked)
                @livewire('articles-checked-card')
            @endif
        {{-- end --}}
    {{-- end gli annunci revisionati dal revisore loggato --}}

</x-layout>