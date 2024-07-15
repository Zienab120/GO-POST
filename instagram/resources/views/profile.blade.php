@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 md-8">
                <div class="card">
                    <div class="col-11 pt-10">
                        <h1>GO POST</h1>
                        {{--                    @dd($email)--}}
                        <div>{{$email}}</div>
                        <div class="d-flex">
                            <div class="pr-20"><strong> 153</strong> posts </div>
                            <div class="pr-20"><strong> 23k</strong> followers </div>
                            <div class="pr-20"><strong> 212</strong> following </div>
                        </div>
                        <div class="pt -4 fw-bold">GO POST.org</div>
                        <div><a href="{{route('home.index')}}">www.GO POST.com</a> </div>
                    </div>
                </div>



                @foreach($ProfilePosts as $profilePost)
                    <table class="table mt-4">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('posts.edit', $profilePost->id)}}">Edit</a></li>
{{--                                <li><a class="dropdown-item" >Delete</a></li>--}}

                            <form style="display: inline;" action="{{route('posts.destroy', $profilePost->id)}}" method="POST">

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </ul>
                        </div>
                        <tbody>
                        <tr>
{{--                                <div><strong>{{$email}}</strong></div><br>--}}
                                <div><strong>{{$username}}</strong></div><br>
                                <div>{{$profilePost->description}}</div>
                            <div style="inset-inline: auto">
{{--                                <button  type="button" aria-expanded="false" href="{{route('posts.like', $profilePost->id)}}">Like</button>--}}
                                <a role="button" href="{{route('posts.like', $profilePost->id)}}" class="btn btn-primary">Like</a>
                                <div>{{$profilePost->likes}}
                                    Likes</div>
                            </div>
                            <div style="inset-inline: auto">
                                <a href="{{route('posts.comment', $profilePost->id)}}" class="btn btn-primary">Comment</a>
{{--                                <button type="button" aria-expanded="false">Comment</button>--}}
                                <div>{{$profilePost->comments}}
                                    Comments</div>
                            </div>
{{--                            <div style="inset-inline: auto">--}}
{{--                                <a href="{{route('posts.edit', $profilePost->id)}}" class="btn btn-primary">Share</a>--}}
{{--                                <button type="button" aria-expanded="false">Share</button>--}}
{{--                                {{$profilePost->shares}} Shares--}}
{{--                            </div>--}}
                            <td></td>

                        </tr>
                        </tbody>
                    </table>
                @endforeach


            </div>
        </div>
    </div>
@endsection

{{--Database--}}
