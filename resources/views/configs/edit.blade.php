@extends('layouts.app')
@section('content')
    <div class="container">
        <form  action="{{Auth::user()->hasRole('Admin') ?
         route('adminconfigs.update',['config'=>$configs->id]) :
          route('configs.update',['config'=>$configs->id]) }}" method="POST">
             @csrf
            <div class="form-group">
                <label for="sales_target">Sales Target</label>
                <input type="number" class="form-control" name="sales_target" value="{{old('sales_target')?? $configs->email}}">
                <div class="text-danger">{{$errors->first('sales_target')}}</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            @method('PUT')
        </form>
    </div>  
@endsection