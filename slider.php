    <link rel="stylesheet" href="responsiveslider/slider.css" />
    <link href="responsiveslider/jquerysctipttop.css" rel="stylesheet" type="text/css">


    <ul class="slider">
      <li>
        <img src="images/banner.jpg" alt="slide1"/>
      </li>
      <li>
        <img src="images/pizza.jpg" alt="slide2"/>
      </li>
      <li>
        <img src="images/cover.jpg" alt="slide3"/>
      </li>
    </ul>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="responsiveslider/slider.js"></script>
  <script type="text/javascript">
    $(window).on("load", function() {
      $(".slider").slider({height: '460px'});
    });
    </script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>