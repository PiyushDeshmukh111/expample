@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
      <!--page-content-wrapper-->
        <div class="page-content">

 <form action="{{url('updatebrands/'.$brand_list->assets_brand_id)}}" method="post" id="updatesliderForm" enctype="multipart/form-data">{!! csrf_field() !!}
  @method('PUT')
         <label>Assets Types Id</label></br>
          <input type="text" name="assets_type_id" id="assets_type_id" class="form-control" value="{{$brand_list->assets_type_id}}"required></br>
          <required> 

          <label>Brand Name</label></br>
          <input type="text" name="brand_name" id="brand_name" class="form-control" value="{{$brand_list->brand_name}}"required></br>
          <required>
     <div class="form-group">
                          <label for="exampleInputUsername1">Status</label>
                          <select class="form-control" name="status" id="status" value="{{$brand_list->status}}">
                            <option value="1"> Active</option>
                            <option value="0"> Inactive</option>
                          </select>
                        </div>

      <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
         
<button type="submit" class="btn btn-primary">Submit</button>     </form>
   
  </div>
</div>
  </div></div></div>
    </section>
  </div>
   @endsection