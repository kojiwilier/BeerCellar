@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My profile</div>

                <div class="card-body">

                <form method="POST" action="{{ route('profile.regist') }}"　enctype="multipart/form-data">
                    @csrf

                    <div class='row'>
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                            <img src="{{ str_replace('public','storage',$myinfo->image) }}" alt="none" height="200" class='d-block mx-auto'>
                    </div>
                    </div>

                    <div class="form-group row">
                            <div class=col-md-4></div>
                            <div class="col-md-6 text-center">
                                <label for="image">
                                編集
                              <input  id='image' type="file" name="image" 　style='display:none;'  >
                            </label>
                            </div>
                    </div>


                    <div class='form-group row'>
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Name')}}</label>

                                <div class="col-md-6">
                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{ $myinfo->name }}" required autocomplete="name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                    <div class='form-group row'>
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{__('Birth Day')}}</label>

                                <div class="col-md-6">
                                    <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday"  value="{{ $myinfo->birthday }}" required autocomplete="birthday">

                                    @error('birthday')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                    </div>

                    <div class='form-group row'>
                            <label for="sex" class="col-md-4 col-form-label text-md-right">{{__('Sex')}}</label>

                                <div class="col-md-6">
                                    <select id="sex"　class="form-control"  name="sex"  value="{{ $myinfo->sex }}" required autocomplete="sex">
                                        <option value="{{ $myinfo->sex }}" selected >{{ $myinfo->sex }}</option>
                                        <option value="male">male</option>
                                        <option value="female">female
                                        </option>
                                    </select>
                                </div>
                    </div>


                    <div class='form-group row'>
                            <label for="detail" class="col-md-4 col-form-label text-md-right">{{__('Detail')}}</label>

                                <div class="col-md-6">
                                    <textarea id="detail" type="detail" class="form-control @error('detail') is-invalid @enderror" name="detail"   required autocomplete="detail">{{ $myinfo->detail }}</textarea>

                                    @error('detail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
