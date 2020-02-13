@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User profile</div>

                <div class="card-body">
                    <div class="container">
                            <img src="{{ str_replace('public','/storage',$userinfo->image) }}" alt="none" height="200" class=' container col-md-4 d-block mx-auto'>
                    </div>

                    <div class='container mx-auto text-center'>

                    <p>名前：{{$userinfo->name}}</p>
                    <p>生年月日：{{$userinfo->birthday}}</p>
                    <p>性別：{{$userinfo->sex}}</p>
                    <p>自己紹介：{{$userinfo->detail}}</p>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
