@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('beers.done',['id'=>$beer->id]) }}"　enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{ old('name',$beer->name) }}" required autocomplete="name">


                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                    <input id="category" type="category" class="form-control @error('category') is-invalid @enderror" name="category" list='categories' value="{{ old('category',$beer->category) }}" required autocomplete="category">
                                    <datalist id='categories'>
                                        @foreach ($categories as $key=>$category)
                                        <option value="{{$category->category}}"></option>
                                            @endforeach
                                    </datalist>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brewary" class="col-md-4 col-form-label text-md-right">{{ __('Brewary') }}</label>

                            <div class="col-md-6">
                                <input id="brewary" type="brewary" class="form-control @error('brewary') is-invalid @enderror" name="brewary" list='brewaries' value="{{ old('brewary',$beer->brewary) }}" required autocomplete="brewary">
                                <datalist id='brewaries'>
                                        @foreach ($brewaries as $key=>$brewary)
                                        <option value="{{$brewary->brewary}}"></option>
                                            @endforeach
                                    </datalist>
                                @error('brewary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>

                            <div class="col-md-6">
                                <input id="comment" type="comment" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment',$beer->comment) }}" required autocomplete="comment">

                                @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="price" class="form-control" name="price"  value="{{ old('price',$beer->price) }}"required autocomplete="Price">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                         <div class="form-group row">
                             <label for="pic1" class="col-md-4 col-form-label text-md-right">{{ __('Image 1') }}</label>
                             <div class="col-md-6">
                               <input type="file" name="pic1" value="{{ old('pic1',$beer->pic1) }}"  >
                             </div>
                             <div class='col-md-4'></div>
                            <div class='col-md-6'>
                                    <img class="preview1" src="none" alt  style="height: 200px;" />
                            </div>

                         </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
