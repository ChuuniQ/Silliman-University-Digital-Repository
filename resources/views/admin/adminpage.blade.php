@extends('layouts.main')

@section('content')
    
<div class="profileCont">

	<div class="profileCard">
		<input id="profView" type="checkbox">

			<div class="placeholderPic">
				<img src="/img/user.png" alt="">
			</div>

			<div class="userName">@ {{ Auth::user()->UserName }}</div>

			<div class="fullNameBlock">
				<div class="firstName">
					<h2>{{ Auth::user()->FirstName }}</h2>
				</div>

				<div class="midLastName">
					<h2>{{ Auth::user()->MiddleName }}</h2>
					<h2>{{ Auth::user()->LastName }}</h2>
				</div>
			</div>

			<div class="changePwBlock">
					<button class="redBtn" id="modalBtn">Change Password</button>
					@if(Auth::user()->isAdmin == '1')
					<br>
					<br>
					<button class="dashBtn redBtn" onclick="location.href='{{route('MyProfile')}}'">User Dashboard</button>
					@endif
			</div>

			<div id="myModal" class="modal">
			<div class="modal-content">
					  	<span class="close">&times;</span>
					  	<div class="modalinfoCont">

							<h2>Change Password</h2>

							<form class="newpassInput" action ="{{ route('passupdate') }}" method ="POST">
								@csrf
								
								<div class="group">      
									<input class="inputInfo" type="password" name="oldpassword" required>
									<span class="highlight"></span>
									<span class="bar"></span>
									<label class="infoLabel">Old Password</label>
								</div>

								<div class="group">      
									<input class="inputInfo" id="inputID" type="password" name="newpassword" required>
									<span class="highlight"></span>
									<span class="bar"></span>
									<label class="infoLabel">New Password</label>
								</div>

								<div class="group">      
									<input class="inputInfo" id="inputID" type="password" name="confirmnewpass" required>
									<span class="highlight"></span>
									<span class="bar"></span>
									<label class="infoLabel">Confirm New Password</label>
								</div>

								<br>
								<br>

								<button class="redBtn" type="submit">Change</button>
							</form>
						</div>
					</div>
			</div>

			<div class="colEmailBlock">
				<div class="userTypeBlock">
					<div>{{ Auth::user()->UserType }}</div>
				</div>
				
					@if(Auth::user()->UserType == 'Student')

				<div>{{ Auth::user()->college }}</div>

					@endif
				<div>{{ Auth::user()->email }}</div>
			</div>

		<label class="profDown" for="profView"></label>
	</div>

	<div class="userFunctionsCard">

		<div class="container">
			<div class="content">
				<input type="radio" name="slider" checked id="blockSection1">
				<input type="radio" name="slider" id="blockSection2">
				<input type="radio" name="slider" id="blockSection3">

				<div class="list">

					<label for="blockSection1" class="blockSection1">
					<i class="fas fa-solid fa-plus"></i>
					<span class="title">Maintain Papers</span>
					</label>

					<label for="blockSection2" class="blockSection2">
						<span class="icon"><i class="fa-solid fa-chart-line"></i></span>
						<span class="title">Analytics</span>
					</label>
					<div class="sliderAdmin"></div>
				</div>

				<div class="text-content">
					<div class="blockSection1 text">
						<div class="title">Maintain Papers</div>
						
						@include('admin.mpm')

					</div>

					<div class="blockSection2 text">
						<div class="title">Analytics</div>

						@include('statistics.stats')

					</div>
				</div>
			</div>
		</div>
	</div> 

	<footer id="footer">
		<p>Silliman University Digital Repository</p>
	</footer>

	<script>

		var modal = document.getElementById("myModal");
		var btn = document.getElementById("modalBtn");
		var span = document.getElementsByClassName("close")[0];

		function checkMediaQuery() {
		
			const boxinput1 = document.querySelector('.inputchecker1');
			const boxinput2 = document.querySelector('.inputchecker1');

			if (window.innerWidth <= 768) {
				if (boxinput1 === document.activeElement) {
					document.getElementById("footer").style.display = "none";
				} else if (boxinput2 === document.activeElement) {
					document.getElementById("footer").style.display = "none";
				}
			}
		}
		window.addEventListener('resize', checkMediaQuery);

		btn.onclick = function() {
		modal.style.display = "block";
		}

		span.onclick = function() {
		modal.style.display = "none";
		}

	</script>

</div>
@endsection
