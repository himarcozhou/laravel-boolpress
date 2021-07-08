@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center">
        <h1>Modifica utente {{ $user->id }}</h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
            <line x1="20" y1="12" x2="4" y2="12"></line>
            <polyline points="10 18 4 12 10 6"></polyline>
          </svg> Tutti i users
        </a>
      </div>
      <div>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>


      <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
          <label>Nome</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Inserisci il nome" value="{{ old('name', $user->name) }}" required>
          @error('name')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control @error('conemailtent') is-invalid @enderror" placeholder="Inizia l'email..." value="{{ old('email', $user->email) }}">
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- categoria del user --}}
        <div class="form-group">
          <label>Ruolo</label>
          <select name="roles[]" multiple height="5" class="form-control  @error('roles') is-invalid @enderror">
            <option value="">-- seleziona ruolo --</option>
            @foreach ($roles as $role)
            <option value="{{ $role->id }}" {{ $user->roles->contains($role) ? "selected" : '' }}>
              {{ $role->name }}
            </option>
            @endforeach
          </select>
          @error('roles')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
              <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
              <polyline points="17 21 17 13 7 13 7 21"></polyline>
              <polyline points="7 3 7 8 15 8"></polyline>
            </svg> Salva user
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
