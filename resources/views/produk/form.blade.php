<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
    
   <form class="form-horizontal" data-toggle="validator">
   {{ csrf_field() }}
   
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
      <h3 class="modal-title"></h3>
   </div>
        
<div class="modal-body">
  
  <input type="hidden" id="id" name="id">

  <div class="form-group">
    <label for="nama" class="col-md-3 control-label">Nama Produk</label>
    <div class="col-md-6">
      <input id="nama" type="text" class="form-control" name="nama" required>
      <span class="help-block with-errors"></span>
    </div>
  </div>

  <div class="form-group">
    <label for="harga_beli" class="col-md-3 control-label">Harga Beli</label>
    <div class="col-md-3">
      <input id="harga_beli" type="text" class="form-control" name="harga_beli" required>
      <span class="help-block with-errors"></span>
    </div>
  </div>

<div class="form-group">
    <label for="harga_jual" class="col-md-3 control-label">Harga Jual</label>
    <div class="col-md-3">
      <input id="harga_jual" type="text" class="form-control" name="harga_jual" required>
      <span class="help-block with-errors"></span>
    </div>
  </div>

  <div class="form-group">
    <label for="stok" class="col-md-3 control-label">Stok</label>
    <div class="col-md-2">
      <input id="stok" type="text" class="form-control" name="stok" required>
      <span class="help-block with-errors"></span>
    </div>
  </div>
  
</div>
   
   <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan </button>
      <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
   </div>
    
   </form>

         </div>
      </div>
   </div>