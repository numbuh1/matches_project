@extends('layout.master')

@section('content')
	<section class="content-header">
	  <h1>
	    Quest Create Page
	    <small>Blank example to the fixed layout</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li><a href="#">Quests</a></li>
	    <li class="active">Create</li>
	  </ol>
	</section>

	<!-- Main content -->
	<section class="content">
	  <!-- Default box -->
	<div class="row">
	    <div class="col-md-6">
			<div class="box">
			    <div class="box-header with-border">
			      <h3 class="box-title">Basic Info</h3>

			      <div class="box-tools pull-right">
			        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
			          <i class="fa fa-minus"></i></button>
			        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
			          <i class="fa fa-times"></i></button>
			      </div>
			    </div>
			    <form action="{{ url('quest') }}" method="post" class="form-horizontal">
				    <div class="box-body">
				    	
				    		<div class="form-group">
								<label class="col-sm-3 control-label">Quest Name</label>

								<div class="col-sm-9">
									<input class="form-control" id="txtQuestName" name="txtQuestName" placeholder="Ex: The Quest For Glory,...">
								</div>
			                </div>
			                <div class="form-group">
								<label class="col-sm-3 control-label">Type</label>

								<div class="col-sm-9">
					                <select id="txtType" class="form-control" name="txtType" style="width: 100%;">
					                	<option value=""></option>		
					                	@for($i = 0; $i < count($questTypes); $i++)
					                        <option value="{{$questTypes[$i]->id}}">{{$questTypes[$i]->name}}</option>
					                    @endfor
						            </select>
								</div>
			                </div>
			                <div class="form-group">
			                	<label class="col-sm-3 control-label">Description</label>
			                	<div class="col-sm-9">
			                		<textarea id="txtDescription" class="form-control" rows="3" placeholder="Ex: You must help them..." name="txtDescription" style="resize: vertical; max-height: 300px;"></textarea>
			                	</div>
			                </div>
			                <div class="form-group">
			                	<label class="col-sm-3 control-label">Image</label>
			                	<div class="col-md-9">
			                		<input type="file" name="questImage" id="questImage">
			                	</div>
			                </div>
			                <div class="form-group">
								<label class="col-sm-3 control-label">Quest Req</label>

								<div class="col-sm-9">
					                <select id="txtType" class="form-control" name="txtQuestRequire" style="width: 100%;">
					                	<option value=""></option>		
					                	@for($i = 0; $i < count($quests); $i++)
					                        <option value="{{$quests[$i]->id}}">{{$quests[$i]->name}}</option>
					                    @endfor
						            </select>
								</div>
			                </div>
			                <div class="form-group">
								<label class="col-sm-3 control-label">Level Req</label>

								<div class="col-sm-9">
					                <input type="number" class="form-control" id="txtExpRequire" name="txtQuestName" placeholder="">
								</div>
			                </div>					    
				    </div>
				    <!-- /.box-body -->
				    <div class="box-footer">
				    	<button type="submit" onclick="createQuest()" class="btn btn-primary">Submit</button>
				    </div>
			    <!-- /.box-footer-->
			    </form>
			</div>
			<!-- /.box -->
		</div>
	</div>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="box">
			    <div class="box-header with-border">
			      <h3 class="box-title">Demo</h3>

			      <div class="box-tools pull-right">
			        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
			          <i class="fa fa-minus"></i></button>
			        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
			          <i class="fa fa-times"></i></button>
			      </div>
			    </div>
			    <div class="box-body">
			    	<table id="demoTable" class="table table-bordered table-hover">
			    		<tr>
			    			<td>SHIT</td>
						</tr>
					</table>
			    </div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>

	</section>
@endsection

@section('css')
	<link rel="stylesheet" href="../vendor/select2/dist/css/select2.min.css">
@endsection

@section('js')
	<script src="../vendor/select2/dist/js/select2.full.min.js"></script>
	<script>
		$(function () {
			
		});

		function showSideQuest(id) {			
			if(!$('#sideQuest' + id + '-reward').is(":visible")) {
				$('.reward').hide();
				$('#sideQuest' + id + '-reward').show(500);
			} else {
				$('.reward').hide();
			}
		}
	</script>
@endsection