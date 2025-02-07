<?php
if (isset($_GET['pages'])) {
	switch ($_GET['pages']) {

		case "controller_home";
			include("module/home/" . $_GET['page'] . ".php	");
			break;
		case "services";
			include("module/services/" . $_GET['pages'] . ".php");
			break;
			// case "aboutus";
			// 	include("module/aboutus/" . $_GET['page'] . ".php");
			// 	break;
			// case "contactus";
			// 	include("module/contact/" . $_GET['page'] . ".php");
			// 	break;

		case "about";
			include("module/about/" . $_GET['pages'] . ".html");
			break;
		case "team";
			include("module/team/" . $_GET['pages'] . ".html");
			break;
		case "testimonials";
			include("module/testimonials/" . $_GET['pages'] . ".html");
			break;
		case "portfolio";
			include("module/portfolio/" . $_GET['pages'] . ".html");
			break;
		case "portfolio-details";
			include("module/portfolio-details/" . $_GET['pages'] . ".html");
			break;
		case "pricing";
			include("module/pricing/" . $_GET['pages'] . ".html");
			break;
		case "blog";
			include("module/blog/" . $_GET['pages'] . ".html");
			break;
		case "blog-single";
			include("module/blog-single/" . $_GET['pages'] . ".html");
			break;
		case "contact";
			include("module/contact/" . $_GET['pages'] . ".html");
			break;
		case "404";
			include("view/inc/error" . $_GET['pages'] . ".php");
			break;
		case "503";
			include("view/inc/error" . $_GET['pages'] . ".php");
			break;
		default;
			include("module/home/controller_home.php");
			break;
	}
} else {
	include("module/home/controller_home.php");
}
