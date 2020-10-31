@extends('vue_principale')

@section('contenu')

<h1>Les utilisateurs</h1>

<ul>
    @foreach ($users as $user)
    
<li>{{ $user->email }}, {{ $user->mot_de_passe}}</li>

    @endforeach
</ul>
    
@endsection