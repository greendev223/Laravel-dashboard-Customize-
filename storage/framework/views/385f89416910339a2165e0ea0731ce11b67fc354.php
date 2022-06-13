<?php
$logo = asset(Storage::url('logo'));
$company_favicon = App\Models\Utility::getValByName('company_favicon');

$setting = App\Models\Utility::colorset();
$color = 'theme-3';
if (!empty($setting['color'])) {
    $color = $setting['color'];
}
$SITE_RTL = Cookie::get('SITE_RTL');
if ($SITE_RTL == '') {
    $SITE_RTL = 'off';
}
$cust_darklayout = Cookie::get('cust_darklayout');
if ($cust_darklayout == '') {
    $cust_darklayout = 'off';
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(__('Our')); ?></title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />


    <!-- Favicon icon -->
    <link rel="icon"
        href="<?php echo e($logo . '/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png')); ?>"
        type="image/x-icon" />

	<link rel="stylesheet" href="<?php echo e(asset('assets/css/landing.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/animate.min.css')); ?>" />
    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">



    <?php if(env('SITE_RTL') == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" id="main-style-link">
    <?php else: ?>
        <?php if(isset($setting['cust_darklayout']) && $setting['cust_darklayout'] == 'on'): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
        <?php else: ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
        <?php endif; ?>
    <?php endif; ?>

    
</head>

<body class="<?php echo e($color); ?>">
    <!-- [ Nav ] start -->
    <nav class="navbar navbar-expand-md navbar-dark default top-nav-collapse">
        <div class="container">
            <a class="navbar-brand bg-transparent" href="#">
                <p style="font-size:30px; ">LOGO</p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#layouts">Layouts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonial">Testimonial</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="btn btn-light ms-2 me-1" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="btn btn-light ms-2 me-1"
                            href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ Nav ] start -->
    <!-- [ Header ] start -->
	<div id="header">
		<div class style="position:absolute; padding:120px;" >
			<button class="btn btn-success" style="border-radius:10%; padding:17px;">
				Shop now
			</button>
			<h2 class="text-white mb-sm-4 mt-4 wow animate__fadeInLeft" data-wow-delay="0.4s">
				<?php echo e(__('We can get a lot of products here')); ?><br />
			</h2>
			<p class="text-white mb-sm-4 mt-4 wow animate__fadeInLeft" data-wow-delay="0.6s">
				Use these awesome forms to login or create new account in your project for free.
			</p>
		</div>
		<img class="d-block w-100" src="<?php echo e(asset('assets/images/slider/slider2.jpg')); ?>" alt="Second slide">
	</div>		
    <!-- [ Header ] End -->
    <!-- [ client ] Start -->

	<!-- feature -->
	
	<div class="flex mt-sm-2" style="justify-content:center; text-align:center">
		<img style="width:24%;" src="<?php echo e(asset('assets/images/featuredbanner/feature_clock.jpg')); ?>">
		<img style="width:24%;" src="<?php echo e(asset('assets/images/featuredbanner/feature_bag.jpg')); ?>">
		<img style="width:24%;" src="<?php echo e(asset('assets/images/featuredbanner/feature_lens.jpg')); ?>">
		<img style="width:24%;" src="<?php echo e(asset('assets/images/featuredbanner/feature_trou.jpg')); ?>">
	</div>
    
	<!-- popular products -->
	<section class="section services-section" id="services">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-title">
						<h2>What I Do</h2>
						<p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- feaure box -->
				<div class="col-sm-6 col-lg-4">
					<div class="feature-box-1">
						<div class="icon">
							<i class="fa fa-desktop"></i>
						</div>
						<div class="feature-content">
							<h5>Unique design</h5>
							<p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites.</p>
						</div>
					</div>
				</div>
				<!-- / -->
				<!-- feaure box -->
				<div class="col-sm-6 col-lg-4">
					<div class="feature-box-1">
						<div class="icon">
							<i class="fa fa-user"></i>
						</div>
						<div class="feature-content">
							<h5>Different Layout</h5>
							<p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites.</p>
						</div>
					</div>
				</div>
				<!-- / -->
				<!-- feaure box -->
				<div class="col-sm-6 col-lg-4">
					<div class="feature-box-1">
						<div class="icon">
							<i class="fa fa-comment"></i>
						</div>
						<div class="feature-content">
							<h5>Make it Simple</h5>
							<p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites.</p>
						</div>
					</div>
				</div>
				<!-- / -->
				<!-- feaure box -->
				<div class="col-sm-6 col-lg-4">
					<div class="feature-box-1">
						<div class="icon">
							<i class="fa fa-image"></i>
						</div>
						<div class="feature-content">
							<h5>Responsiveness</h5>
							<p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites.</p>
						</div>
					</div>
				</div>
				<!-- / -->
				<!-- feaure box -->
				<div class="col-sm-6 col-lg-4">
					<div class="feature-box-1">
						<div class="icon">
							<i class="fa fa-th"></i>
						</div>
						<div class="feature-content">
							<h5>Testing for Perfection</h5>
							<p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites.</p>
						</div>
					</div>
				</div>
				<!-- / -->
				<!-- feaure box -->
				<div class="col-sm-6 col-lg-4">
					<div class="feature-box-1">
						<div class="icon">
							<i class="fa fa-cog"></i>
						</div>
						<div class="feature-content">
							<h5>Advanced Options</h5>
							<p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites.</p>
						</div>
					</div>
				</div>
				<!-- / -->
			</div>
		</div>
	</section>




    <!-- [ client ] End -->
    <!-- [ dashboard ] start -->
    <section class="">
        <div class="container">
            <div class="row align-items-center justify-content-end mb-5">
                <div class="col-sm-4">
                    <h1 class="mb-sm-4 f-w-600 wow animate__fadeInLeft" data-wow-delay="0.2s">
                        Dashboard
                    </h1>
                    <h2 class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.4s">
                        All in one place <br />CRM system
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.6s">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                    <div class="my-4 wow animate__fadeInLeft" data-wow-delay="0.8s">
                        <a href="#" class="btn btn-primary" target="_blank"><i class="fas fa-shopping-cart me-2"></i>Buy
                            now</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="<?php echo e(asset('landing/posgo-saas-pic-1.png')); ?>" alt="Datta Able Admin Template"
                        class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.2s" />
                </div>
            </div>
            <div class="row align-items-center justify-content-start">
                <div class="col-sm-6">
                    <img src="<?php echo e(asset('assets/images/front/img-crm-dash-2.svg')); ?>" alt="Datta Able Admin Template"
                        class="img-fluid header-img wow animate__fadeInLeft" data-wow-delay="0.2s" />
                </div>
                <div class="col-sm-4">
                    <h1 class="mb-sm-4 f-w-600 wow animate__fadeInRight" data-wow-delay="0.2s">
                        Dashboard
                    </h1>
                    <h2 class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.4s">
                        All in one place <br />CRM system
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.6s">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                    <div class="my-4 wow animate__fadeInRight" data-wow-delay="0.8s">
                        <a href="#" class="btn btn-primary" target="_blank"><i class="fas fa-shopping-cart me-2"></i>Buy
                            now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ dashboard ] End -->
    <!-- [ feature ] start -->
    <section id="feature" class="feature">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-9 title">
                    <h2>
                        <span class="d-block mb-3">Features</span> All in one place CRM
                        system
                    </h2>
                    <p class="m-0">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="card wow animate__fadeInUp" data-wow-delay="0.2s" style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              ">
                        <div class="card-body">
                            <div class="theme-avtar bg-primary">
                                <i class="ti ti-home"></i>
                            </div>
                            <h6 class="text-muted mt-4">ABOUT</h6>
                            <h4 class="my-3 f-w-600">Feature</h4>
                            <p class="mb-0">
                                Use these awesome forms to login or create new account in your
                                project for free.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card wow animate__fadeInUp" data-wow-delay="0.4s" style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              ">
                        <div class="card-body">
                            <div class="theme-avtar bg-success">
                                <i class="ti ti-user-plus"></i>
                            </div>
                            <h6 class="text-muted mt-4">ABOUT</h6>
                            <h4 class="my-3 f-w-600">Feature</h4>
                            <p class="mb-0">
                                Use these awesome forms to login or create new account in your
                                project for free.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card wow animate__fadeInUp" data-wow-delay="0.6s" style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              ">
                        <div class="card-body">
                            <div class="theme-avtar bg-warning">
                                <i class="ti ti-users"></i>
                            </div>
                            <h6 class="text-muted mt-4">ABOUT</h6>
                            <h4 class="my-3 f-w-600">Feature</h4>
                            <p class="mb-0">
                                Use these awesome forms to login or create new account in your
                                project for free.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card wow animate__fadeInUp" data-wow-delay="0.8s" style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              ">
                        <div class="card-body">
                            <div class="theme-avtar bg-danger">
                                <i class="ti ti-report-money"></i>
                            </div>
                            <h6 class="text-muted mt-4">ABOUT</h6>
                            <h4 class="my-3 f-w-600">Feature</h4>
                            <p class="mb-0">
                                Use these awesome forms to login or create new account in your
                                project for free.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center pt-sm-5">
                <button class="btn px-sm-5 btn-primary me-sm-3">Buy Now</button>
                <button class="btn px-sm-5 btn-outline-primary">
                    View doucmentation
                </button>
            </div>
        </div>
    </section>
    <!-- [ feature ] End -->
    <!-- [ dashboard ] start -->
    <section class="">
        <div class="container">
            <div class="row align-items-center justify-content-end mb-5">
                <div class="col-sm-4">
                    <h1 class="mb-sm-4 f-w-600 wow animate__fadeInLeft" data-wow-delay="0.2s">
                        Dashboard
                    </h1>
                    <h2 class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.4s">
                        All in one place <br />CRM system
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.6s">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                    <div class="my-4 wow animate__fadeInLeft" data-wow-delay="0.8s">
                        <a href="#" class="btn btn-primary" target="_blank"><i
                                class="fas fa-shopping-cart me-2"></i>Buy now</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <img src="<?php echo e(asset('assets/images/front/img-crm-dash-3.svg')); ?>" alt="Datta Able Admin Template"
                        class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.2s" />
                </div>
            </div>
            <div class="row align-items-center justify-content-start">
                <div class="col-sm-6">
                    <img src="<?php echo e(asset('assets/images/front/img-crm-dash-4.svg')); ?>" alt="Datta Able Admin Template"
                        class="img-fluid header-img wow animate__fadeInLeft" data-wow-delay="0.2s" />
                </div>
                <div class="col-sm-4">
                    <h1 class="mb-sm-4 f-w-600 wow animate__fadeInRight" data-wow-delay="0.2s">
                        Dashboard
                    </h1>
                    <h2 class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.4s">
                        All in one place <br />CRM system
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.6s">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                    <div class="my-4 wow animate__fadeInRight" data-wow-delay="0.8s">
                        <a href="#" class="btn btn-primary" target="_blank"><i
                                class="fas fa-shopping-cart me-2"></i>Buy now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ dashboard ] End -->
    <!-- [ price ] start -->
    <section id="price" class="price-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-9 title">
                    <h2>
                        <span class="d-block mb-3">Price</span> All in one place CRM
                        system
                    </h2>
                    <p class="m-0">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s" style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              ">
                        <div class="card-body">
                            <span class="price-badge bg-primary">STARTER</span>
                            <span class="mb-4 f-w-600 p-price">$59<small class="text-sm">/month</small></span>
                            <p class="mb-0">
                                You have Free Unlimited Updates and <br />
                                Premium Support on each package.
                            </p>
                            <ul class="list-unstyled my-5">
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    2 team members
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    20GB Cloud storage
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    Integration help
                                </li>
                            </ul>
                            <div class="d-grid text-center">
                                <button
                                    class="btn mb-3 btn-primary d-flex justify-content-center align-items-center mx-sm-5">
                                    Start with Standard plan
                                    <i class="ti ti-chevron-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card price-card price-2 bg-primary wow animate__fadeInUp" data-wow-delay="0.4s" style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              ">
                        <div class="card-body">
                            <span class="price-badge">STARTER</span>
                            <span class="mb-4 f-w-600 p-price">$59<small class="text-sm">/month</small></span>
                            <p class="mb-0">
                                You have Free Unlimited Updates and <br />
                                Premium Support on each package.
                            </p>
                            <ul class="list-unstyled my-5">
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    2 team members
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    20GB Cloud storage
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    Integration help
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    Sketch Files
                                </li>
                            </ul>
                            <div class="d-grid text-center">
                                <button
                                    class="btn mb-3 btn-light d-flex justify-content-center align-items-center mx-sm-5">
                                    Start with Standard plan
                                    <i class="ti ti-chevron-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card price-card price-3 wow animate__fadeInUp" data-wow-delay="0.6s" style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              ">
                        <div class="card-body">
                            <span class="price-badge bg-primary">STARTER</span>
                            <span class="mb-4 f-w-600 p-price">$119<small class="text-sm">/month</small></span>
                            <p class="mb-0">
                                You have Free Unlimited Updates and <br />
                                Premium Support on each package.
                            </p>
                            <ul class="list-unstyled my-5">
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    2 team members
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    20GB Cloud storage
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    Integration help
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    2 team members
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    20GB Cloud storage
                                </li>
                                <li>
                                    <span class="theme-avtar">
                                        <i class="text-primary ti ti-circle-plus"></i></span>
                                    Integration help
                                </li>
                            </ul>
                            <div class="d-grid text-center">
                                <button
                                    class="btn mb-3 btn-primary d-flex justify-content-center align-items-center mx-sm-5">
                                    Start with Standard plan
                                    <i class="ti ti-chevron-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ price ] End -->
    <!-- [ faq ] start -->
    <section class="faq">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-9 title">
                    <h2><span>Frequently</span>Asked Questions</h2>
                    <p class="m-0">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10 col-xxl-8">
                    <div class="accordion accordion-flush" id="accordionExample">
                        <div class="accordion-item card">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="d-flex align-items-center">
                                        <i class="ti ti-info-circle text-primary"></i> How do I
                                        order?
                                    </span>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It
                                    is shown by default, until the collapse plugin adds the
                                    appropriate classes that we use to style each element. These
                                    classes control the overall appearance, as well as the
                                    showing and hiding via CSS transitions. You can modify any
                                    of this with custom CSS or overriding our default variables.
                                    It's also worth noting that just about any HTML can go
                                    within the <code>.accordion-body</code>, though the
                                    transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item card">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="d-flex align-items-center">
                                        <i class="ti ti-info-circle text-primary"></i> How do I
                                        order?
                                    </span>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong>
                                    It is hidden by default, until the collapse plugin adds the
                                    appropriate classes that we use to style each element. These
                                    classes control the overall appearance, as well as the
                                    showing and hiding via CSS transitions. You can modify any
                                    of this with custom CSS or overriding our default variables.
                                    It's also worth noting that just about any HTML can go
                                    within the <code>.accordion-body</code>, though the
                                    transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item card">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="d-flex align-items-center">
                                        <i class="ti ti-info-circle text-primary"></i> How do I
                                        order?
                                    </span>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It
                                    is hidden by default, until the collapse plugin adds the
                                    appropriate classes that we use to style each element. These
                                    classes control the overall appearance, as well as the
                                    showing and hiding via CSS transitions. You can modify any
                                    of this with custom CSS or overriding our default variables.
                                    It's also worth noting that just about any HTML can go
                                    within the <code>.accordion-body</code>, though the
                                    transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ faq ] End -->
    <!-- [ dashboard ] start -->
    <section class="side-feature">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-3">
                    <h1 class="mb-sm-4 f-w-600 wow animate__fadeInLeft" data-wow-delay="0.2s">
                        Dashboard
                    </h1>
                    <h2 class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.4s">
                        All in one place <br />CRM system
                    </h2>
                    <p class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.6s">
                        Use these awesome forms to login or create new account in your
                        project for free.
                    </p>
                    <div class="my-4 wow animate__fadeInLeft" data-wow-delay="0.8s">
                        <a href="#" class="btn btn-primary" target="_blank"><i
                                class="fas fa-shopping-cart me-2"></i>Buy now</a>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="row feature-img-row">
                        <div class="col-3">
                            <img src="<?php echo e(asset('landing/posgo-saas-pic-1.png')); ?>"
                                class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.2s"
                                alt="Admin" />
                        </div>
                        <div class="col-3">
                            <img src="<?php echo e(asset('landing/posgo-saas-pic-2.png')); ?>"
                                class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.4s"
                                alt="Admin" />
                        </div>
                        <div class="col-3">
                            <img src="<?php echo e(asset('landing/posgo-saas-pic-3.png')); ?>"
                                class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.6s"
                                alt="Admin" />
                        </div>
                        <div class="col-3">
                            <img src="<?php echo e(asset('landing/posgo-saas-pic-3.png')); ?>"
                                class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.8s"
                                alt="Admin" />
                        </div>
                        <div class="col-3">
                            <img src="<?php echo e(asset('landing/posgo-saas-pic-9.png')); ?>"
                                class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.3s"
                                alt="Admin" />
                        </div>
                        <div class="col-3">
                            <img src="<?php echo e(asset('landing/posgo-saas-pic-11.png')); ?>"
                                class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.5s"
                                alt="Admin" />
                        </div>
                        <div class="col-3">
                            <img src="<?php echo e(asset('landing/posgo-saas-pic-14.png')); ?>"
                                class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.7s"
                                alt="Admin" />
                        </div>
                        <div class="col-3">
                            <img src="<?php echo e(asset('landing/posgo-saas-pic-15.png')); ?>"
                                class="img-fluid header-img wow animate__fadeInRight" data-wow-delay="0.9s"
                                alt="Admin" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ dashboard ] End -->
    <!-- [ dashboard ] start -->
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <img src="<?php echo e(asset(Storage::url('logo/logo-dark.png'))); ?>" alt="logo" />
                </div>
                <div class="col-6 text-end">

                    <p class="text-body"> <?php echo e(env('FOOTER_TEXT')); ?></p>
                </div>
            </div>
        </div>
    </section>
    <!-- [ dashboard ] End -->
    <!-- Required Js -->
    <script src="<?php echo e(asset('assets/js/plugins/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/pages/wow.min.js')); ?>"></script>
    <script>
        // Start [ Menu hide/show on scroll ]
        let ost = 0;
        document.addEventListener("scroll", function() {
            let cOst = document.documentElement.scrollTop;
            if (cOst == 0) {
                document.querySelector(".navbar").classList.add("top-nav-collapse");
            } else if (cOst > ost) {
                document.querySelector(".navbar").classList.add("top-nav-collapse");
                document.querySelector(".navbar").classList.remove("default");
            } else {
                document.querySelector(".navbar").classList.add("default");
                document
                    .querySelector(".navbar")
                    .classList.remove("top-nav-collapse");
            }
            ost = cOst;
        });
        // End [ Menu hide/show on scroll ]
        var wow = new WOW({
            animateClass: "animate__animated", // animation css class (default is animated)
        });
        wow.init();
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: "#navbar-example",
        });
    </script>
</body>

</html>
<?php /**PATH D:\My task\Germany\Laravel-dashboard-Customize-\resources\views/layouts/master.blade.php ENDPATH**/ ?>