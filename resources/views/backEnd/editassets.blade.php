@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
      <!--page-content-wrapper-->
        <div class="page-content">

 <form action="{{url('updateassets/'.$asset_list->assets_type_id)}}" method="post" id="updatesliderForm" enctype="multipart/form-data">{!! csrf_field() !!}
  @method('PUT')
         <label>Assets Name</label></br>
          <input type="text" name="assets_name" id="assets_name" class="form-control" value="{{$asset_list->assets_name}}"required></br>
          <required>
     <div class="form-group">
                          <label for="exampleInputUsername1">Status</label>
                          <select class="form-control" name="status" id="status" value="{{$asset_list->status}}">
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