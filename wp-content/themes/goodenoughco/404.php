<?php get_header(); ?>

<style type="text/css">
.error-page {
	background: url(/wp-content/themes/rokt-redesign/images/atlas-green-1507.jpg) no-repeat center right fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    height: 100vh;
    width: 100%;
}

@media screen and (max-width: 768px) {
	.error-page {
		background-position: center right -270px;
    	margin-bottom: -16px;
	}
}

@media screen and (max-width: 414px) {
	.error-page {
		background-position: center right -98px;
	}
}

@media screen and (max-width: 375px) {
	.error-page {
		background-position: center right -165px;
	}
}

.error-page .col-error-page {
	padding-top: 173px;
	color: white;
}

.col-error-page h1 {
	font-size: 45px;
	margin-bottom: 96px;
	font-weight: 700;
  text-transform: none;
}

.col-error-page h2 {
	font-size: 28px;
	margin-bottom: 69px;
	font-weight: bold;
}

.col-error-page h3 {
	font-size: 26px;
	font-weight: 400;
	text-transform: none;
}

.col-error-page h3 a {
	font-weight: bold;
	color: white;
}

.col-error-page h3 a:hover {
	color: #d41870;
}
</style>

<section id="generic-template 404-template" class="error-page">
	<div class="container">
		<div class="row">
			<div class="col col-error-page">
				<h2>ERROR 404</h2>
				<h1>Oops! You’ve made a wrong turn!</h1>
				<?php the_field( 'page_not_found', 'option' ); ?>
				<h3>Click <a href="<?php echo site_url(); ?>">here</a> to go back to the homepage</h3>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
