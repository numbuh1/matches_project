@extends('admin.layout.master')

@section('content')
	<section class="content-header">
	  <h1>
	    Create A League
	    <small>Teamsssssss</small>
	  </h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row col-md-12">
			<div class="box box-success">
				<form id="team-form" class="form" method="post" action="{{ url('leagues') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <div class="box-body">
		            	<div class="form-group col-md-6">
		                	<label for="txtName">League Name</label>
		                	<input type="text" name="name" class="form-control" id="txtName" placeholder="Enter League Name">
		                </div>
		                <div class="form-group col-md-6">
		                	<label for="txtLogo">Logo</label>
		                	<input type="text" name="logo" class="form-control" id="txtLogo" placeholder="Enter Logo Image Link">
		                </div>
		                <div class="form-group col-md-6">
		                	<label for="cboGame">Game</label>
		                	<select id="cboGame" name="game" class="form-control icon-menu">
		                		<option value=""></option>
                                @foreach($game as $key => $val)
                                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                                @endforeach
		                	</select>
		                </div>
		                <div class="form-group col-md-6">
		                	<label for="txtLocation">Location</label>
		                	<input type="text" name="location" class="form-control" id="txtLocation" placeholder="Enter Location">
		                </div>
		                <div class="form-group col-md-6">
		                	<label for="cboCountry">Team Country</label>
		                	<br>
		                	<input type="text" class="form-control" name="country" id="cboCountry" onchange="setCountry()">
		                	<input type="hidden" name="countryId" id="countryId">
		                </div>
		                <br>
		                <div class="form-group col-md-6">
		                	<label for="txtDescription">Description</label>
		                	<textarea name="description" class="form-control" id="txtDescription" placeholder="Enter Description" rows="4"></textarea>
		                </div>
		                <div class="form-group col-md-6"></div>
		                <div class="form-group col-md-3">
		                	<label for="txtDateStart">Start Date</label>
		                	<input type="text" class="datepicker form-control" name="dateStart" id="txtDateStart">
		                </div>
		                <div class="form-group col-md-3">
		                	<label for="txtDateEnd">End Date</label>
		                	<input type="text" class="datepicker form-control" name="dateEnd" id="txtDateEnd">
		                </div>
		            </div>
		            <div class="box-footer">
		            	<button type="submit" class="btn btn-primary">Submit</button>
		            </div>
		        </form>
			</div>
		</div>
	</section>
@endsection

@section('css')
	<style>
		select.icon-menu option {
			background-repeat:no-repeat;
			background-position:bottom left;
			padding-left:30px;
		}
	</style>
	<link rel="stylesheet" href="../vendor/flag-icon-css-master/css/flag-icon.min.css">
	<link rel="stylesheet" href="../vendor/country-select-js-master/build/css/countrySelect.min.css">
	<link rel="stylesheet" href="../vendor/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection

@section('js')
	<script src="../vendor/country-select-js-master/build/js/countrySelect.min.js"></script>
	<script src="../vendor/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="../vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script>
		$("#cboCountry").countrySelect();
		$(".datepicker").datepicker({
			autoclose: true
		});

		$(document).ready(function () {
			setCountry();
		})

		function setCountry() {
			$('#countryId').val($("#cboCountry").countrySelect("getSelectedCountryData").iso2);
		}
	</script>
@endsection
