@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Evandro pague a cuca :D
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('quotes.store') }}">
          @csrf
            <div class="form-group">
              <textarea name="content" required id="content" class="w-100 form-control" rows="6" placeholder="Mensagem">
              </textarea>
            </div>
            <div class="form-group">
              <input type="text" name="author" required placeholder="Autor" class="w-100 form-control">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary float-right">
                Salvar
              </button>
            </div>
          </form>
        </div>
        <div class="card-footer">
          <ul style="list-style:none">
            @foreach($quotes as $quote)
            <li style="margin-bottom:20px;">
              <div class="card-header">
                <div class="text-right">
                  <a href="{{route('quotes.edit', $quote->id)}}" class="btn btn-default">
                    Editar
                  </a>
                  <form method="POST" class="float-right" action="{{route('quotes.destroy', $quote->id)}}">
                  @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-alert" type="submit">Excluir</button>
                  </form>
                </div>
              </div>
              <div class="card-body">
                <h3>
                  {!! $quote->content !!}
                </h3>
                <p class="text-right">--- {{$quote->author}}</p>
              </div>
              <div class="card-footer">
                <span class="text-left">{{$quote->user->name}}</span>
                <form method="POST" class="float-right" action="{{route('likes.store')}}">
                  @csrf
                  <input type="hidden" value="{{$quote->id}}" name="quote_id">
                  <button class="btn btn-alert" type="submit">{{$quote->total_likes}} Likes</button>
                </form>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection