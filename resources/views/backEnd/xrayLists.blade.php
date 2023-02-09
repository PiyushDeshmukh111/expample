@extends('layouts.admin')
@section('content')
<div class="page-wrapper">

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

          <a href="{{ url('/createXraytypes') }}" class="btn btn-primary btn-sm float-end" title="Add New X-Ray Types">
            <i class="fa fa-plus" aria-hidden="true"></i> Add Xray Types </a>
          <br />
          <br />
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>type_name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody> @foreach($xray_type as $item) 
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->type_name }}</td>
                                           <td>@if($item->status =='1')
 <button type="button" class="btn btn-inverse-success btn-sm">Active</button>
                              @else
                              <button type="button" class="btn btn-inverse-warning btn-sm">Inactive</button>
                              @endif
                            </td>  
                    <td>
                    <a href="{{url('editXraytypes/'.$item->id)}}" class="mb-2"><i class="fadeIn animated bx bx-edit-alt"></i></a>
                    <a href="{{url('deleteXraytypes/'.$item->id)}}"><i class="fadeIn animated bx bx-trash-alt"></i></a>
                  </td>
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      
                    </form>
                  </td>
                </tr> @endforeach 
              </tbody>
            </table>
           {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $xray_type->links() !!}
        </div>
        
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   </div></div></div>
</div>
 @endsection