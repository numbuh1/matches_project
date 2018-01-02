@extends('user.layout.master')

@section('content')
	<div id="section-background" class="row">

	</div>
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
			font-family: 'Arial Unicode MS';
			overflow-y: scroll;
		}
	</style>
@endsection

@section('js')
	<script>
		window.fbAsyncInit = function() {
		FB.init({
		  appId            : '164484687312690',
		  autoLogAppEvents : true,
		  xfbml            : true,
		  version          : 'v2.11'
		});
		};

		(function(d, s, id){
		 var js, fjs = d.getElementsByTagName(s)[0];
		 if (d.getElementById(id)) {return;}
		 js = d.createElement(s); js.id = id;
		 js.src = "https://connect.facebook.net/en_US/sdk.js";
		 fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<script type="text/javascript">
		$.ajaxSetup({
			async: false
		});

		var count = 0;
		var posts = [];
		var res = null;

		function getData() {
			var next = "";
							
			FB.api(
			  '/Dota2QuotesVN/posts',
			  'GET',
			  {
			  	"limit":"1",
			  	"access_token":"EAACEdEose0cBAFWKhAIZCR4xTx4hSNK2ceyCXssWdt7xYDQ89y60k9RMiqOZBqF8wpT1xz9ZBV1mAmTBAtUOSuIW37T4gatGHQkU6L3ZCukuzZBCFDuHbsmPlnbWpciCqMyLf1jfro0ZCQBot09SfOkwC3GI01KjgfrLATAUleeoxMr0iZBNCtCff5FyQSDnZC4ZD",
			  	"since":Math.round((new Date('1/1/2017')).getTime() / 1000),
			  	"until":Math.round((new Date('12/31/2017')).getTime() / 1000)
			  },
			  function(response) {
			  	console.log(response);
			  	next = response.paging.cursors.after;
			  	var data = response.data[0];
			  	FB.api(
				  '/' + data.id + '?fields=comments.limit(1).summary(true),likes.limit(1).summary(true)',
				  'GET',
				  {						  	
				  	"access_token":"EAACEdEose0cBAFWKhAIZCR4xTx4hSNK2ceyCXssWdt7xYDQ89y60k9RMiqOZBqF8wpT1xz9ZBV1mAmTBAtUOSuIW37T4gatGHQkU6L3ZCukuzZBCFDuHbsmPlnbWpciCqMyLf1jfro0ZCQBot09SfOkwC3GI01KjgfrLATAUleeoxMr0iZBNCtCff5FyQSDnZC4ZD"
				  },
				  function(postResponse) {	
				  	res = postResponse;
				  	console.log(postResponse);
				  	var post = {
				  		"data": data.message,
				  		"time": data.created_time,
				  		"likes": postResponse.likes.summary.total_count,
				  		"comments": postResponse.comments.summary.total_count
				  	}				
				  	posts.push(post);
				  	console.log(next);
				  	getData2(next);
				  }
				);
			  }
			);
		}

		function getData2(next) {
			count++;
			if(count < 1000) {
				FB.api(
				  '/Dota2QuotesVN/posts',
				  'GET',
				  {
				  	"limit":"1",
				  	"access_token":"EAACEdEose0cBAFWKhAIZCR4xTx4hSNK2ceyCXssWdt7xYDQ89y60k9RMiqOZBqF8wpT1xz9ZBV1mAmTBAtUOSuIW37T4gatGHQkU6L3ZCukuzZBCFDuHbsmPlnbWpciCqMyLf1jfro0ZCQBot09SfOkwC3GI01KjgfrLATAUleeoxMr0iZBNCtCff5FyQSDnZC4ZD",
				  	"after":next,
				  	"since":Math.round((new Date('1/1/2017')).getTime() / 1000),
				  	"until":Math.round((new Date('12/31/2017')).getTime() / 1000)
				  },
				  function(response) {
				  	next = response.paging.cursors.after;
				  	$.each( response.data, function( key, val ) {
				  		FB.api(
						  '/' + val.id + '?fields=comments.limit(1).summary(true),likes.limit(1).summary(true)',
						  'GET',
						  {						  	
						  	"access_token":"EAACEdEose0cBAFWKhAIZCR4xTx4hSNK2ceyCXssWdt7xYDQ89y60k9RMiqOZBqF8wpT1xz9ZBV1mAmTBAtUOSuIW37T4gatGHQkU6L3ZCukuzZBCFDuHbsmPlnbWpciCqMyLf1jfro0ZCQBot09SfOkwC3GI01KjgfrLATAUleeoxMr0iZBNCtCff5FyQSDnZC4ZD"
						  },
						  function(postResponse) {	
						  	var post = {
						  		"data": val.message,
						  		"time": val.created_time,
						  		"likes": postResponse.likes.summary.total_count,
						  		"comments": postResponse.comments.summary.total_count
						  	}			
						  	posts.push(post);			  	
						  	console.log(next);
						  	getData2(next);
						  }
						);
				  	});
				  }
				);
			}
		}

		function SortByLikes(a, b){
		  var aName = a.likes;
		  var bName = b.likes; 
		  return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
		}

		function SortByComments(a, b){
		  var aName = a.comments;
		  var bName = b.comments; 
		  return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
		}
    </script>
@endsection