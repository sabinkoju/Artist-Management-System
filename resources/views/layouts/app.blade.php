<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-click" data-menu-position="fixed"
    data-theme-mode="light">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Hamro Artist </title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/images/brand-logos/favicon.ico" type="image/x-icon">
    <!-- Choices JS -->
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- Main Theme Js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @include('includes.stylesheet')
    <script>
        if (localStorage.ynexlandingdarktheme) {
            document.querySelector("html").setAttribute("data-theme-mode", "dark")
        }
        if (localStorage.ynexlandingrtl) {
            document.querySelector("html").setAttribute("dir", "rtl")
            document.querySelector("#style")?.setAttribute("href", "../assets/libs/bootstrap/css/bootstrap.rtl.min.css");
        }
    </script>


</head>

<body class="landing-body jobs-landing" id="app">
    <div class="landing-page-wrapper">
        {{-- @include('frontend/widgets/header') --}}
        {{-- @include('frontend/widgets/sidebar') --}}

        <div class="main-content landing-main">
            {{-- @include('frontend/widgets/landingBanner') --}}

            @yield('content')
        </div>
        {{-- @include('frontend/widgets/footer') --}}
        <div class="scrollToTop">
            <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
        </div>
        <div id="responsive-overlay"></div>
        @include('includes.javascript')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            $('.reason').click(function() {
                $(".active").removeClass("active");

                $(this).find("a").addClass('active');
                var reason = $(this).find("a").text();

                $('#reason').val(reason);
            });




            var slider = document.getElementById("duration-slider");
            var output = document.getElementById("slider-duration-value");

            noUiSlider.create(slider, {
                start: 6,

                connect: [true, false],
                range: {
                    min: 4,
                    max: 12
                },
                format: {
                    to: function(value) {
                        return Math.round(value);
                    },
                    from: function(value) {
                        return value.replace("%", "");
                    }
                }
            });

            slider.noUiSlider.on("update", function(values, handle) {
                output.innerHTML = values[handle];
            });
        </script>
        <script>
            var slider1 = document.getElementById("amount_slider");
            var output1 = document.getElementById("slider-amount-value");

            noUiSlider.create(slider1, {
                start: 400,
                step: 100,
                connect: [true, false],
                range: {
                    min: 300,
                    max: 2000
                },
                format: {
                    to: function(value) {
                        return Math.round(value);
                    },
                    from: function(value) {
                        return value.replace("%", "");
                    }
                }
            });

            slider1.noUiSlider.on("update", function(values, handle) {
                output1.innerHTML = values[handle];
            });
        </script>

        <script>
            $('.income-type-block button').on('click', function() {
                var block = $(this).attr('id');
                $('.hidden-block').hide();
                $('.' + block).slideDown();
            });

            $('#input-new').on('click', function() {

                var firstChildHTML = $('.expenses-list :first-child').html();

                $('.expenses-list').append(firstChildHTML);
            });


            $('.expenses-list').on('click', '.delete-expenses', function() {
                var childElement = $(this);
                var parentElement = childElement.parent();
                var grandparentElement = parentElement.parent();

                grandparentElement.remove();
            });

            $('#backButton').click(function() {
                window.history.back();
            });
        </script>
</body>

</html>
