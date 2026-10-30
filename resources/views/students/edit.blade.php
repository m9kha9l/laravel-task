@extends('students.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Редактирование учеников</div>
  <div class="card-body">
      
      <form action="{{ url('student/' .$students->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$students->id}}" id="id" />
        <label>Имя</label>
        <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control">
        <span style="color: red">
            @error('name')
                {{$message}}
            @enderror
        </span>
        <br>
        <label>Адрес</label>
        
        <input type="text" name="address" id="address" value="{{$students->address}}" class="form-control"><br>
        <label>Телефон</label>
        <span style="color: red">
            @error('address')
                {{$message}}
            @enderror
        </span>
        <br>
        <input type="text" name="mobile" id="mobile" value="{{$students->mobile}}" class="form-control"><br>
        <span style="color: red">
            @error('mobile')
                {{$message}}
            @enderror
        </span>
        <br>
        <input type="submit" value="Сохранить изменения" class="btn btn-success">
    </form>
   
  </div>
</div>
 
@stop