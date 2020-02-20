@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card">
                        <div class="card-header">ビール一覧</div>

                        <div class="card-body  row ">
                            @foreach($mybeers as $mybeer)
                            <div class='col-md-4 mb-4 '>
                            <div class=' card  justify-content-center'>

                                <a href="/beer/{{ $mybeer->beer->id }}">
                                <img src="{{ str_replace('public','/storage',$mybeer->beer->pic1) }}" alt="none" height="200" class='d-block mx-auto'>
                                </a>
                                <p class='mt-1 text-center'>{{ $mybeer->beer->name }}</p>
                                <p class='text-center'>{{ $mybeer->amount }}本</p>
                                  <div class='row justify-content-center'>
                                  <form action="{{ route('beers.add',['id'=>$mybeer->beer->id])}}" method="POST">
                                        @csrf
                                      <button class='btn blue-gradient'　type='submit'>追加！</button>
                                  </form>
                                <form action="{{ route('myactions.add',['id'=>$mybeer->beer->id]) }}" method='POST'>
                                    @csrf
                                      <button class='btn blue-gradient' type='submit'>Drink!</button>
                                  </form>
                                  </div>
                            </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection
