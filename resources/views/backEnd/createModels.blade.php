@extends('layouts.admin') @section('content') <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{$title}}</h1>
        </div>
        <!-- /.col -->
      </div>
    </div>
  </div>
  <!-- Main content -->
  <section class="content mb-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-info">
            <form action="{{url('/savemodels')}}" method="POST" id="registrationForm">{!! csrf_field() !!} <div class="card-body">
                <div class="form-group row mb-2">
                  <label for="" class="col-sm-2 col-form-label">Asset Name Type:</label>
                  <div class="col-10 col-sm-3">
                    <div class="form-group">
                      <select class="form-control assets_type_id" id="assets_type_id" name="assets_type_id">
                        <option value=""> Select Category</option> <?php foreach ($asset_list as $value) { ?> <option value="{{$value->assets_name}}">{{$value->assets_name }}</option> <?php }?>
                      </select>
                      <p class="error" id="err_product_category"></p>
                    </div>
                  </div>
                  </div>
                  <hr>
             
               <div class="data_form hidden">
                  <div class="form-group row mb-4">
                  <label for="" class="col-sm-2 col-form-label">Name:</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="asset_name" name="asset_name">
                    <p class="error" id="err_product_code"></p>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label for="" class="col-sm-2 col-form-label">Model:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="model" name="model">
                    <p class="error" id="err_product_name"></p>
                  </div>
                  <div class="col-sm-2"></div>
                  <label for="" class="col-sm-2 col-form-label">Specification</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="specification" name="specification">
                    <p class="error" id="err_product_hsn_code"></p>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label for="" class="col-sm-2 col-form-label">Serial Number</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="serial_number" name="serial_number">
                    <p class="error" id="err_product_min_quantity"></p>
                  </div>
                  <div class="col-sm-2"></div>
                  <label for="" class="col-sm-2 col-form-label">Other</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="other" name="other">
                    <p class="error" id="err_product_wait"></p>
                  </div>
                </div>
              </div>
              <div class="form-group row mb-4 simfield hidden">
                  <label for="" class="col-sm-2 col-form-label">sim:</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="sim" name="sim">
                    <p class="error" id="err_product_code"></p>
                  </div>
                </div>
                <div class="form-group row mb-4 simfield hidden">
                  <label for="" class="col-sm-2 col-form-label">sim_number:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control " id="sim_number" name="sim_number">
                    <p class="error" id="err_product_name"></p>
                  </div>
                  <div class="col-sm-2 "></div>
                  <label for="" class="col-sm-2 col-form-label">imsi_number</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="imsi_number" name="imsi_number">
                    <p class="error" id="err_product_hsn_code"></p>
                  </div>
                </div>
                <div class="form-group row mb-4 simfield hidden">
                	
                  <label for="" class="col-sm-2 col-form-label">contact_number</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="contact_number" name="contact_number">
                    <p class="error" id="err_product_min_quantity"></p>
                  </div>
                  
                </div>

<!--                 system starts --------------------------------------------
 -->               
 

 <button type="submit" class="btn btn-primary">Submit</button>

              </div> 
          </form>
        </div>
      </div>
    </div>
</div>


<script>
    jQuery(document).ready(function() {
    jQuery('#assets_type_id').change(function() {
      // alert( this.value );
      if(this.value === 'Router'){
        //alert( this.value );
          $(".data_form").removeClass("hidden");
      }else{
        $(".data_form").addClass("hidden");
      }

   if(this.value === 'Printer' || this.value === 'Bio Metric' || this.value === 'Pendrive'  || this.value === 'Router'  || this.value === 'Laptop'  || this.value === 'Switch'  || this.value === 'Head Phone' || this.value === 'Handset'  || this.value === 'CCTV Dome'  || this.value === 'CCTV Bullet' || this.value === 'System'){
        // alert( this.value );
           $(".data_form").removeClass("hidden");
      }else{
         $(".data_form").addClass("hidden");
      }
      if(this.value === 'Sim Card'){
        //alert( this.value );
        
          $(".simfield").removeClass("hidden");
      }else{
      	
        $(".simfield").addClass("hidden");
      }
        // if ($(this).prop('checked')) {
        //     alert("You have elected to show your checkout history."); //checked
        // }
        // else {
        //     alert("You have elected to turn off checkout history."); //not checked
        // }
    });
});
</script>

</section>
</div> @endsection



