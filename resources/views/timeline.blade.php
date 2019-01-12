@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Vamos compartilhar inspirações :D
          </div>
          <div class="card-body">
          <form method="POST" action="{{ route('quotes.store') }}">
            @csrf
            <div class="form-group">
              <textarea name="content" id="content" class="w-100 form-control" rows="6" placeholder="Mensagem">
              </textarea>
            </div>
            <div class="form-group">
              <input type="text" name="author" placeholder="Autor" class="w-100 form-control">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary float-right">
                Salvar
              </button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection