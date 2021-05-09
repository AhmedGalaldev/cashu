@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
          <div class="mt-3">
                @if (Auth::user()->hasRole('Admin'))
                    <a href="{{route('adminsales.index')}}" class="btn btn-primary">Sales</a>
                    <a href="{{route('adminconfigs.index')}}" class="btn btn-primary">Configs</a>
                @elseif(Auth::user()->hasRole('Sales'))
                    <a href="{{route('sales.index')}}" class="btn btn-primary">Sales</a>
                @elseif(Auth::user()->hasRole('Back Office'))   
                    <a href="{{route('configs.index')}}" class="btn btn-primary">Configs</a>
                @else
                <form action="{{route('assignRole')}}" method="POST">
                    @csrf
                    <select class="form-control" name="name">
                        <option>Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>       
                </form>
                @endif
          </div>
        </div>
    </div>
</div>
@endsection
