<?php
if(Session::get('admin_status') >= 2){
    $layout = 'admin.admin_layout';
} else {
    $layout = 'admin.admin_staff_layout';
}
?>
@extends($layout)
@section('content')
 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh Mục/</span> Tất cả lịch làm việc </h4>
             
              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl-12">
                    <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header" align ="center">Lịch làm việc</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                       
                      </thead>
                      <tbody class="load-calendar">
                
                      </tbody>
                      
                    </table>
                    
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->
                </div>
                <div class="col-xl-3">
      
                </div>
                </div>
                </div> 
              </div>
            </div>
            <!-- / Content -->
@endsection