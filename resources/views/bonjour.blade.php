@extends('vue_principale')

@section('contenu')

    {{-- blade fournit un raccourci pour afficher une variable dans la vue {{ }} --}}
    <h1>Bonjour {{ $name_view }}</h1>
    
@endsection

