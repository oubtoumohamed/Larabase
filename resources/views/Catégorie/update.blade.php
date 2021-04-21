@extends('standard')

@section('content')

  <form class="card" method="POST" enctype="multipart/form-data" action="@if($object->id){{ route('Catégorie_update',$object->id) }}@else{{ route('Catégorie_store') }}@endif">
    {{ csrf_field() }}
    <div class="card-header">
      <h3 class="card-title">
        @if($object->id)
          {{ __('Catégorie.Catégorie_edit') }}
        @else
          {{ __('Catégorie.Catégorie_create') }}
        @endif
      </h3>
    </div>
    <div class="card-body">
      <div class="row">

        <div class='col-md-6'> 
          <div class='form-group'> 
            <label class='form-label'>{{ __('Catégorie.label') }}</label> 
            <input class="form-control" id="label" name="label" value="@if($object->id){{ $object->label }}@else{{ old("label") }}@endif" type="text"  > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
            <label class='form-label'>{{ __('Catégorie.parent') }}</label> 
            <input class="form-control" id="parent" name="parent" value="@if($object->id){{ $object->parent }}@else{{ old("parent") }}@endif" type="text" required="" > 
          </div> 
        </div> 


      </div>
    </div>
    <div class="card-footer text-right">
      {!! update_actions($object) !!}
    </div>
  </form>

@endsection