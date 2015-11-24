<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <title>AHK &middot; @yield('title')</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{!! url('favicon.ico') !!}">

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- CSS Global Compulsory -->
    <link href='{!! url("assets/plugins/bootstrap/css/bootstrap.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/css/style.css") !!}' rel='stylesheet' type='text/css'/>

    <!-- CSS Header and Footer -->
    <link href='{!! url("assets/css/header.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/css/footer.css") !!}' rel='stylesheet' type='text/css'/>

    <!-- CSS Implementing Plugins -->
    <link href='{!! url("assets/plugins/animate.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/line-icons/line-icons.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/font-awesome/css/font-awesome.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/login-signup-modal-window/css/style.css") !!}' rel='stylesheet' type='text/css'/>
    @yield('css-implementing-plugins')

            <!-- CSS Customization -->
    <link href='{!! url("assets/css/custom.css") !!}' rel='stylesheet' type='text/css'/>
    <!-- CSS Page Style -->
    @yield('css-page-style')
    @yield('inline-styles')
</head>

<body>
<div class="wrapper">

    @include('_partials.header')

    @yield('content')

    @include('_partials.footer')

    <div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
        <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
            <ul class="cd-switcher">
                <li><a href="javascript:void(0);">Login</a></li>
                <li><a href="javascript:void(0);">Register</a></li>
            </ul>

            <div id="cd-login"> <!-- log in form -->
                <form class="cd-form">
                    <p class="social-login">
                        <span class="social-login-facebook"><a href="#"><i class="fa fa-facebook"></i> Facebook</a></span>
                        <span class="social-login-google"><a href="#"><i class="fa fa-google"></i> Google</a></span>
                        <span class="social-login-twitter"><a href="#"><i class="fa fa-twitter"></i> Twitter</a></span>
                    </p>

                    <div class="lined-text"><span>Or use your account on Unify</span>
                        <hr>
                    </div>

                    <p class="fieldset">
                        <label class="image-replace cd-email" for="signin-email">E-mail</label>
                        <input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signin-password">Password</label>
                        <input class="full-width has-padding has-border" id="signin-password" type="text" placeholder="Password">
                        <a href="javascript:void(0);" class="hide-password">Hide</a>
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <input type="checkbox" id="remember-me" checked> <label for="remember-me">Remember me</label>
                    </p>

                    <p class="fieldset">
                        <input class="full-width" type="submit" value="Login">
                    </p>
                </form>

                <p class="cd-form-bottom-message"><a href="javascript:void(0);">Forgot your password?</a></p>
                <!-- <a href="javascript:void(0);" class="cd-close-form">Close</a> -->
            </div> <!-- cd-login -->

            <div id="cd-signup"> <!-- sign up form -->
                <form class="cd-form">
                    <p class="social-login">
                        <span class="social-login-facebook"><a href="#"><i class="fa fa-facebook"></i> Facebook</a></span>
                        <span class="social-login-google"><a href="#"><i class="fa fa-google"></i> Google</a></span>
                        <span class="social-login-twitter"><a href="#"><i class="fa fa-twitter"></i> Twitter</a></span>
                    </p>

                    <div class="lined-text"><span>Or register your new account on Unify</span>
                        <hr>
                    </div>

                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-username">Username</label>
                        <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-email" for="signup-email">E-mail</label>
                        <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signup-password">Password</label>
                        <input class="full-width has-padding has-border" id="signup-password" type="text" placeholder="Password">
                        <a href="javascript:void(0);" class="hide-password">Hide</a>
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <input type="checkbox" id="accept-terms"> <label for="accept-terms">I agree to the
                            <a href="page_terms.html">Terms</a></label>
                    </p>

                    <p class="fieldset">
                        <input class="full-width has-padding" type="submit" value="Create account">
                    </p>
                </form>

                <!-- <a href="javascript:void(0);" class="cd-close-form">Close</a> -->
            </div> <!-- cd-signup -->

            <div id="cd-reset-password"> <!-- reset password form -->
                <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

                <form class="cd-form">
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="reset-email">E-mail</label>
                        <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <input class="full-width has-padding" type="submit" value="Reset password">
                    </p>
                </form>

                <p class="cd-form-bottom-message"><a href="javascript:void(0);">Back to log-in</a></p>
            </div> <!-- cd-reset-password -->
            <a href="javascript:void(0);" class="cd-close-form">Close</a>
        </div> <!-- cd-user-modal-container -->
    </div> <!-- cd-user-modal -->

</div><!--/wrapper-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="{!! url('assets/plugins/jquery/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/jquery/jquery-migrate.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/bootstrap/js/bootstrap.min.js') !!}"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{!! url('assets/plugins/back-to-top.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/smoothScroll.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/parallax-slider/js/modernizr.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/login-signup-modal-window/js/main.js') !!}"></script>
@yield('js-implementing-plugins')
        <!-- JS Customization -->
<script type="text/javascript" src="{!! url('assets/js/custom.js') !!}"></script>
@yield('js-inline')
        <!-- JS Page Level -->
<script type="text/javascript" src="{!! url('assets/js/app.js') !!}"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        App.init();
    });
</script>
@yield('js-page-level')
<!--[if lt IE 9]>
<script src="{!! url('assets/plugins/respond.js') !!}"></script>
<script src="{!! url('assets/plugins/html5shiv.js') !!}"></script>
<script src="{!! url('assets/plugins/placeholder-IE-fixes.js') !!}"></script><![endif]-->

</body>
</html>