@extends('includes.us')

@section('title', 'Report Abuse - iHost Policy Violations')

@section('keywords', 'report abuse, report policy violations, iHost abuse policy, domain abuse, hosting abuse, iHost report')
@section('description', 'Report abuse or violations of iHost policies. Help us maintain a safe online environment by reporting misuse of our services.')

@section('content')
<h1 class="hide">Report Abuse and Policy Violations</h1>
<h2 class="hide">How to Report Abuse</h2>
<h2 class="hide">What Violates iHost Policies?</h2>
<h2 class="hide">Frequently Asked Questions About Abuse Reports</h2>

<section class="center-align">
	<div class="container">
		<div class="row">
			<div class="col s12 m8 l6 offset-m2 offset-l3">
				<h3 class="header-text">Report Abuse</h3>
				<p>To report any form of abuse activity (spam, phishing, malware, etc.) with respect to any iHost service, email us at abuse.ihost@idevlive.com or fill the form below.</p>
			</div>

			<div class="col s12 m8 l6 offset-m2 offset-l3">
				<br>
				<div class="card-panel z-depth-0">
					<form action="#!" method="post" name="report-abuse-form">
						<div class="input-field" style="margin-bottom: 36px">
							<select name="type_of_abuse" id="type_of_abuse">
								<option value="" selected disabled>Select the type of abuse</option>
								<option value="Phishing">Phishing</option>
								<option value="Malware">Malware</option>
								<option value="Spam">Spam</option>
								<option value="Inappropriate Content">Inappropriate Content</option>
								<option value="Copyright Infringment">Copyright Infringment</option>
							</select>
						</div>

						<div class="input-field" style="margin-bottom: 36px">
							<input type="text" name="complainant_name" id="complainant_name">
							<label for="complainant_name">Your Name</label>
						</div>

						<div class="input-field" style="margin-bottom: 36px">
							<input type="email" name="complainant_email" id="complainant_email">
							<label for="complainant_email">Your Email</label>
						</div>

						<div class="input-field" style="margin-bottom: 36px">
							<input type="text" name="abuser_website" id="abuser_website">
							<label for="abuser_website">Abuser's Website</label>
						</div>

						<div class="input-field" style="margin-bottom: 36px">
							<textarea class="materialize-textarea" name="comments" id="comments"></textarea>
							<label for="comments">Comments</label>
						</div>

						<div class="input-field">
							<br>
							<button class="btn primary solid" name="submit-btn" value="submit">Report Abuse</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection