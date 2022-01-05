@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プロフィール一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="list-group">
                        @foreach ($users as $user)
                            <div class="profile-list">
                                <a href="{{ route('profile.view', ['user' => $user->id])}}" class="list-group-item list-group-item-action">
                                    <dl>
                                        <dt class="image">
                                            <img src="{{ route('media.download', ['path' => $user->image]) }}" width="100%">
                                        </dt>
                                        <dd class="right">
                                            <dl>
                                                <dd class="name">
                                                    @if($user->sex === 'M')
                                                        <span style="color: #4783D4;">♂</span>
                                                    @else
                                                        <span style="color: #f884a3;">♀</span>
                                                    @endif
                                                    {{ $user->name }}
                                                </dd>
                                                <dd class="info">
                                                    {{ $user->perf_name }}&nbsp;{{ $user->age_name }}
                                                </dd>
                                                <dd class="comment">
                                                    {{ mb_strimwidth( strip_tags($user->comment), 0, 100, '…', 'UTF-8') }}
                                                </dd>
                                            </dl>
                                        </dd>
                                    </dl>
                                </a>                        
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection