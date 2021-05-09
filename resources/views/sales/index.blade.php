@extends('layouts.app')

@section('content')
    <div class="container">
         <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Payment</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->payment}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection