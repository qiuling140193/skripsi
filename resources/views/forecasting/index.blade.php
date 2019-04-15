@extends('layouts.app')

@section('title')
  Forecasting
@endsection

@section('breadcrumb')
   @parent
   <li>forecasting</li>
@endsection

@section('content')     
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
        <a onclick="deleteAll()" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
      </div>
      <div class="box-body">  

<form method="post" id="form-produk">
{{ csrf_field() }}
<table class="table table-striped">
<thead>
   <tr>
      <th width="20">No</th>
      <th>Produk</th>
      <th>Stok</th>
      <th>Prediksi</th>
      <th>Disediakan</th>
      <th>Tanggal Prediksi</th>
   </tr>
</thead>
<tbody></tbody>
</table>
</form>

      </div>
    </div>
  </div>
</div>

@include('forecasting.form')
@endsection

@section('script')
<script type="text/javascript">
var table, save_method;
$(function(){
   table = $('.table').DataTable({
     "processing" : true,
     "ajax" : {
       "url" : "{{ route('forecasting.data') }}",
       "type" : "GET"
     }
   }); 
   
   

  $('#modal-form form').validator().on('submit', function(e){
      
         var id = $('#id').val();
         if(save_method == "add") url = "{{ route('forecasting.get-forecast') }}";
         else url = "forecasting/"+id;
         
         $.ajax({
           url : url + '?from=' + $('#from').val() +'&to=' + $('#to').val(),
           type : save_method == "add" ? "GET" : "PUT",
           // data : $('#modal-form form').serialize(),
           success : function(data){
             $('#modal-form').modal('hide');
             table.ajax.reload();
           },
           error : function(){
             alert("Tidak dapat menyimpan data!");
           }   
         });
         return false;
     
   });
});

function addForm(){
   save_method = "add";
   $('input[name=_method]').val('POST');
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();            
   $('.modal-title').text('Prediksi');
   $('#kode').attr('readonly', false);
}

function editForm(id){
   save_method = "edit";
   $('input[name=_method]').val('PATCH');
   $('#modal-form form')[0].reset();
   $.ajax({
     url : "produk/"+id+"/edit",
     type : "GET",
     dataType : "JSON",
     success : function(data){
       $('#modal-form').modal('show');
       $('.modal-title').text('Edit Produk');
       
       $('#id').val(data.id_forecasting);
       $('#harga_jual').val(data.tanggal_prediksi);
       $('#nama').val(data.id_produk);
       
     },
     error : function(){
       alert("Tidak dapat menampilkan data!");
     }
   });
}

function deleteData(id){
  if(confirm("Apakah yakin data akan dihapus?")){
     $.ajax({
       url : "forecasting/"+id,
       type : "POST",
       data : {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
       success : function(data){
         table.ajax.reload();
       },
       error : function(){
         alert("Tidak dapat menghapus data!");
       }
     });
   }
}




</script>
@endsection