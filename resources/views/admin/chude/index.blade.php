@extends('admin.layouts.master')

@section('title')
    Danh sách chủ đề
@endsection

@section('content')
<style>
   
</style>
<div class="container-fluid">
    <button type="button" class="btn btn-primary" onclick="prepareAdd();"><i class="fas fa-plus"></i> Thêm mới</button>
<!--    <button type="button" class="btn btn-primary" onclick="ThucHienIn();"><i class="fas fa-print"></i> In</button>
    <button type="button" class="btn btn-primary" onclick="ThucHienXuatExcel();"><i class="fas fa-file-excel"></i> Xuất excel</button>
    <button type="button" class="btn btn-primary" onclick="ThucHienXuatpdf();"><i class="fas fa-file-pdf"></i> Xuất PDF</button>-->
    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" align="center">Danh sách chủ đề</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th width="5%">STT</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                            <th width ="15%">Mã</th>
                                            <th>Tên</th>
                                            <th>Tên tiếng anh</th>
                                        </tr>
                                    </thead>
                                    
<!--                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>-->
                                    <tbody>
                                        @foreach ($data as $k => $v)
                                        <tr>
                                            <td align="center" style="font-weight: bold;">{{ $k + 1 }}</td>
                                            <td align="center" width="5%"><i class="fas fa-pen function" style="color:blue" title="Sửa" onclick="prepareEdit({{ $v->chu_de_id }}, '{{ route('chude.update', ['id' => $v->chu_de_id])}}')"></i></td>
                                            <td align="center" width="5%">
                                                <form name="frmXoa" method="POST" action="{{route('chude.destroy',['id' => $v->chu_de_id])}}"  class="delete-form" data-id = "{{ $v->chu_de_id }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button type="submit" class="btn btn-link" ><i class="fas fa-trash-alt function" style="color:red"></i></button>
                                                </form>
                                            </td>
                                            <td>{{ $v->chu_de_ma }}</td>
                                            <td>{{ $v->chu_de_ten_vn }}</td>
                                            <td>{{ $v->chu_de_ten_en }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

<!-- Button trigger modal -->


<!-- Modal them moi-->
<div class="modal fade " id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Thêm mới chủ đề</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        @include('admin.partials.error-message')
      <div class="modal-body">
        <!--form-->
        <form name="frmMain" id = "frmMain" method="POST" action="{{ route('chude.store') }}">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="chu_de_ma" class="col-sm-2 col-form-label">Mã</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row" value="{{ old('chu_de_ma') }}" name="chu_de_ma" id="chu_de_ma" placeholder="VD: GD, TUIXACH..." >
                </div>
            </div>  
            <div class="form-group row">
                <label for="chu_de_ten_vn" class="col-sm-2 col-form-label">Tên tiếng việt</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row" value="{{ old('chu_de_ten_vn') }}" name="chu_de_ten_vn" id="chu_de_ten_vn" placeholder="VD: Giày dép, túi xách...">
                </div>
            </div>
            <div class="form-group row">
                <label for="chu_de_ten_en" class="col-sm-2 col-form-label">Tên tiếng anh</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ old('chu_de_ten_en') }}" name="chu_de_ten_en" id="chu_de_ten_en" placeholder="Example: Shoes, bags,...">
                </div>
            </div>
            <!--end form-->
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fas fa-download"></i> Lưu</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-undo-alt"></i> Trở về</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('custom-scripts')
<script>
    
        $( document ).ready(function() { 
        @if ($errors->any())
            $('#modal').modal('show');
        @endif
        $('.delete-form').submit(function (e){
            e.preventDefault();
            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Dữ liệu khi xóa sẽ không thể phục hồi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa!'
              }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function () {
                        Swal.fire(
                            'Thành công!',
                            'Bạn đã xóa thành công.',
                            'success'
                          ),
                        setTimeout(function(){ 
                            location.reload();  
                        }, 1000);
                    }
                  });
                }
              });
            });
        });
        
        function prepareAdd(){
            ClearErrorMessage();
            $('#chu_de_ma').val('').attr('disabled', false);
            $('#chu_de_ten_vn').val('');
            $('#chu_de_ten_en').val('');
            $('imput[name ="_method"]').val();
            $('#_method').remove();
            $('#frmMain').attr('action', '{{ route('chude.store') }}');
            $('#modal').modal('show');
        }
        
        
        function prepareEdit(id, action){
            ClearErrorMessage();
            if (id !== '') {
                $.ajax({
                url: '{{ route('chude.info') }}',
                type: "GET",
                data: {
                    id: id
                },
                success: function(response) {
                    $(response.data).each(function() {
                        var data = response.data;
                        $('#modal_title').text('Sửa chủ đề');
                        $('#chu_de_ma').val(data.chu_de_ma).attr('disabled', true);
                        $('#chu_de_ten_vn').val(data.chu_de_ten_vn);
                        $('#chu_de_ten_en').val(data.chu_de_ten_en);
                        if ($('#_method').length === 0) {                          
                            $('#chu_de_ten_en').after('<input id = "_method" type="hidden" name="_method" value="PUT" />');
                        }
                        $('#frmMain').attr('action', action);
                        $('#modal').modal('show');
                    });
                }
            });
        }  
        }
        
        function ThucHienIn(){
            
        }
              
</script>
@endsection

