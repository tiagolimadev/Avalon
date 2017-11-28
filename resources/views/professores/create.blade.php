@extends('layouts.app')

@section('content')

@if(count($errors) > 0)
    <div class="callout callout-danger">
      <p> Os seguintes campos foram preenchidos incorretamente:</p>
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  	</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              @if(Auth::user()->first_login == 0)
                <div class="panel-heading">Primeiro Login</div>
              @else
                <div class="panel-heading">Cadastrar Professor</div>
              @endif

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('registerFirstLogin') }}">
                        {{ csrf_field() }}

                        @include('professores._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection