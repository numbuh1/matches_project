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
				<form id="team-form" class="form" method="post" action="{{ url('matches') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <div class="box-body">
		            	<div class="form-group col-md-6">
		                	<label for="cboLeague">League</label>
		                	<select id="cboLeague" name="league" class="form-control icon-menu">
		                		<option value=""></option>
                                @foreach($league as $key => $val)
                                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                                @endforeach
		                	</select>
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
		                	<label for="cboTeam1">Team 1</label>
		                	<select id="cboTeam1" name="team1" class="form-control icon-menu">
		                		<option value=""></option>
                                @foreach($team as $key => $val)
                                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                                @endforeach
		                	</select>
		                </div>
		                <div class="form-group col-md-6">
		                	<label for="cboTeam2">Team 2</label>
		                	<select id="cboTeam2" name="team2" class="form-control icon-menu">
		                		<option value=""></option>
                                @foreach($team as $key => $val)
                                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                                @endforeach
		                	</select>
		                </div>
		                <div class="form-group col-md-6">
		                	<label for="txtDateStart">Format</label>
		                	<input type="text" class="timepicker form-control" name="format" id="txtFormat">
		                </div>
		                <div class="form-group col-md-3">
		                	<label for="txtDateStart">Time</label>
		                	<input type="text" class="timepicker form-control" name="time" id="txtTime">
		                </div>
		                <div class="form-group col-md-3">
		                	<label for="txtDateEnd">Date</label>
		                	<input type="text" class="datepicker form-control" name="date" id="txtDate">
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
	<link rel="stylesheet" href="../vendor/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../vendor/bootstrap-timepicker/css/timepicker.less">
@endsection

@section('js')
	<script src="../vendor/country-select-js-master/build/js/countrySelect.min.js"></script>
	<script src="../vendor/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="../vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="../vendor/inputmask/dist/jquery.inputmask.bundle.js"></script>
	<script>
		$("#cboCountry").countrySelect();
		$(".datepicker").datepicker({
			autoclose: true
		});

		$('#txtTime').inputmask("hh:mm", {
			placeholder: "HH:MM", 
			insertMode: false, 
			showMaskOnHover: true
		});

		$(document).ready(function () {
			setCountry();
		})

		function setCountry() {
			$('#countryId').val($("#cboCountry").countrySelect("getSelectedCountryData").iso2);
		}
	</script>
@endsection
