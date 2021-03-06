@extends('shop.base')
	@section('content')
		
			  <div class="row">
			   <div class="col-md-6">
				<div class="row">
				<div class="col-md-6">

				  <div class="box box-danger">
					<div class="box-header">
					  <h3 class="box-title">商户</h3>
					</div>
					<div class="box-body">
					  <!-- Date dd/mm/yyyy -->
					  <div class="form-group">
						<label>Date masks:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					  <!-- Date mm/dd/yyyy -->
					  <div class="form-group">
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask/>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					  <!-- phone mask -->
					  <div class="form-group">
						<label>US phone mask:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-phone"></i>
						  </div>
						  <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask/>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					  <!-- phone mask -->
					  <div class="form-group">
						<label>Intl US phone mask:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-phone"></i>
						  </div>
						  <input type="text" class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask/>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					  <!-- IP mask -->
					  <div class="form-group">
						<label>IP mask:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-laptop"></i>
						  </div>
						  <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask/>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					</div><!-- /.box-body -->
				  </div>
				</div><!-- /.col (right) -->
			 </div><!-- /.row -->
		
	@endsection