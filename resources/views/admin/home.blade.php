@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class='text-center'>
                        {{ __('You are logged as ' . Auth::user()->name . ' [administrator].') }}
                        <br>
                        {{ __('You have been granted access to the admin settings.') }}
                    </div>

                    <br>

                    All'interno del blog per ora ci sono:
                    <ul>
                        <li>
                            Posts: {{ $statistics["posts"] }}
                        </li>
                        <li>
                            Categorie: {{ $statistics["categories"] }}
                        </li>
                    </ul>

                    <ul>
                        <li>Name: {{ $user->name }}</li>
                        <li>Email: {{ Auth::user()->email }}</li>

                        <li>Address: {{ $userDetails->address }}</li>
                        {{-- "userDetails" => $request->user()->detail,  at HomeController.php --}}

                        <li>Città: {{ Auth::user()->detail->city }}</li>
                        <li>Provincia: {{ Auth::user()->detail->province }}</li>
                        <li>CAP: {{ Auth::user()->detail->zip }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
