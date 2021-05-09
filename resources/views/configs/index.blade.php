@extends('layouts.app')

@section('content')
    <div class="container">
         <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Sales Target</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->sale->user->name}}</td>
                        <td>{{$item->sales_target}}</td>
                        <td>
                            @if (Auth::user()->hasRole('Admin'))
                                <a href="{{route('adminconfigs.edit',['config'=>$item->id])}}" class="btn btn-primary ml-2">Edit</a>
                            @elseif(Auth::user()->hasRole('Back Office')) 
                                <a href="{{route('configs.edit',['config'=>$item->id])}}" class="btn btn-primary ml-2">Edit</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection