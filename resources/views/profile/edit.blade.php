@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プロフィール編集</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
    
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">誕生日</label>

                            <div class="col-md-6">
                                <input type="date" id="birthday" name="birthday" class="form-control  @error('birthday') is-invalid @enderror" value="{{ old('birthday', $user->birthday->format('Y-m-d')) }}" required>

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="perf" class="col-md-4 col-form-label text-md-right">住まい</label>

                            <div class="col-md-6">
                                <select name="perf" id="perf" class="form-control @error('perf') is-invalid @enderror" required>
                                    @foreach (config('perf') as $index => $name)
                                        <option value="{{ $index }}" @if((int)old('perf', $user->perf) === (int)$index) selected @endif>{{ $name }}</option>    
                                    @endforeach
                                </select>                                

                                @error('perf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">自己紹介</label>
 
                            <div class="col-md-6">
                                <textarea name="comment" id="comment" cols="30" rows="5" class="form-control @error('comment') is-invalid @enderror">{{ old('comment',$user->comment) }}</textarea>

                                @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">更新</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection