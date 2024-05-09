<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Xeeweul-express</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="icon" href="/images/bg/xe/logo.png">    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

        <link href="css/welcom/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" href="/images/bg/xe/logo.png">    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="css/welcom/bootstrap-icons.css" rel="stylesheet">

        <link href="css/welcom/templatemo-tiya-golf-club.css" rel="stylesheet">

<!--

TemplateMo 587 Tiya Golf Club

https://templatemo.com/tm-587-tiya-golf-club

-->
    </head>

    <body>

        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="index.html">
                        <!-- <img src="images/bg/logo.png" class="navbar-brand-image img-fluid" alt="Tiya Golf Club"> -->

                            <img width="250" height="50"
                            src="/images/bg/xe/logo.png"
                            class="custom-logo" alt="Xeeweul Express" /><span class="navbar-brand-text text-blue-800 ">
                        </span>
                    </a>

                    <div class="d-lg-none ms-auto me-3">
                        {{-- <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Member Login</a> --}}
                        <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="{{route('login')}}" role="button" >Member Login</a>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-auto ">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3">Membership</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4">Events</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_5">Contact Us</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item" href="event-listing.html">Event Listing</a></li>

                                    <li><a class="dropdown-item" href="event-detail.html">Event Detail</a></li>
                                </ul>
                            </li>
                        </ul>
                        @if (Route::has('login'))
                        <div class=" d-lg-block ms-lg-3">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn custom-btn custom-border-btn font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                <a href="#">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf

                                        <button wire:click="logoutUser"  class="btn custom-btn custom-border-btn font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                            Logout
                                        </button>
                                    </form>
                                </a>
                                @else
                                   {{-- <a class="btn custom-btn text-blue-800 bg-blue-700 text-start custom-border-btn" data-bs-toggle="offcanvas" href="{{route('login')}}" role="button">Member Login</a> --}}
                                   <a class="btn custom-btn text-blue-800 bg-blue-700 text-start custom-border-btn"  href="{{route('login')}}">Member Login</a>
                                @if (Route::has('register'))
                                   <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="{{route('register')}}" role="button" >Incription</a>
                                @endif
                            @endauth
                        </div>

                    @endif


                            {{-- <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Member Login</a> --}}
                    </div>
                </div>
            </nav>


            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <a href="{{ route('login')}}" > Login</a>
                    {{-- <h5 class="offcanvas-title" id="offcanvasExampleLabel">Member Login</h5> --}}

                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body d-flex flex-column">
                    <form class="custom-form member-login-form" action="#" method="post" role="form">

                        <div class="member-login-form-body">
                            <div class="mb-4">
                                <label class="form-label mb-2" for="member-login-number">Membership No.</label>

                                <input type="text" name="member-login-number" id="member-login-number" class="form-control" placeholder="11002560" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label mb-2" for="member-login-password">Password</label>

                                <input type="password" name="member-login-password" id="member-login-password" pattern="[0-9a-zA-Z]{4,10}" class="form-control" placeholder="Password" required="">
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">

                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember me
                                </label>
                            </div>

                            <div class="col-lg-5 col-md-7 col-8 mx-auto">
                                <button type="submit" class="form-control">Login</button>
                            </div>

                            <div class="text-center my-4">
                                <a href="#">Forgotten password?</a>
                            </div>
                        </div>
                    </form>

                    <div class="mt-auto mb-5">
                        <p>
                            <strong class="text-white me-3">Any Questions?</strong>

                            <a href="tel: 010-020-0340" class="contact-link">
                            	010-020-0340
                            </a>
                        </p>
                    </div>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3D405B" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
            </div>


            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">

                <div class="section-overlay"></div>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3D405B" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>

                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <h2 class="text-white">"Xeeweul Express -  </h2>

                            <h1 class="cd-headline rotate-1 text-white mb-4 pb-2">
                                <span>est une application innovante qui vous permet de </span>
                                <span class="cd-words-wrapper">
                                    <b class="is-visible">Partagez Votre Opinion,</b>
                                    <b>Gagnez de l'Argent!  </b>
                                    <b>Parrainez Vos Amis </b>
                                </span>
                            </h1>

                            <div class="custom-btn-group">
                                <a href="#section_2" class="btn custom-btn smoothscroll me-3">Our Story</a>

                                <a href="#section_3" class="link smoothscroll">Become a member</a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="ratio ratio-16x9">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/gnCNkc73T_U?si=fbrDyZlGb4h_uvOw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                <!-- <iframe width="560" height="315" src="https://youtu.be/gnCNkc73T_U?si=fbrDyZlGb4h_uvOw/" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                            </div>
                        </div>

                    </div>
                </div>

                <svg  viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
            </section>


            <section class="about-section section-padding" id="section_2">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="mb-lg-5 mb-4">About Xeeweul-express</h2>
                        </div>

                        <div class="col-lg-5 col-12 me-auto mb-4 mb-lg-0">
                            <h3 class="mb-3">X--E</h3>

                            <p><strong>Xeeweul Gui Express</strong> est une application innovante qui vous permet de partager vos opinions et vos voix tout en gagnant de l'argent rapidement au Sénégal. Notre plateforme offre une opportunité unique aux citoyens sénégalais de participer à des sondages rémunérés et de transformer leurs opinions en récompenses, le tout avec une grande facilité et rapidité.</p>

                            <p>Profitez de tous les avantages de Xeeweul Gui Expressx`
                        </p>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0 mb-md-0">
                            <div class="member-block">
                                <div class="member-block-image-wrap">
                                    <img src="/images/bg/xe/khadime.jpeg"class="member-block-image img-fluid" alt="">

                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-twitter"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="member-block-info d-flex align-items-center">
                                    <h4>S.Khadime Lo Rafahi</h4>

                                    <p class="ms-auto">Fondateur</p>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-lg-3 col-md-6 col-12">
                            <div class="member-block">
                                <div class="member-block-image-wrap">
                                    <img src="/images/bg/xe/jul.jpeg" class="member-block-image w-10 h-9 img-fluid" alt="">

                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-linkedin"></a>
                                        </li>
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-twitter"></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="member-block-info d-flex align-items-center">
                                    <h4>Souleymane </h4>

                                    <p class="ms-auto">Developeur</p>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </section>
            <section class="section">
                <svg viewBox="0 0 1265 144" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="rgba(255, 255, 255, 1)" d="M 0 40 C 164 40 164 20 328 20 L 328 20 L 328 0 L 0 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 327 20 C 445.5 20 445.5 89 564 89 L 564 89 L 564 0 L 327 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 563 89 C 724.5 89 724.5 48 886 48 L 886 48 L 886 0 L 563 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 885 48 C 1006.5 48 1006.5 67 1128 67 L 1128 67 L 1128 0 L 885 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 1127 67 C 1196 67 1196 0 1265 0 L 1265 0 L 1265 0 L 1127 0 Z" stroke-width="0"></path></svg>


                       <video  autoplay loop muted style="height: 100vh;
                       width: 100%;
                       object-fit: cover;
                       left: 0;
                       right: 0;
                       top: 0;
                       bottom: 0;
                       z-index: -1;"> <source src="/images/bg/xe/vid.mp4" type="video/mp4"></video>



                <svg viewBox="0 0 1265 144" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="rgba(255, 255, 255, 1)" d="M 0 40 C 164 40 164 20 328 20 L 328 20 L 328 0 L 0 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 327 20 C 445.5 20 445.5 89 564 89 L 564 89 L 564 0 L 327 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 563 89 C 724.5 89 724.5 48 886 48 L 886 48 L 886 0 L 563 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 885 48 C 1006.5 48 1006.5 67 1128 67 L 1128 67 L 1128 0 L 885 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 1127 67 C 1196 67 1196 0 1265 0 L 1265 0 L 1265 0 L 1127 0 Z" stroke-width="0"></path></svg>
            </section>

            <section class="section-bg-image">
                <svg viewBox="0 0 1265 344" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="rgba(255, 255, 255, 1)" d="M 0 40 C 164 40 164 20 328 20 L 328 20 L 328 0 L 0 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 327 20 C 445.5 20 445.5 89 564 89 L 564 89 L 564 0 L 327 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 563 89 C 724.5 89 724.5 48 886 48 L 886 48 L 886 0 L 563 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 885 48 C 1006.5 48 1006.5 67 1128 67 L 1128 67 L 1128 0 L 885 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 1127 67 C 1196 67 1196 0 1265 0 L 1265 0 L 1265 0 L 1127 0 Z" stroke-width="0"></path></svg>



            </section>
            <section class="section -mt-32">
                <svg viewBox="0 0 1265 144" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="rgba(255, 255, 255, 1)" d="M 0 40 C 164 40 164 20 328 20 L 328 20 L 328 0 L 0 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 327 20 C 445.5 20 445.5 89 564 89 L 564 89 L 564 0 L 327 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 563 89 C 724.5 89 724.5 48 886 48 L 886 48 L 886 0 L 563 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 885 48 C 1006.5 48 1006.5 67 1128 67 L 1128 67 L 1128 0 L 885 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 1127 67 C 1196 67 1196 0 1265 0 L 1265 0 L 1265 0 L 1127 0 Z" stroke-width="0"></path></svg>


                       <video  autoplay loop muted style="height: 100vh;
                       width: 100%;
                       object-fit: cover;
                       left: 0;
                       right: 0;
                       top: 0;
                       bottom: 0;
                       z-index: -1;"> <source src="/images/bg/xe/bgvid.mp4" type="video/mp4"></video>


                <svg viewBox="0 0 1265 144" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="rgba(255, 255, 255, 1)" d="M 0 40 C 164 40 164 20 328 20 L 328 20 L 328 0 L 0 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 327 20 C 445.5 20 445.5 89 564 89 L 564 89 L 564 0 L 327 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 563 89 C 724.5 89 724.5 48 886 48 L 886 48 L 886 0 L 563 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 885 48 C 1006.5 48 1006.5 67 1128 67 L 1128 67 L 1128 0 L 885 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 1127 67 C 1196 67 1196 0 1265 0 L 1265 0 L 1265 0 L 1127 0 Z" stroke-width="0"></path></svg>
            </section>



            <section class="membership-section section-padding" id="section_3">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center mx-auto mb-lg-5 mb-4">
                            <h2><span>Membership</span>at X--E</h2>
                        </div>

                        <div class="col-lg-6 col-12 mb-3 mb-lg-0">
                            <h4 class="mb-4 pb-lg-2">Membership Fees</h4>

                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th style="width: 76%;">Fonctionnalités Principales:</th>



                                            <th style="width: 22%;">X-E</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-start">Créez Votre Compte Gratuitement</th>



                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="text-start">Répondez à des Sondages et Gagnez des Points</th>



                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>



                                        <tr>
                                            <th scope="row" class="text-start">Partagez Votre Code de Parrainage</th>


                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="text-start">Échangez Vos Points contre de l'Argent</th>


                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="text-start">Retires Votre l'argent</th>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td>

                                            <!-- <td>
                                                <i class="bi-x-circle-fill"></i>
                                            </td>

                                            <td>
                                                <i class="bi-check-circle-fill"></i>
                                            </td> -->
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-5 col-12 mx-auto">
                        <h4 class="mb-4 pb-lg-2">Please join us!</h4>
                            <form action="#" method="post" class="custom-form membership-form shadow-lg" role="form">
                                <h4 class="text-white mb-4">Become a member</h4>

                                    <div class="form-floating">
                                        <input type="text" name="full-name" id="full-name" class="form-control" placeholder="Full Name" required="">

                                        <label for="floatingInput">Full Name</label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">

                                        <label for="floatingInput">Email address</label>
                                    </div>

                                    <div class="form-floating">
                                        <textarea class="form-control" id="message" name="message" placeholder="Describe message here"></textarea>

                                        <label for="floatingTextarea"> Comments</label>
                                    </div>

                                    <button type="submit" class="form-control">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
            {{-- mobile --}}
{{--
<div class="relative mx-auto border-gray-800 dark:border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[600px] w-[300px] shadow-xl">
    <div class="w-[148px] h-[18px] bg-gray-800 top-0 rounded-b-[1rem] left-1/2 -translate-x-1/2 absolute"></div>
    <div class="h-[46px] w-[3px] bg-gray-800 absolute -left-[17px] top-[124px] rounded-l-lg"></div>
    <div class="h-[46px] w-[3px] bg-gray-800 absolute -left-[17px] top-[178px] rounded-l-lg"></div>
    <div class="h-[64px] w-[3px] bg-gray-800 absolute -right-[17px] top-[142px] rounded-r-lg"></div>
    <div class="rounded-[2rem] overflow-hidden w-[272px] h-[572px] bg-white dark:bg-gray-800">
        <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/mockup-2-light.png" class="dark:hidden w-[272px] h-[572px]" alt="">
        <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/mockup-2-dark.png" class="hidden dark:block w-[272px] h-[572px]" alt="">
    </div>
</div> --}}


            <!-- <section class="events-section section-bg section-padding" id="section_4">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h2 class="mb-lg-3">Upcoming Events</h2>
                        </div>

                        <div class="row custom-block mb-3">
                            <div class="col-lg-2 col-md-4 col-12 order-2 order-md-0 order-lg-0">
                                <div class="custom-block-date-wrap d-flex d-lg-block d-md-block align-items-center mt-3 mt-lg-0 mt-md-0">
                                    <h6 class="custom-block-date mb-lg-1 mb-0 me-3 me-lg-0 me-md-0">24</h6>

                                    <strong class="text-white">Feb 2048</strong>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-8 col-12 order-1 order-lg-0">
                                <div class="custom-block-image-wrap">
                                    <a href="event-detail.html">
                                        <img src="images/bg/professional-golf-player.jpg" class="custom-block-image img-fluid" alt="">

                                        <i class="custom-block-icon bi-link"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12 order-3 order-lg-0">
                                <div class="custom-block-info mt-2 mt-lg-0">
                                    <a href="event-detail.html" class="events-title mb-3">Private activities</a>

                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                                    <div class="d-flex flex-wrap border-top mt-4 pt-3">

                                        <div class="mb-4 mb-lg-0">
                                            <div class="d-flex flex-wrap align-items-center mb-1">
                                                <span class="custom-block-span">Location:</span>

                                                <p class="mb-0">National Center, NYC</p>
                                            </div>

                                            <div class="d-flex flex-wrap align-items-center">
                                                <span class="custom-block-span">Ticket:</span>

                                                <p class="mb-0">$250</p>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center ms-lg-auto">
                                            <a href="event-detail.html" class="btn custom-btn">Buy Ticket</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row custom-block custom-block-bg">
                            <div class="col-lg-2 col-md-4 col-12 order-2 order-md-0 order-lg-0">
                                <div class="custom-block-date-wrap d-flex d-lg-block d-md-block align-items-center mt-3 mt-lg-0 mt-md-0">
                                    <h6 class="custom-block-date mb-lg-1 mb-0 me-3 me-lg-0 me-md-0">28</h6>

                                    <strong class="text-white">Feb 2048</strong>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-8 col-12 order-1 order-lg-0">
                                <div class="custom-block-image-wrap">
                                    <a href="event-detail.html">
                                        <img src="images/bg/girl-taking-selfie-with-friends-golf-field.jpg" class="custom-block-image img-fluid" alt="">

                                        <i class="custom-block-icon bi-link"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12 order-3 order-lg-0">
                                <div class="custom-block-info mt-2 mt-lg-0">
                                    <a href="event-detail.html" class="events-title mb-3">Group tournament activities</a>

                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                                    <div class="d-flex flex-wrap border-top mt-4 pt-3">

                                        <div class="mb-4 mb-lg-0">
                                            <div class="d-flex flex-wrap align-items-center mb-1">
                                                <span class="custom-block-span">Location:</span>

                                                <p class="mb-0">National Center, NYC</p>
                                            </div>

                                            <div class="d-flex flex-wrap align-items-center">
                                                <span class="custom-block-span">Ticket:</span>

                                                <p class="mb-0">$350</p>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center ms-lg-auto">
                                            <a href="event-detail.html" class="btn custom-btn">Buy Ticket</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section> -->


            {{-- <section class="contact-section section-padding" id="section_5">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-5 col-12">
                            <form action="#" method="post" class="custom-form contact-form" role="form">
                                <h2 class="mb-4 pb-2">Contact Tiya</h2>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="full-name" id="full-name" class="form-control" placeholder="Full Name" required="">

                                            <label for="floatingInput">Full Name</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">

                                            <label for="floatingInput">Email address</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" id="message" name="message" placeholder="Describe message here"></textarea>

                                            <label for="floatingTextarea">Message</label>
                                        </div>

                                        <button type="submit" class="form-control">Submit Form</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="contact-info mt-5">
                                <div class="contact-info-item">
                                    <div class="contact-info-body">
                                        <strong>London, United Kingdom</strong>

                                        <p class="mt-2 mb-1">
                                            <a href="tel: 010-020-0340" class="contact-link">
                                                (020)
                                                010-020-0340
                                            </a>
                                        </p>

                                        <p class="mb-0">
                                            <a href="mailto:info@company.com" class="contact-link">
                                                info@company.com
                                            </a>
                                        </p>
                                    </div>

                                    <div class="contact-info-footer">
                                        <a href="#">Directions</a>
                                    </div>
                                </div>

                                <img src="images/bg/WorldMap.svg" class="img-fluid" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </section> --}}
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 me-auto mb-5 mb-lg-0">
                        <a class="navbar-brand d-flex align-items-center" href="index.html">
                            <img src="images/bg/logo.png" class="navbar-brand-image img-fluid" alt="">
                            <span class="navbar-brand-text">
                                Xeeweul
                                <small>Express</small>
                            </span>
                        </a>
                    </div>

                    <div class="col-lg-3 col-12">
                        <h5 class="site-footer-title mb-4">Join Us</h5>

                        <p class="d-flex border-bottom pb-3 mb-3 me-lg-3">
                            <span>Mon-Fri</span>
                            6:00 AM - 6:00 PM
                        </p>

                        <p class="d-flex me-lg-3">
                            <span>Sat-Sun</span>
                            6:30 AM - 8:30 PM
                        </p>
                        <br>
                        <p class="copyright-text">Copyright © 2023 Xeeweul-Express</p>
                    </div>

                        <div class="col-lg-2 col-12 ms-auto">
                            <ul class="social-icon mt-lg-5 mt-3 mb-4">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-instagram"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-whatsapp"></a>
                                </li>
                            </ul>
                            <p class="copyright-text">Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">Bamsachine-DigiTech</a></p>

                        </div>

                </div>
            </div>\


            <svg class="section-foot-image"  viewBox="0 0 1440 320"><path fill="rgba(132, 139, 200, 0.084)" fill-opacity="1" d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>



            </div>
        </footer>




        <!-- JAVASCRIPT FILES -->
        <script src="/public/js/welcom/jquery.min.js"></script>
        <script src="/public/js/welcom/bootstrap.bundle.min.js"></script>
        <script src="/public/js/welcom/jquery.sticky.js"></script>
        <script src="/public/js/welcom/click-scroll.js"></script>
        <script src="/public/js/welcom/animated-headline.js"></script>
        <script src="/public/js/welcom/modernizr.js"></script>
        <script src="/public/js/welcom/custom.js"></script>

    </body>
</html>
