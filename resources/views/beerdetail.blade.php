@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ビール詳細</div>

                <div class="card-body row ">
                    <div class='col-md-4 justify-content-center border'>
                        <div class='card-img-top mt-1'>
                            <img src="{{ str_replace('public','/storage',$beer->pic1) }}" alt="none" height="200" class='d-block mx-auto'>
                    </div>
                    </div>
                    <div class='col-md-4 justify-content-center'>
                        <p>{{ $beer->name }}</p>
                        <p>{{ $beer->brewary }}</p>
                        <p>{{ $beer->category }}</p>
                        <p>{{ $beer->comment }}</p>
                        <p>{{ $beer->price }}円</p>

                        <a href="/beers/edit/{{ $beer->id }}" class='btn blue-gradient'>編集</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
