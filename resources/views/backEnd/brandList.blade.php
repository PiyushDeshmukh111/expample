@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
      <!--page-content-wrapper-->
        <div class="page-content">
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                    
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            
              <div class="card-body">
                     @if (Session::has('error'))
                 <div class="alert alert-danger">{{ Session::get('error') }}</div>
              @endif


              @if (Session::has('success'))
                 <div class="alert alert-success">{{ Session::get('success') }}</div>
              @endif

@if (Session::has('update'))
                 <div class="alert alert-primary">{{ Session::get('update') }}</div>
              @endif

          <a href="{{ url('/createbrand') }}" class="btn btn-primary btn-sm float-end" title=" Add Sliders" enctype="multipart/form-data">
            <i class="fa fa-plus" aria-hidden="true"></i> Add Assets Brand</a>
          <br />
          <br />
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Assets Type Id</th>
                  <th>Brand Names</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody> @foreach($brand_list as $item) 
                <tr>
                  <td>{{ $item->assets_type_id }}</td>
                  <td>{{ $item->brand_name }}</td>
                     <td>@if($item->status =='1')
                              <button type="button" class="btn btn-inverse-success btn-sm">Active</button>
                              @else
                              <button type="button" class="btn btn-inverse-warning btn-sm">Inactive</button>
                              @endif
                            </td>
                            <td>
                    <a href="{{url('editbrands/'.$item->assets_brand_id  )}}" class="mb-2"><i class="fadeIn animated bx bx-edit-alt"></i></a>
                    <a href="{{url('deletbrands/'.$item->assets_brand_id )}}"><i class="fadeIn animated bx bx-trash-alt"></i></a>
                  </td>
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      
                    </form>
                  </td>
                </tr> @endforeach 
              </tbody>
            </table>
             
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   </div></div></div>

  </div>
 @endsection
