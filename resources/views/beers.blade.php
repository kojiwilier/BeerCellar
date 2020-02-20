@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">ビール一覧
                    <a href='/beers/new'><p class='float-right mb-0'>ビールを追加する</p></a>
                </div>


                <div class="card-body row ">
                    @foreach($beers as $beer)
                    <div class='col-md-4 mb-4'>
                      <div class='card  justify-content-center'>
                        <div class="">
                        <a href="/beer/{{ $beer->id }}">
                            <img src="{{ str_replace('public','storage',$beer->pic1) }}" alt="none" height="200" class='d-block mx-auto'>
                        </a>
                        </div>
                        <p class='mt-1 text-center'>{{ $beer->name }}</p>
                        <p class='text-center'>{{ $beer->price }}円</p>

                        <button  class='btn blue-gradient buy'  data-beer-id={{$beer->id}} >my beer！</button>

                      </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
