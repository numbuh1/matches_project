@extends('layout.master')

@section('content')
	<section class="content-header">
	  <h1>
	    Shop 
	    <small>Come and buy stuffs</small>
	  </h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row " style="position: fixed; bottom: 10%; top: 20%;">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="col-md-2">
				<div class="row">
				@foreach($productTypes as $type)
					<div class="col-md-12 col-xs-3" style="overflow-x: scroll;">
						<a href="#" onclick="getProductsByType({{$type->id}})">
							<div class="box box-default" style="text-align: center">
								<div class="box-body">
									<img src="{{$type->image}}" width="50"/><br>
									<strong>{{$type->name}}</strong>
								</div>
							</div>
						</a>
					</div>
				@endforeach
				</div>
			</div>
			<div class="col-md-10" style="overflow-y: scroll; height: 100%;">
			@foreach($productTypes as $type)
				<?php
					$color = '';
					if($type->id == 1)
						$color = 'bg-red';
					else if($type->id == 2)
						$color = 'bg-aqua';
					else if($type->id == 3)
						$color = 'bg-green';
				?>
				<div id="product-type-{{$type->id}}" class="row product-pane">
					<div class="col-md-12">
						<div class="box box-default">
				            <div class="box-header with-border">
								<h3 class="box-title">{{$type->name}}</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								</div>
								<!-- /.box-tools -->
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
					            @foreach($products as $product)
									@if($product->type == $type->id)
										<div class="col-md-4 col-sm-6 col-xs-12">
											<div class="info-box {{$color}}">
												<span class="info-box-icon" style="background: white">
													<img src="{{$product->image}}" width="50" height="50" />
												</span>

												<div class="info-box-content">
													<span class="info-box-text"><strong>{{$product->name}}</strong></span>
													<span class="">{{$product->description}}</span>
													<span class="info-box-number"><img src="/img/business/coin-2.svg" width="15" height="15" /> {{$product->price}}</span>
													<a onclick="showProduct({{$product->id}})" style="float:right; color:white"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
												</div>
											<!-- /.info-box-content -->
											</div>
											<!-- /.info-box -->
								        </div>
									@endif
								@endforeach
				            </div>
			            <!-- /.box-body -->
			        	</div>
		        	</div>
				</div>
			@endforeach
			</div>
		</div>
	</section>
	<div style="display:none">
		<div id="shopPopup">
		  <table style="width:100%" class="table no-border">
		    <tbody>
		      <tr style="width: 150px">
		        <td rowspan="2">
		        	<img class="productImage" src="" width="100" height="100" />
		        </td>
		        <td><span class="productName"></span></td>
		      </tr>
		      <tr>
		      	<td><span class="productDesc"></span></td>
		      </tr>
		      <tr>
		      	<td>
		      		<span>
			        	<button class="btn btn-danger btn-xs decreaseQuantity" style="cursor: pointer;" onclick="changeQuantity(1)"><i class="fa fa-minus-square" aria-hidden="true"></i></button> 
			        	<strong><span class="productQuantity">1</span></strong> 
			        	<button class="btn btn-success btn-xs increaseQuantity" style="cursor: pointer;" onclick="changeQuantity(2)"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
			        </span>
			        <br>
			        <img src="/img/business/coin-2.svg" width="15" height="15" /> <span class="productTotalPrice"></span>
		      	</td>
		      	<td>
		      		In stock: <span class="productStock">0</span>
		      		<span class="productPrice" style="display:none"></span>
		      	</td>
		      </tr>
		    </tbody>
		  </table>
		</div>
		<div id="shopPopup2">
		  <table style="width:100%" class="table no-border">
		    <tbody>
		      	<tr>
		        	<td colspan="3">
		        		<img class="productImage" src="" width="100" height="100" />
		        	</td>		        
		      	</tr>
		      	<tr>
		      		<td colspan="3"><strong><span class="productName"></span></strong></td>
		      	</tr>
		      	<tr>
		      		<td colspan="3"><span class="productDesc"></span></td>
		      	</tr>
		      	<tr>
		      		<td style="text-align: right">
		      			<span><button class="btn btn-danger btn-xs decreaseQuantity" style="cursor: pointer;" onclick="changeQuantity(1)"><i class="fa fa-minus-square" aria-hidden="true"></i></button></span>
			    	</td>
			    	<td style="width: 20px">
			    		<strong><span class="productQuantity">1</span></strong> 
			    	</td>
			    	<td style="text-align: left">
			    		<span>	
				        	<button class="btn btn-success btn-xs increaseQuantity" style="cursor: pointer;" onclick="changeQuantity(2)"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
				        </span>
			    	</td>
		    	<tr>
		      		<td colspan="3">
		      			In stock: <span class="productStock">0</span>
		      			<span class="productPrice" style="display:none"></span>
		      		</td>
		      	</tr>
		    </tbody>
		  </table>
		</div>
		<div id="shopPopup3" class=" table-condensed">
		  <table style="width:100%" class="table no-border table-condensed">
		    <tbody>
		      <tr style="width: 150px">
		        <td rowspan="3">
		        	<img class="productImage" src="" width="50" height="50" />
		        	<hr>
		        	<img src="/img/business/crate.svg" width="20" height="20" /> <span class="productStock">0</span>
		      		<span class="productPrice" style="display:none"></span>
		        </td>
		        <td colspan="2"><span><strong>Product:</strong> <span class="productName"></span></span></td>
		      </tr>
		      <tr>
		      	<td colspan="2"><span><strong>Description:</strong> <span class="productDesc"></span></span></td>
		      </tr>
		      <tr>
		      	<td>
		      		<span>
			        	<button class="btn btn-danger btn-xs decreaseQuantity" style="cursor: pointer;" onclick="changeQuantity(1)"><i class="fa fa-minus-square" aria-hidden="true"></i></button> 
			        	<strong><span class="productQuantity">1</span></strong> 
			        	<button class="btn btn-success btn-xs increaseQuantity" style="cursor: pointer;" onclick="changeQuantity(2)"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
			        </span>
			        <br>
			    </td>
		      	<td>
		      		<img src="/img/business/wallet-1.svg" width="15" height="15" /> <span class="currentGold">1000</span>
		      	</td>
		      </tr>
		    </tbody>
		  </table>
		</div>
	</div>
@endsection

@section('js')
	<script>		
		function showProduct(id) {
			
            $.ajax({
                type: 'GET',
                url: '/product/' + id,
                success: function (data) {
                	$('.productImage').attr('src', data.image);
                	$('.productPrice').html(data.price);
                	$('.productTotalPrice').html(data.price);
                	$('.productName').html(data.name);
                	$('.productDesc').html(data.description);
                	$('.productStock').html(data.stock);
                	var html = $('#shopPopup2').html();
                	swal({
						title: '',
						html: html,
						showCloseButton: true,
						showCancelButton: true,
						confirmButtonText:
						    '<img src="/img/business/coin-2.svg" width="15" height="15" /> <span class="productTotalPrice"></span>',
						cancelButtonText:
						    'Cancel'
					}).then(function () {
						var content = '<tr><td>' + data.name + '</td><td>' + $('.productQuantity').html() + '</td><td>' + (parseInt(data.price) * parseInt($('.productQuantity').html())) + '</td><td><button class="btn btn-danger btn-xs" style="cursor: pointer;" onclick="removeItem(this)"><i class="fa fa-minus-square" aria-hidden="true"></i></button></td></tr>';
						$('#orderPane').html($('#orderPane').html() + content);
					});
					changeQuantity(1);
                }
            });
		}

		function changeQuantity(quantity) {
			var orgQuantity = parseInt($('.productQuantity').html());
			if(orgQuantity >= 1 && quantity > 0) {				
				var newQuantity = quantity;	
				$('.increaseQuantity').removeAttr('onclick');
				$('.increaseQuantity').attr('onclick', 'changeQuantity(' + (newQuantity + 1) + ')');
				if(orgQuantity > 1) {
					$('.decreaseQuantity').removeAttr('onclick');
					$('.decreaseQuantity').attr('onclick', 'changeQuantity(' + (newQuantity - 1) + ')');
				}
				$('.productQuantity').html(newQuantity);
				var price = parseInt($('.productPrice').html());
				$('.productTotalPrice').html(price * newQuantity);
			}						
		}

		function getProductsByType(id) {
			for (var i = 1; i <= $('.product-pane').length; i++) {
				if(id == i) {
					$('#product-type-' + i).show()
				} else {
					$('#product-type-' + i).hide()
				}
			}
		}
	</script>
@endsection
