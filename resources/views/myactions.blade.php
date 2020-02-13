@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Activities</div>

                <div class="card-body row  justify-content-center">

                        @foreach($myActions as $myAction)
                        <div  class='col-md-4'>
                        <div class='row justify-content-center border'>
                                <div>
                                    {{ $myAction->created_at}}
                                </div>
                                <a href="/beer/{{ $myAction->beer->id }}">
                                <img src="{{ str_replace('public','/storage',$myAction->beer->pic1) }}" alt="none" height="200" class='d-block mx-auto'>
                                </a>
                            <p>{{ $myAction->beer->name }}</p>
                        </div>
                        </div>
                        @endforeach




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
