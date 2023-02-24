<?php 
    $matomo = false;

    if(isset($_COOKIE["cookies_accepted"])) {
        if($_COOKIE["cookies_accepted"]==true ) {
            $matomo = true;
        }
    }
?>
<?php if($matomo == true): ?>          
    <!-- Matomo -->
    <script type="text/javascript">
    var _paq = window._paq = window._paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="//matomo.jbf-erfurt.de/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '1']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
    </script>
    <!-- End Matomo Code -->
<?php else: ?>
    <!-- Matomo disabled -->
    <script type="text/javascript">
    var _paq = window._paq = window._paq || [];
    _paq.push(['disableCookies']);
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="//matomo.jbf-erfurt.de/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '1']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
    </script>
    <!-- End Matomo Code -->
<?php endif; ?>