@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 md-8">
                <div class="card">
                    <div class="col-11 pt-10">
                        <h1>GO POST</h1>
                        {{--                    @dd($email)--}}
{{--                        <div>{{$email}}</div>--}}
                        <div class="d-flex">
                            <div class="pr-20"><strong> 153</strong> posts </div>
                            <div class="pr-20"><strong> 23k</strong> followers </div>
                            <div class="pr-20"><strong> 212</strong> following </div>
                        </div>
                        <div class="pt -4 fw-bold">GO POST.org</div>
                        <div><a href="{{route('home.index')}}">GO POST.com</a> </div>
                    </div>
                </div>

                <form method="POST" action="{{route('posts.update', $post->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label  class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{$post->description}}</textarea>
                    </div>
                    <div class="mb-3">
{{--                        <label  class="form-label">Post Creator</label>--}}
{{--                        <select name="post_creator" class="form-control">--}}
{{--                            @foreach($users as $user)--}}
{{--                                --}}{{--                    <option @if($user->id == $post->user_id) selected @endif value="{{$user->id}}">{{$user->name}}</option>--}}
{{--                                <option @selected($post->user_id == $user->id) value="{{$user->id}}">{{$user->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
                    </div>
                    <button class="btn btn-primary">Edit</button>
                </form>


            </div>
        </div>
    </div>
@endsection

{{--Database--}}
