
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 md-8">
            <div class="card">
                <div class="col-11 pt-10">
                    <h1>GO POST</h1>
                        <div>{{$email}}</div>

                <div class="d-flex">
                    <div class="pr-20"><strong> 0</strong> posts </div>
                    <div class="pr-20"><strong> 0</strong> followers </div>
                    <div class="pr-20"><strong> 0</strong> following </div>
                </div>

                    <div class="pt -4 fw-bold">GO POST.org</div>
                    <div><a href="{{route('home.index')}}">GO POST.com</a> </div>
                </div>
            </div>

            <div class="card">
                <div class="col-9 pt-10">
                    <form method="POST" action="{{route('home.store')}}">
                        @csrf
                    <div class="pr-15"><strong>What's on your mind, {{$username}}?</strong></div>
                    <div>
{{--                        <label  class="form-label"></label>--}}
                        <textarea name="description" class="form-control" rows="3"></textarea>
                        <button type="submit" class="btn btn-outline-primary">
                            {{ __('POST') }}
                        </button>
                    </div>
                </form>
                </div>
            </div>

            @foreach($posts as $post)
            <table class="table mt-4">
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th scope="col">#</th>--}}
{{--                    <th scope="col">Description</th>--}}
{{--                    <th scope="col">Posted By</th>--}}
{{--                    <th scope="col">Created At</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
                <tbody>

                    <tr>

{{--                        <td>{{$post->id}}</td>--}}
{{--                        <td>{{$post->$email ? $email : 'not found'}}</td>--}}
                        <div><strong>{{$username}}</strong></div><br>
{{--                        <td>{{$post->description}}</td>--}}
                        <div>{{$post->description}}</div>

{{--                        <td>{{$post->created_at->format('Y-m-d')}}</td>--}}
                        <td>
{{--                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-info">View</a>--}}
{{--                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>--}}
                        </td>
                    </tr>



                </tbody>
            </table>
            @endforeach
        </div>
    </div>
</div>
@endsection

{{--Database--}}
