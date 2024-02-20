<!doctype html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="@yield('meta')">
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/colors/blue.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body>

<!-- Wrapper -->
<div id="wrapper" >

@include('katmanlar.menu.usernavbar')
@yield('content')


<!-- Scripts
================================================== -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/jquery-migrate-3.0.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/js/mmenu.min.js"></script>
    <script src="/js/tippy.all.min.js"></script>
    <script src="/js/simplebar.min.js"></script>
    <script src="/js/bootstrap-slider.min.js"></script>
    <script src="/js/bootstrap-select.min.js"></script>
    <script src="/js/snackbar.js"></script>
    <script src="/js/clipboard.min.js"></script>
    <script src="/js/counterup.min.js"></script>
    <script src="/js/magnific-popup.min.js"></script>
    <script src="/js/slick.min.js"></script>
    <script src="/js/custom.js"></script>


    <!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
    <script>
        // Snackbar for user status switcher
        $('#snackbar-user-status label').click(function() {
            Snackbar.show({
                text: 'Your status has been changed!',
                pos: 'bottom-center',
                showAction: false,
                actionText: "Dismiss",
                duration: 3000,
                textColor: '#fff',
                backgroundColor: '#383838'
            });
        });
    </script>


    <!-- Google Autocomplete -->
    <script>
        function initAutocomplete() {
            var options = {
                componentRestrictions: {country: "tr"}
            };

            var input = document.getElementById('autocomplete-input');
            var autocomplete = new google.maps.places.Autocomplete(input, options);

            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                document.getElementById('city2').value = place.name;
                document.getElementById('cityLat').value = place.geometry.location.lat();
                document.getElementById('cityLng').value = place.geometry.location.lng();
                //alert("This function is working!");
                //alert(place.name);
                // alert(place.address_components[0].long_name);

            });
        }
        google.maps.event.addDomListener(window, 'load', initAutocomplete);

        // Autocomplete adjustment for homepage
        if ($('.intro-banner-search-form')[0]) {
            setTimeout(function(){
                $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
            }, 300);
        }

        setTimeout(function(){
            $('.notification').slideUp("slow");
        }, 3000);

    </script>
@yield('footer')

<!-- Google API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFAjEWhUz022UYBgl3rVQ7OIoZgrf2O6s&libraries=places&callback=initAutocomplete"></script>


</div>
@yield('afterwrapper')
</body>


</html>
