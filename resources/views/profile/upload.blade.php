@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プロフィール画像アップロード</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.upload') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="custom-file @error('image') is-invalid @enderror">
                                <input type="file" name="image" id="image" class="form-control custom-file-input">
                                <label for="image" class="custom-file-label" data-browse="参照">ファイルを選択</label>
                            </div>
                            <div class="input-group-append">
                                <button id="image-reset" type="button" class="btn btn-outline-secondary reset">取消</button>
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">登録</button>
                            </div>
                        </div>
    
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection