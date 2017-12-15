@extends('admin.layout.master')

@section('content')
	<section class="content-header">
	  <h1>
	    Create A Team
	    <small>Teamsssssss</small>
	  </h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row col-md-12">
			<div class="box box-success">
				<form id="team-form" class="form" method="post" action="{{ url('teams') }}">
					
		            <div class="box-body">
		            	<div class="form-group col-md-6">
		                	<label for="txtName">Team Name</label>
		                	<input type="text" name="name" class="form-control" id="txtName" placeholder="Enter Team Name">
		                </div>
		                <div class="form-group col-md-6">
		                	<label for="txtName">Short Name</label>
		                	<input type="text" name="shortName" class="form-control" id="txtName" placeholder="Enter Short Name">
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
		                	<label for="txtName">Logo</label>
		                	<input type="text" name="logo" class="form-control" id="txtLogo" placeholder="Enter Image Link">
		                </div>
		                <div class="form-group col-md-6">
		                	<label for="cboCountry">Team Country</label>
		                	<br>
		                	<input type="text" class="form-control" name="country" id="cboCountry" onchange="setCountry()">
		                	<input type="hidden" name="countryId" id="countryId">
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
		$("#tblTeam").DataTable()

		$(document).ready(function () {
			setCountry();
		})

		function setCountry() {
			$('#countryId').val($("#cboCountry").countrySelect("getSelectedCountryData").iso2);
		}
	</script>
@endsection
