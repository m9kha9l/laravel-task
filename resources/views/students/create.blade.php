@extends('students.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Все студенты</div>
  <div class="card-body">
      
      <form action="{{ url('student') }}" method="post">
        {!! csrf_field() !!}
        <label>Имя</label><br>
        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control">
        <span style="color: red">
            @error('name')
                {{$message}}
            @enderror
        </span>
        <br>
        <label>Адрес</label><br>
        <input type="text" name="address" value="{{old('address')}}" id="address" class="form-control">
        <span style="color: red">
            @error('address')
                {{$message}}
            @enderror
        </span>
        <br>
        <label>Телефон</label><br>
        <input type="text" name="mobile" value="{{old('mobile')}}" id="mobile" class="form-control">
        <span style="color: red">
            @error('mobile')
                {{$message}}
            @enderror
        </span>
        <br>
        <input type="submit" value="Добавить" class="btn btn-success"><br>
    </form>
   
  </div>
</div>
 
@stop