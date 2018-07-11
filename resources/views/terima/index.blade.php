@extends('layouts.app')

@section('title')
  Daftar Pembayaran Pelanggan
@endsection

@section('breadcrumb')
   @parent
   <li>Terima</li>
@endsection

@section('content')     
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{ route('terimad.new') }}"><i class="fa fa-cart-plus"></i> <span>Tambah</span></a>
      </div>
      <div class="box-body">  

<table class="table table-striped tabel-penjualan">
<thead>
   <tr>
      <th width="30">No</th>
      <th>Tanggal</th>
      <th>Kode Member</th>
      <th>Jumlah Nota</th>
      <th>Total Bayar</th>
      <th>Kasir</th>
      <th width="100">Aksi</th>
   </tr>
</thead>
<tbody></tbody>
</table>

      </div>
    </div>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
var table, save_method;
$(function(){
   table = $('.table').DataTable({
     "processing" : true,
     "ajax" : {
       "url" : "{{ route('terima.data') }}",
       "type" : "GET"
     }
   }); 
   
   $('#modal-form form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
         var id = $('#id').val();
         if(save_method == "add") url = "{{ route('terima.store') }}";
         else url = "terima/"+id;
         
         $.ajax({
           url : url,
           type : "POST",
           data : $('#modal-form form').serialize(),
           success : function(data){
             $('#modal-form').modal('hide');
             table.ajax.reload();
           },
           error : function(){
             alert("Tidak dapat menyimpan data!");
           }   
         });
         return false;
     }
   });
});

function addForm(){
   $('#modal-member').modal('show');        
}

function showDetail(id){
    $('#modal-detail').modal('show');

    table1.ajax.url("terima/"+id+"/lihat");
    table1.ajax.reload();
}

function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
     $.ajax({
       url : "terima/"+id,
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