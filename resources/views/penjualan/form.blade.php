<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
    
   <form class="form-horizontal" data-toggle="validator" method="post">
   {{ csrf_field() }} {{ method_field('POST') }}
   
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
      <h3 class="modal-title"></h3>
   </div>
        
<div class="modal-body">
  
  <input type="hidden" id="id" name="id">
  
      <input type="hidden" name="total" id="total">
      <input type="hidden" name="totalitem" id="totalitem">

      <div class="form-group">
        <label for="member" class="col-md-4 control-label">Kode Member</label>
        <div class="col-md-8">
          <div class="input-group">
            <input id="member" type="text" class="form-control" name="member" value="0">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="totalrp" class="col-md-4 control-label">Total Item</label>
        <div class="col-md-8">
          <input id="totalitem" name="item" type="text" class="form-control" name="totalitem" readonly>
        </div>
      </div>

      <div class="form-group">
        <label for="totalrp" class="col-md-4 control-label">Total</label>
        <div class="col-md-8">
          <input id="total" name="harga" type="text" class="form-control" name="total" readonly>
        </div>
      </div>

      
      <div class="form-group">
        <label for="retur" class="col-md-4 control-label">Retur</label>
        <div class="col-md-8">
          <input type="text" class="form-control" name="retur" id="retur" value="0">
        </div>
      </div>

      <div class="form-group">
        <label for="bayarrp" class="col-md-4 control-label">Bayar</label>
        <div class="col-md-8">
          <input type="text" class="form-control" id="bayarrp" name="bayarrp">
        </div>
      </div>

      <div class="form-group">
        <label for="diterima" class="col-md-4 control-label">Diterima</label>
        <div class="col-md-8">
          <input type="number" class="form-control" name="diterima" id="diterima">
        </div>
      </div>

        <input type="hidden" class="form-control" id="kasir" name="kasir">
    </form>
  </div>

      </div>
      
      <div class="box-footer">
        <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan </button>
      <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
      </div>
    </div>
  
</div>
   
    
   </form>

         </div>
      </div>
   </div>