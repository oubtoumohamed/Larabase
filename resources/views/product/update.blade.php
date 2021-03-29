@extends('standard')

@section('content')

  <form class="card" method="POST" enctype="multipart/form-data" action="@if($object->id){{ route('product_update',$object->id) }}@else{{ route('product_store') }}@endif">
    {{ csrf_field() }}
    <div class="card-body">
      <h3 class="card-title">
        @if($object->id)
          {{ __('product.product_edit') }}
        @else
          {{ __('product.product_create') }}
        @endif

      </h3>
      <div class="row">

        <div class='col-md-6'> 
          <div class='form-group'> 
            <label class='form-label'>{{ __('product.title') }}</label> 
            <input class="form-control" id="title" name="title" value="@if($object->id){{ $object->title }}@else{{ old("title") }}@endif" type="text" required="" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
            <label class='form-label'>{{ __('product.price') }}</label> 
            <input class="form-control" id="price" name="price" value="@if($object->id){{ $object->price }}@else{{ old("price") }}@endif" type="text" required="" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
            <label class='form-label'>{{ __('product.date') }}</label> 
            <input class="form-control" id="date" name="date" value="@if($object->id){{ $object->date }}@else{{ old("date") }}@endif" type="text" required="" > 
          </div> 
        </div> 


      </div>
    </div>
    <div class="card-footer text-right">
      {!! update_actions($object) !!}
    </div>
  </form>

@endsection