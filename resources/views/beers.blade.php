@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ビール一覧</div>

                <div class="card-body row ">
                    @foreach($beers as $beer)
                    <div class=' card col-md-4 justify-content-center border'>
                        <div class="border">
                        <a href="/beer/{{ $beer->id }}">
                            <img src="{{ str_replace('public','storage',$beer->pic1) }}" alt="none" height="200" class='d-block mx-auto'>
                        </a>
                        </div>
                        <p>{{ $beer->name }}</p>
                        <p>{{ $beer->price }}円</p>

                        <button  class='btn blue-gradient buy'  data-beer-id={{$beer->id}} >my beer！</button>

                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
