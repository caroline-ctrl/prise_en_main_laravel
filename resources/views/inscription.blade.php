@extends('vue_principale')

@section('contenu')

<form action="/inscription" method="POST">
    {{-- csrf est un type d'attaque répandu --}}
    {{-- laravel protege en ajoutant cette ligne, via une champ caché contenant une chaine de caractère aléatoire --}}
    {{ csrf_field() }}
    {{-- a fonction old() permet de récupérer la valeur précédemment envoyée. --}}
<input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    <input type="password" name="password" placeholder="Mot de passe">
    {{-- La fonction has() permet de vérifier si le champ password contient une erreur --}}
    @if ($errors->has('password'))

        <p>{{ $errors->first('password') }}</p>
        
    @endif
    <input type="password" name="password_confirmation" placeholder="Mot de passe (confirmation)">
    @if ($errors->has('password'))

        <p>{{ $errors->first('password_confirmation') }}</p>
    
    @endif

    <input type="submit" value="M'inscrire">
</form>
    
@endsection