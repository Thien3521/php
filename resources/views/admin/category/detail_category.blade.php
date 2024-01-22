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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh Mục/</span> Tất cả danh mục</h4>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Thêm danh mục
                </button>
              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl-12">
                    <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Bảng thông tin danh mục</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>                         
                          <th>Thông tin 1</th>
                          <th>Hình ảnh 1</th>
                          <th>Thông tin 2</th>
                          <th>Hình ảnh 2</th>
                          <th>Thông tin 3</th>
                          <th>Hình ảnh 3</th>
                          <th>Thông tin 4</th>
                          <th>Hình ảnh 4</th>
                          <th>Chỉnh sửa</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($detail_category as $category)
                        <tr>
                          <td>
                          <textarea name="" id="" cols="30" rows="10">{{$category->information1}}</textarea>
                          </td>
                          <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                              <li
                                data-bs-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-bs-placement="top"
                                class="avatar avatar-xs pull-up"
                                title="{{$category->information1}}"
                                style="width: 150px; height: 100px;"
                              >
                                <img src="{{ url('public/uploads/' . $category->image1) }}"  />
                              </li>
                             
                            </ul>
                          </td>
                          
                          <td >
                          <textarea contenteditable="true"  name="" id="" cols="30" rows="10">{{$category->information2}}</textarea>
                          </td>
                          <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                              <li
                                data-bs-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-bs-placement="top"
                                class="avatar avatar-xs pull-up"
                                title="{{$category->information2}}"
                                style="width: 150px; height: 100px;"
                              >
                                <img src="{{ url('public/uploads/' . $category->image2) }}"  />
                              </li>
                             
                            </ul>
                          </td>

                          <td>
                          <textarea name="" id="" cols="30" rows="10">{{$category->information3}}</textarea>
                          </td>
                          <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                              <li
                                data-bs-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-bs-placement="top"
                                class="avatar avatar-xs pull-up"
                                title="{{$category->information3}}"
                                style="width: 150px; height: 100px;"
                              >
                                <img src="{{ url('public/uploads/' . $category->image3) }}"  />
                              </li>
                             
                            </ul>
                          </td>

                          <td>
                          <textarea name="" id="" cols="30" rows="10">{{$category->information4}}</textarea>
                          </td>
                          <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                              <li
                                data-bs-toggle="tooltip"
                                data-popup="tooltip-custom"
                                data-bs-placement="top"
                                class="avatar avatar-xs pull-up"
                                title="{{$category->information4}}"
                                style="width: 150px; height: 100px;"
                              >
                                <img src="{{ url('public/uploads/' . $category->image4) }}"  />
                              </li>
                             
                            </ul>
                          </td>
                          <td>
                            <div class="dropdown">
                              <button
                                type="button"
                                class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="bx bx-edit-alt me-1"></i> Chỉnh sửa</a
                                >
                                <a class="dropdown-item " href="{{url('delete-detail-category/'.$category->detail_category_id)}}"
                                  ><i class="bx bx-trash me-1"></i> Xóa</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->
                </div>
                <div class="col-xl-3">
                
                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm thông tin </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method = "POST" action="{{url('/add-detail-category/'.$category_id)}}" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                        
                          <label class="form-label" for="basic-default-fullname">Thông tin 1</label>
                          <textarea class="form-control" name="information1" id="editor1"></textarea>
                         
                        </div>
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Hình ảnh Thông tin 1</label>
                          <input class="form-control" type="file" name="image1" id="image1" />
                        </div>
                        <div class="mb-3">
                        
                          <label class="form-label" for="basic-default-company">Thông tin 2</label>
                          <textarea class="form-control" name="information2" id="editor2"></textarea>
                        
                        </div>
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Hình ảnh Thông tin 2</label>
                          <input class="form-control" type="file" name="image2" id="image2" />
                        </div>
                        <div class="mb-3">
                        
                          <label class="form-label" for="basic-default-fullname">Thông tin 3</label>
                          <textarea class="form-control" name="information3" id="editor3"></textarea>
                        
                        </div>
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Hình ảnh Thông tin 3</label>
                          <input class="form-control" type="file" name="image3" id="image3" />
                        </div>
                        <div class="mb-3">
                        
                          <label class="form-label" for="basic-default-company">Thông tin 4</label>
                          <textarea class="form-control" name="information4" id="editor4"></textarea>
                      
                        </div>
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Hình ảnh Thông tin 4</label>
                          <input class="form-control" type="file" name="image4" id="image4" />
                        </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                        <button type="submit" class="btn btn-primary " " 
                               ">Thêm thông tin</button>
                        </div>
                      </form>
                    </div>
                    </div>
                </div>
                </div>
                </div> 
              </div>
            </div>
            <!-- / Content -->
@endsection
