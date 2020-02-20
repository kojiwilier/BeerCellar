@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Activities</div>

                <div class="card-body row">

                        @foreach($myActions as $myAction)
                        <div  class='col-md-4 mb-4'>
                        <div class='justify-content-center card' style='height:300px'>
                                <p class='mb-0 lead'>{{ $myAction->created_at}}</p>
                                <a href="/beer/{{ $myAction->beer->id }}">
                                <img src="{{ str_replace('public','/storage',$myAction->beer->pic1) }}" alt="none" height="200" class='d-block mx-auto'>
                                </a>
                            <p>{{ $myAction->beer->name }} を<br>飲みました！！</p>
                        </div>
                        </div>
                        @endforeach




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
