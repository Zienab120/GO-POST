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
                            </ul>
                            <form style="display: inline;" method="POST" action="{{route('posts.destroy', $profilePost->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        <tbody>
                        <tr>
                                <div><strong>{{$email}}</strong></div><br>
                                <div>{{$profilePost->description}}</div>
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
