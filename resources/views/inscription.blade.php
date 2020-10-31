@extends('vue_principale')

@section('contenu')

<form action="/inscription" method="POST" class="form">
    {{-- csrf est un type d'attaque répandu --}}
    {{-- laravel protege en ajoutant cette ligne, via une champ caché contenant une chaine de caractère aléatoire --}}
    {{ csrf_field() }}
    <div class="field">
        <label class="label">Adresse e-mail</label>
        <div class="control">
            {{-- a fonction old() permet de récupérer la valeur précédemment envoyée. --}}
            <input class="input" type="email" name="email" value="{{ old('email') }}">
        </div>
    </div>
    <div class="field">
        <label class="label">Mot de passe</label>
        <div class="control">
            <input class="input" type="password" name="password">
        </div>
        {{-- La fonction has() permet de vérifier si le champ password contient une erreur --}}
        @if($errors->has('password'))
            <p class="help is-danger">{{ $errors->first('password') }}</p>
        @endif
    </div>
    
    <div class="field">
        <label class="label">Mot de passe (confirmation)</label>
        <div class="control">
            <input class="input" type="password" name="password_confirmation">
        </div>
        @if($errors->has('password_confirmation'))
            <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
        @endif
    </div>
    <div class="field">
        <div class="control">
            <button class="button is-link" type="submit">M'inscrire</button>
        </div>
    </div>
</form>
    
@endsection