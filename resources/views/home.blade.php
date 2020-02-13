@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class='col-md-3'>
            <div class="card">
                <div class="card-header">User profile</div>

                <div class="card-body">
                    <div class="container">
                            <img src="{{ str_replace('public','/storage',$user->image) }}" alt="none" height="200" class=' d-block mx-auto'>
                    </div>

                    <div class='container mx-auto text-center'>
                    <p>名前：{{$user->name}}</p>
                    <p>生年月日：{{$user->birthday}}</p>
                    <p>性別：{{$user->sex}}</p>
                    <p>自己紹介：{{$user->detail}}</p>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body row ">
                            @foreach($mybeers as $mybeer)
                            <div class='col-md-6 justify-content-center border'>
                                <div class="border">
                                <a href="/beer/{{ $mybeer->beer->id }}">
                                <img src="{{ str_replace('public','storage',$mybeer->beer->pic1) }}" alt="none" height="200" class='d-block mx-auto'>
                                </a>
                            </div>
                                <p>{{ $mybeer->beer->name }}</p>
                                <p>{{ $mybeer->amount }}本</p>
                            </div>
                            @endforeach

                        </div>

                </div>
            </div>
        </div>

        <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
