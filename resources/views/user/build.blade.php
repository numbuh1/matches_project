@extends('user.layout.master')

@section('content')
	<section class="section-background">
		<div class="well section-main">
			<div id="form" class="form">
				<input class="form-input form-header" style="width:50%; height:40px; font-size:30px" id="txtHeader" value="Heroes Strategy"/>
				<br>
			</div>			
			<br>
			<div id="btnAddCategory" class="btn col-md-6">
				<img src="/img/gif/plus.svg" height="50"/>
				Add Category
			</div>
			<div id="btnSaveBuild" class="btn col-md-6">
				<img src="/img/gif/save.svg" height="50"/>
				Save Build
				<a id="downloadAnchorElem" style="display:none"></a>
			</div>
		</div>
		<div class="well section-main hidden">
			<div id="buildForm" class="form">
				<h1 id="header"></h1>

				<!-- Content -->

			</div>			
		</div>
	</section>
@endsection

@section('css')
	<style>
		.ui-tooltip {
		    white-space: pre-line;
		}

		.item-images {
			cursor:url("./img/gif/trash.svg"),pointer;
		}

		html {
			background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://wallpaperscraft.com/image/dota_2_game_logo_background_92935_1920x1080.jpg') center;
			background-size: cover;
			background-attachment: fixed;
			overflow-y: scroll;
		}

		.section-background {
			color: yellow;
			font-family: "Verdana", Geneva, sans-serif;
		}

		.section-main {
			background-color:rgba(100, 30, 22, 0.5);
			position: absolute;
			width: 70%;
			top: 10vh;
			margin-left: 15%;
			margin-right: 15%;
		}

		.pane-category {
			background-color:rgba(100, 30, 22, 0.5);
			width: 90%;
			margin-left: 5%;
			margin-right: 5%;
		}

		.form-input {
			border: none;
			background: none;
			border-bottom: 1px solid yellow;
			color: yellow;
		}

		.form-input:focus {
			border-bottom: 1px solid yellow;
			outline: none;
		}

		.btn {
			cursor: pointer;
			font-family: "Verdana", Geneva, sans-serif;
		}

		.btn:hover {
			color: white;
		}

		option {
			background-color: darkred;
		}

		.hidden {
			display: none;
		}
	</style>
@endsection

@section('js')
	<script src="../vendor/OwlCarousel2-2.2.1/dist/owl.carousel.min.js"></script>
	<script src="../vendor/OwlCarousel2-2.2.1/src/js/owl.navigation.js"></script>
	<script src="../js/impact/json2.js"></script>
	<script type="text/javascript">


		$( function() {
			$( document ).tooltip({
				track: true
			});
		} );

		var globalVar = {
			"Name": $('#txtHeader').val(),
			"Categories": []
		};

		var categoryId = 0;
		var subCategoryId = 0;

		$( "header" ).hide();
		$( "footer" ).hide();

		$( "#btnSaveBuild" ).click(function() {

			globalVar.Name = $('#txtHeader').val();
			for (var i = 0; i < globalVar.Categories.length; i++) {
				var id = globalVar.Categories[i].Id;
				globalVar.Categories[i].Name = $('#txtCategory-' + id).val();
				for (var j = 0; j < globalVar.Categories[i].Sub.length; j++) {
					var subId = globalVar.Categories[i].Sub[j].Id;
					globalVar.Categories[i].Sub[j].Name = $('#txtSubCategory-' + id + '-' + subId).val();
				}
			}

			var dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(globalVar));
			var dlAnchorElem = document.getElementById('downloadAnchorElem');
			dlAnchorElem.setAttribute("href",     dataStr     );
			dlAnchorElem.setAttribute("download", "build.json");
			dlAnchorElem.click();

		});

		$( "#btnAddCategory" ).click(function() {

			$( "#form" ).append(
				'<div class="pane-outer-category"><br><div class="pane-category row well">' +
					'<input class="form-category-id" type="hidden" value="' + categoryId + '">' +
					'<input id="txtCategory-' + categoryId + '" class="form-input form-category" style="width:40%; height:30px; font-size:20px" value="New Category"/>' +
					'<div class="btn btn-remove-cat" onclick="removeCategory(this)"><img src="/img/gif/minus.svg" height="50"/>Remove Category</div><br>' +
					'<div class="row col-md-12">Number of column: ' +
					'<select id="cboCategoryCol-' + categoryId + '" class="form-input form-col" onchange="changeColNumber(this, ' + categoryId + ')">' +
						'<option value="1">1</option>' +
						'<option value="2">2</option>' +
						'<option value="3">3</option>' +
					'</select>' +
					'<div class="btn btn-add-sub" onclick="addSubCategory(this, ' + categoryId + ')"><img src="/img/gif/plus.svg" height="50"/>Add Sub Category</div></div>' +
				'</div></div>');

			var category = {
				"Id": categoryId,
				"Name": $('#txtCategory-' + categoryId).val(),
				"Col": $('#cboCategoryCol-' + categoryId).val(),
				"Sub": []
			};
			globalVar.Categories.push(category);
			categoryId++;
		});

		function getId(e) {
			return $(e).parent().closest('.pane-category').find('.form-category-id').val();
		}

		function getCategoryIndex(id) {
			return globalVar.Categories.findIndex(function(o){return o.Id === id;});
		}

		function getSubCategoryIndex(categoryIndex, subId) {
			return globalVar.Categories[categoryIndex].Sub.findIndex(function(o){return o.Id === subId;});
		}

		function getItemIndex(categoryIndex, subId, itemId, type) {
			switch(type) {
				case "Cores":
					return globalVar.Categories[categoryIndex].Sub[subId].Cores.findIndex(function(o){return o.id === itemId;});
					break;
				case "Offlanes":
					return globalVar.Categories[categoryIndex].Sub[subId].Offlanes.findIndex(function(o){return o.id === itemId;});
					break;
				case "Supports":
					return globalVar.Categories[categoryIndex].Sub[subId].Supports.findIndex(function(o){return o.id === itemId;});
					break;
				case "Items":
					return globalVar.Categories[categoryIndex].Sub[subId].Items.findIndex(function(o){return o.id === itemId;});
					break;
			}
			return null;
			
		}

		function removeCategory(e) {
			var id = getId(e);
			$(e).parent().closest('.pane-outer-category').remove();
			var myArr = [{id:id}];
			var index = globalVar.Categories.findIndex(function(o){
			     return o.id === id;
			});
			if (index !== -1) myArr.splice(index, 1);
		}

		function addSubCategory(e, categoryId) {
			var id = categoryId;
			var index = getCategoryIndex(id);
			var subId = subCategoryId;

			var col = "";
			var num = $(e).parent().closest('.pane-category').find('.form-col').val();
			switch (num) {
				case "1":
					col = "col-md-12";
					colType = "col-md-2";
					colItem = "col-md-10";
					break;
				case "2":
					col = "col-md-6";
					colType = "col-md-3";
					colItem = "col-md-9";
					break;
				case "3":
					col = "col-md-4";
					colType = "col-md-4";
					colItem = "col-md-8";
					break;
			}			
			$(e).parent().closest('.pane-category').append(
				'<div id="pane-sub-category-' + id + '-' + subId + '" class="pane-sub-category ' + col + '">' +
					'<input class="form-category-sub-id" type="hidden" value="' + subId + '">' +
					'<input id="txtSubCategory-' + id + '-' + subId + '" class="form-input form-sub-category" value="New Sub Category"/>' +
					'<div class="btn btn-remove-sub-cat" onclick="removeSubCategory(this, ' + id + ', ' + subId + ')"><img src="/img/gif/minus.svg" height="50"/></div><br>' +
					'Add type: ' +
					'<select id="cboSubType-' + id + '-' + subId + '" class="form-input form-sub-type" onchange="populateCombobox(this)">' +
						'<option value="core">Cores</option>' +
						'<option value="off">Offlanes</option>' +
						'<option value="sp">Supports</option>' +
						'<option value="item">Items</option>' +
					'</select>' +
					'<select id="cboSubItem-' + id + '-' + subId + '" class="form-input form-sub-item">' +
					'</select>' +
					'<div class="btn btn-add-sub" onclick="saveSubCategory(this, ' + id + ', ' + subId + ')"><img src="/img/gif/plus.svg" height="50"/>Add</div><br>' +
					'<div class="pane-sub-category-detail hidden">' +
						'<div class="pane-sub-category-core pane-sub-category-core-' + id + '-' + subId + ' hidden">' +
							'<div class="pane-sub-type-' + id + ' ' + colType + '">Cores: </div>' +
							'<div class="pane-sub-item-' + id + ' ' + colItem + ' pane-sub-category-core-image"></div>' +
						'</div>' +
						'<div class="pane-sub-category-offlane pane-sub-category-offlane-' + id + '-' + subId + ' hidden">' +
							'<div class="pane-sub-type-' + id + ' ' + colType + '">Offlanes: </div>' +
							'<div class="pane-sub-item-' + id + ' ' + colItem + ' pane-sub-category-offlane-image"></div>' +
						'</div>' +
						'<div class="pane-sub-category-support pane-sub-category-support-' + id + '-' + subId + ' hidden">' +
							'<div class="pane-sub-type-' + id + ' ' + colType + '">Supports: </div>' +
							'<div class="pane-sub-item-' + id + ' ' + colItem + ' pane-sub-category-support-image"></div>' +
						'</div>' +
						'<div class="pane-sub-category-item pane-sub-category-item-' + id + '-' + subId + ' hidden">' +
							'<div class="pane-sub-type-' + id + ' ' + colType + '">Items: </div>' +
							'<div class="pane-sub-item-' + id + ' ' + colItem + ' pane-sub-category-item-image"></div>' +
						'</div>' +
					'</div>' +
				'</div>');
			populateCombobox(e);

			var sub = {
				"Id": subId,
				"Name": $('#txtSubCategory-' + id + '-' + subId).val(),
				"Cores": [],
				"Offlanes": [],
				"Supports": [],
				"Items": []
			};
			globalVar.Categories[index].Sub.push(sub);

			subCategoryId++;
		}

		function saveSubCategory(e, categoryId, subId) {
			var index = getCategoryIndex(categoryId);
			var subIndex = getSubCategoryIndex(index, subId);
			var itemId = $('#cboSubItem-' + categoryId + '-' + subId).val();
			var itemType = $('#cboSubType-' + categoryId + '-' + subId).val();
			var itemContent = '';
			$(e).parent().closest('.pane-sub-category').find('.pane-sub-category-detail').removeClass('hidden');
			switch (itemType) {
				case "core":
					$.getJSON( "https://raw.githubusercontent.com/joshuaduffy/dota2api/master/dota2api/ref/heroes.json", function( data ) {
						$.each( data.heroes, function( key, val ) {
							if(val.id == itemId) {								
								itemContent = '<img title="' + val.localized_name + '\n(Click to remove)" class="item-images" id="item-' + categoryId + '-' + subId + '-' + itemType + '-' + itemId + '" onclick="removeItem(' + categoryId + ',' + subId + ',' + itemId + ', \'Cores\')" src="' + val.url_small_portrait + '">';
								globalVar.Categories[index].Sub[subIndex].Cores.push(val);
								$(e).parent().closest('.pane-sub-category').find('.pane-sub-category-core').removeClass('hidden');
								$(e).parent().closest('.pane-sub-category').find('.pane-sub-category-core-image').append(itemContent);
							}
						});
					});
					break;
				case "off":
					$.getJSON( "https://raw.githubusercontent.com/joshuaduffy/dota2api/master/dota2api/ref/heroes.json", function( data ) {
						$.each( data.heroes, function( key, val ) {
							if(val.id == itemId) {
								itemContent = '<img title="' + val.localized_name + '\n(Click to remove)"  class="item-images" id="item-' + categoryId + '-' + subId + '-' + itemType + '-' + itemId + '" onclick="removeItem(' + categoryId + ',' + subId + ',' + itemId + ', \'Offlanes\')" src="' + val.url_small_portrait + '">';
								globalVar.Categories[index].Sub[subIndex].Offlanes.push(val);
								$(e).parent().closest('.pane-sub-category').find('.pane-sub-category-offlane').removeClass('hidden');
								$(e).parent().closest('.pane-sub-category').find('.pane-sub-category-offlane-image').append(itemContent);
							}
						});
					});
					break;
				case "sp":
					$.getJSON( "https://raw.githubusercontent.com/joshuaduffy/dota2api/master/dota2api/ref/heroes.json", function( data ) {
						$.each( data.heroes, function( key, val ) {
							if(val.id == itemId) {
								itemContent = '<img title="' + val.localized_name + '\n(Click to remove)"  class="item-images" id="item-' + categoryId + '-' + subId + '-' + itemType + '-' + itemId + '" onclick="removeItem(' + categoryId + ',' + subId + ',' + itemId + ', \'Supports\')" src="' + val.url_small_portrait + '">';
								globalVar.Categories[index].Sub[subIndex].Supports.push(val);
								$(e).parent().closest('.pane-sub-category').find('.pane-sub-category-support').removeClass('hidden');
								$(e).parent().closest('.pane-sub-category').find('.pane-sub-category-support-image').append(itemContent);
							}
						});
					});
					break;
				case "item":
					$.getJSON( "https://raw.githubusercontent.com/joshuaduffy/dota2api/master/dota2api/ref/items.json", function( data ) {
						$.each( data.items, function( key, val ) {
							if(val.id == itemId) {								
								itemContent = '<img title="' + val.localized_name + '\n(Click to remove)"  class="item-images" id="item-' + categoryId + '-' + subId + '-' + itemType + '-' + itemId + '" onclick="removeItem(' + categoryId + ',' + subId + ',' + itemId + ', \'Items\')" src="' + val.url_image + '" style="width: 59px">';
								globalVar.Categories[index].Sub[subIndex].Items.push(val);
								$(e).parent().closest('.pane-sub-category').find('.pane-sub-category-item').removeClass('hidden');
								$(e).parent().closest('.pane-sub-category').find('.pane-sub-category-item-image').append(itemContent);
							}
						});
					});
					break;
			}
		}

		function removeSubCategory(e, categoryId, subId) {
			var index = getCategoryIndex(categoryId);
			var subIndex = getSubCategoryIndex(index, subId);
			globalVar.Categories[index].Sub.splice(subIndex, 1);
			$('#pane-sub-category-' + categoryId + '-' + subId).remove();
		}

		function removeItem(categoryId, subId, itemId, type) {
			var index = getCategoryIndex(categoryId);
			var subIndex = getSubCategoryIndex(index, subId);
			var itemIndex = getItemIndex(categoryId, subId, itemId, type);
			switch(type) {
				case "Cores":
					globalVar.Categories[index].Sub[subIndex].Cores.splice(itemIndex, 1);
					$('#item-' + categoryId + '-' + subId + '-core-' + itemId).remove();
					if(globalVar.Categories[index].Sub[subIndex].Cores.length == 0) {
						 $('.pane-sub-category-core-' + categoryId + '-' + subId).addClass("hidden");
					}
					break;
				case "Offlanes":
					globalVar.Categories[index].Sub[subIndex].Offlanes.splice(itemIndex, 1);
					$('#item-' + categoryId + '-' + subId + '-off-' + itemId).remove();
					if(globalVar.Categories[index].Sub[subIndex].Offlanes.length == 0) {
						 $('.pane-sub-category-offlane-' + categoryId + '-' + subId).addClass("hidden");
					}
					break;
				case "Supports":
					globalVar.Categories[index].Sub[subIndex].Supports.splice(itemIndex, 1);
					$('#item-' + categoryId + '-' + subId + '-sp-' + itemId).remove();
					if(globalVar.Categories[index].Sub[subIndex].Supports.length == 0) {
						 $('.pane-sub-category-support-' + categoryId + '-' + subId).addClass("hidden");
					}
					break;
				case "Items":
					globalVar.Categories[index].Sub[subIndex].Items.splice(itemIndex, 1);
					$('#item-' + categoryId + '-' + subId + '-item-' + itemId).remove();
					if(globalVar.Categories[index].Sub[subIndex].Items.length == 0) {
						 $('.pane-sub-category-item-' + categoryId + '-' + subId).addClass("hidden");
					}
					break;
			}
		}

		function getItem(id, type) {
			switch (type) {
				case "core":
					return getHeroById(id);
					break;
				case "off":
					return getHeroById(id);
					break;
				case "sp":
					return getHeroById(id);
					break;
				case "items":
					return getItemById(id);
					break;
			}
		}

		function getHeroById(id) {
			$.getJSON( "https://raw.githubusercontent.com/joshuaduffy/dota2api/master/dota2api/ref/heroes.json", function( data ) {
				$.each( data.heroes, function( key, val ) {					
					if(val.id.equals(id)) {
						return val;
					}
				});
			});
		}

		function getItemById(id) {
			$.getJSON( "https://raw.githubusercontent.com/joshuaduffy/dota2api/master/dota2api/ref/items.json", function( data ) {
				$.each( data.heroes, function( key, val ) {
					if(val.id == id) {
						return val;
					}
				});
			});
		}

		function changeColNumber(e, id) {
			var listSub = $(e).parent().closest('.pane-category').find('.pane-sub-category');
			var num = $(e).parent().closest('.pane-category').find('.form-col').val();
			switch (num) {
				case "1":
					col = "col-md-12";
					colType = "col-md-2";
					colItem = "col-md-10";
					break;
				case "2":
					col = "col-md-6";
					colType = "col-md-3";
					colItem = "col-md-9";
					break;
				case "3":
					col = "col-md-4";
					colType = "col-md-4";
					colItem = "col-md-8";
					break;
			}
			$(e).parent().closest('.pane-category').find('.pane-sub-category').removeClass('col-md-12');
			$(e).parent().closest('.pane-category').find('.pane-sub-category').removeClass('col-md-6');
			$(e).parent().closest('.pane-category').find('.pane-sub-category').removeClass('col-md-4');
			$(e).parent().closest('.pane-category').find('.pane-sub-category').addClass(col);

			var index = getCategoryIndex(id);

			$('.pane-sub-type-' + id).removeClass("col-md-2");
			$('.pane-sub-type-' + id).removeClass("col-md-3");
			$('.pane-sub-type-' + id).removeClass("col-md-4");
			$('.pane-sub-item-' + id).removeClass("col-md-10");
			$('.pane-sub-item-' + id).removeClass("col-md-9");
			$('.pane-sub-item-' + id).removeClass("col-md-8");

			$('.pane-sub-type-' + id).addClass(colType);
			$('.pane-sub-item-' + id).addClass(colItem);

			globalVar.Categories[index].Col = num;
		}

		function populateCombobox(e) {
			var items = [];
			if($(e).val() != "item") {
				$.getJSON( "https://raw.githubusercontent.com/joshuaduffy/dota2api/master/dota2api/ref/heroes.json", function( data ) {
					data.heroes.sort(SortByName);
					$.each( data.heroes, function( key, val ) {
						items.push( "<option value='" + val.id + "'>" + val.localized_name + "</option>" );
					});
					$(e).parent().closest('.pane-category').find('.form-sub-item').html(items);
				});
			} else {
				$.getJSON( "https://raw.githubusercontent.com/joshuaduffy/dota2api/master/dota2api/ref/items.json", function( data ) {	
					data.items.sort(SortByName);
					$.each( data.items, function( key, val ) {
						items.push( "<option value='" + val.id + "'>" + val.localized_name + "</option>" );
					});
					$(e).parent().closest('.pane-category').find('.form-sub-item').html(items);
				});
			}
		}

		function SortByName(a, b){
			var aName = a.localized_name.toLowerCase();
			var bName = b.localized_name.toLowerCase(); 
			return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
		}
    </script>
@endsection