@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vamos compartilhar inspirações :D</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('quotes.update', $quote->id) }}" >
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group">
                            <textarea 
                                name="content"
                                id="content"
                                class="w-100 form-control"
                                rows="6"
                                placeholder="Mensagem"
                            >{{$quote->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" name="author" placeholder="Autor" class="w-100 form-control" value="{{$quote->author}}">
                        </div>
                        <div class="form-group float-right">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection