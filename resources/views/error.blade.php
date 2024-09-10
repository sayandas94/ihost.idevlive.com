<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Network Error</title>

	<!-- Icon -->
	<link rel="icon" href="https://ihost.idevlive.com/assets/favicon.ico" type="image/x-icon">

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap');
		section {
			font-family: 'Jost', sans-serif;
			height: 100svh;
			width: 100vw;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			text-align: center;
		}
	</style>
	<section>
		<img src="{{ asset('images/website/network-error.svg') }}" alt="" style="width: 20%">
		<h5>Network Error</h5>
		<p><a href="{{ url()->previous() }}" class="black-text">Click here to reload the page</a></p>
	</section>
</body>
</html>