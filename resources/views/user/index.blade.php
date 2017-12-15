@extends('user.layout.master')

@section('content')
	<section>
		<div id="main-slider" class="owl-carousel owl-theme owl-banner-carousel owl-middle-narrow owl-home-slide" style="height:100vh;">
		    <div class="item owl-item" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://cdn.vox-cdn.com/thumbor/Xxgg8_tulVZ1EVtce2pdEEmkH1M=/0x0:2048x1365/1200x800/filters:focal(937x376:1263x702)/cdn.vox-cdn.com/uploads/chorus_image/image/55994375/28955479425_592ef36301_k.0.jpg') no-repeat center; background-size: cover; height:100vh; width:100vw; display: table-cell; vertical-align: middle; text-align: center;" data-dot=''>
		    	<div class="main-slider-caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="match-date">26 Sep 2016 / 9:30 PM / city arena</div>
                                <div class="team-main"> Natus Vincere
                                    <div class="big-count">2:1</div>
                                    Evil Geniuses
                                </div><br>
                                <div class="booking">
                                    <a href="matches-list.html">
                                        Match Page
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
		    </div>
		    <div class="item owl-item" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('http://pinoyteens.net/wp-content/uploads/2017/08/dota-2-the-international-2016.jpg') no-repeat center; background-size: cover; height:100vh; width:100vw; display: table-cell; vertical-align: middle; text-align: center;" data-dot=''>
		    </div>
		    <div class="item owl-item" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://rog.asus.com/wp-content/uploads/2015/11/Dota-2.jpg') no-repeat center; background-size: cover; height:100vh; width:100vw; display: table-cell; vertical-align: middle; text-align: center;" data-dot=''>
		    </div>
		</div>
		<div class="dotsCont row row-eq-height">
			<div class="dot-content col-md-4">				
				<span class="teams-wrap" style="width: 100%;display: inline-block;">
					<span class="team">
						<img src="/img/team/NaVi.png" style="max-height: 50px;wimax-dth:100%">
					</span>
					<span class="score">
						<b><u><span class="championship">Recent Match</span></u></b>
						<span class="matchtype">The International</span><br>
						<span class="badge">2:1</span><br>
						<span class="game-result">Group Stage</span>
					</span>
					<span class="team1">
						<span>
							<img src="/img/team/EG.png" style="max-height: 50px;wmax-idth:100%">
						</span>
					</span>
				</span>				
			</div>
			<div class="dot-content col-md-4">				
				<span class="teams-wrap" style="width: 100%;display: inline-block;">
					<span class="team">
						<img src="/img/team/Liquid.png" style="max-height: 50px; max-width: 100%">
					</span>
					<span class="score">
						<b><u><span class="championship">Ongoing Match</span></u></b>
						<span class="matchtype">Midas Mode</span><br>
						<span class="badge">12:10:59</span><br>
						<span class="game-result">Group Stage</span>
					</span>
					<span class="team1">
						<span>
							<img src="/img/team/OG.png" style="max-height: 50px; max-width: 100%">
						</span>
					</span>
				</span>				
			</div>
			<div class="dot-content col-md-4">				
				<span class="teams-wrap" style="width: 100%;display: inline-block;">
					<span class="team">
						<img src="/img/team/Newbee.png" style="max-height: 50px; max-width: 100%">
					</span>
					<span class="score">
						<b><u><span class="championship">Upcoming Match</span></u></b>
						<span class="matchtype">StarLadder i-League</span><br>
						<span class="badge">BO3</span><br>
						<span class="game-result">Quarter Final</span>
					</span>
					<span class="team1">
						<span>
							<img src="/img/team/Complexity.png" style="max-heigmax-ht: 50px; width: 100%">
						</span>
					</span>
				</span>				
			</div>
		</div>
	</section>
@endsection

@section('css')
	<link rel="stylesheet" href="../vendor/OwlCarousel2-2.2.1/dist/assets/owl.carousel.min.css">	
	<style>
		.main-slider-caption {
			position: absolute;
		    top: 50%;
		    transform: translateY(-50%);
		    left: 0;
		    right: 0;
		    color: #e5e5e5;
		    text-align: left;
		}

		.main-slider-caption .booking a {
		    padding: 15px 24px 15px 24px;
		    background: #b44335;
		    overflow: hidden;
		    border-radius: 23px;
		    color: #fff;
		    font-size: 16px;
		    font-family: Raleway,sans-serif;
		    text-transform: uppercase;
		}

		.main-slider-caption .match-date {
		    padding-bottom: 2px;
		    font-size: 16px;
		    text-transform: uppercase;
		    font-family: Raleway,sans-serif;
		    color: #fff;
		}

		.main-slider-caption .team-main {
		    font-size: 40px;
		    text-transform: uppercase;
		    font-family: Raleway,sans-serif;
		    color: #fff;
		    font-weight: 800;
		    line-height: normal;
		}

		.main-slider-caption .team-main .big-count {
		    padding: 0 20px;
		    text-align: center;
		    display: inline-block;
		    font-size: 32px;
		    color: #292929;
		    line-height: 60px;
		    border-radius: 10px;
		    background: #e5e5e5;
		}

		.dotsCont {
			text-align: center;
			position: absolute;
			width: 70%;
			top: 80vh;
			margin-left: 15%;
			margin-right: 15%;
			z-index: 999;
			cursor: pointer;
		}

		.owl-dots {
			text-align: center;
			position: absolute;
			top: 80vh;
			left: 0;
			right: 0;
		}

		.owl-dot {
			text-align: center;
			display: inline-table;
		}

		.nav-item span {
			color: white;
		}

		.team {
			width: 20%;
			display: inline-block;
			font-size: 12px;
			font-family: Raleway,sans-serif;
			text-transform: uppercase;
			color: #e5e5e5;
			text-align: left;
		}

		.team1 {
			width: 20%;
			display: inline-block;
			font-size: 12px;
			font-family: Raleway,sans-serif;
			text-transform: uppercase;
			color: #e5e5e5;
			text-align: right;
		}

		.score {
			width: 50%;
    		display: inline-block;
    		font-size: 12px;
    		font-family: Raleway,sans-serif;
    		text-transform: uppercase;
    		color: #e5e5e5;
    		text-align: center;
			vertical-align: middle;
			line-height: normal;
		}

		.dot-content {
			padding: 15px 30px 15px 30px;
			display: block;
			background-color: rgba(22,22,22,.5);
			box-sizing: border-box;
			color: white;
			margin-bottom: -99999px;
		}

		.championship, .game-result .matchtype {    		
    		color: #fff;
    		line-height: normal;
    		font-family: Raleway,sans-serif;
    		display: block;
    		text-transform: uppercase;
    		text-align: center;
		}

		.matchtype {
			font-size: 10px;
			margin-bottom: 5px;
		}

		.game-result {
			font-size: 10px;
			margin-top: 5px;
		}

		.banner-content {
			position: absolute;
    		top: 50%;
    		transform: translateY(-50%);
    		left: 0;
    		right: 0;
    		color: #e5e5e5;
		}
	</style>
@endsection

@section('js')
	<script src="../vendor/OwlCarousel2-2.2.1/dist/owl.carousel.min.js"></script>
	<script src="../vendor/OwlCarousel2-2.2.1/src/js/owl.navigation.js"></script>
	<script type="text/javascript">
		$('.owl-carousel').owlCarousel({
		    items: 1,
		    loop: true,
		    dots: true,
		    dotsData: true,
		    dotsContainer: '.dotsCont',
		    autoplay:true,
			autoplayTimeout:3000,
			autoplayHoverPause:true
		})
    </script>
@endsection