@extends('vue_principale')

@section('contenu')

<form action="/inscription" method="POST">
    {{-- csrf est un type d'attaque répandu --}}
    {{-- laravel protege en ajoutant cette ligne, via une champ caché contenant une chaine de caractère aléatoire --}}
    {{ csrf_field() }}
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="password" name="password_confirmation" placeholder="Mot de passe (confirmation)">
    <input type="submit" value="M'inscrire">
</form>
    
@endsection