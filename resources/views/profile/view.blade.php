@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プロフィール</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="profile">
                        <div class="image-wrap">
                            <img src="{{ route('media.download', ['path'=>$user->image]) }}"  class="image">
                        </div>
                        <div class="info-wrap">
                            <ul class="detail">
                                <li class="item">
                                    @if($user->sex === 'M')
                                        <span style="color: #4783D4;">♂</span>
                                    @else
                                        <span style="color: #f884a3;">♀</span>
                                    @endif
                                    {{ $user->name }}
                                </li>
                                <li class="item">{{ $user->age_name }}</li>
                                <li class="item">{{ $user->perf_name }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">自己紹介</div>
                <div class="card-body">
                    {!! nl2br(e($user->comment))  !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<footer class="footer fixed-bottom">
    <a href="#" class="btn btn-primary btn-block">メールを送る</a>
</footer>
@endsection
