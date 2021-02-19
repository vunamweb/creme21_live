<?php

$mail = 'kontakt@gluecklich-gedacht.de';
$kunde = 'Andrea Skurnia';


if (!isset($_COOKIE["disclaim"])){?>
    <div id="cookie_disclaimer">
        
        <div><p>
            <?php echo $kunde; ?> benutzt Cookies, um seinen Benutzern das beste Webseiten-Erlebnis zu ermöglichen. Außerdem werden teilweise auch Cookies von Diensten Dritter gesetzt. Weiterführende Informationen erhalten Sie in der Datenschutzerklärung.
<a href="#" title="Weiterlesen …">Weiterlesen …</a>
            <a href="#" id="cookie_stop">Ich akzeptiere</a></p>
        </div>
    </div>

<style>
/********COOKIES*******/
#cookie_disclaimer{
   position: fixed; font-size: .8em;
   bottom: 0;
   z-index: 9999999;
   width: 100%;
   max-width: 992px;
   background: #fff;
   left:50%; margin-left: -496px;
   color: #1e5a6e;padding: 10px; line-height: 1.5em; -webkit-box-shadow: 0px 6px 22px 0px rgba(0,0,0,0.75); -moz-box-shadow: 0px 6px 22px 0px rgba(0,0,0,0.75); box-shadow: 0px 6px 22px 0px rgba(0,0,0,0.75);  }
#cookie_disclaimer a { color: #1e5a6e; text-decoration: underline; }
#cookie_disclaimer p { color: #1e5a6e; }
#cookie_stop{float: right;
   padding: 2px 22px;
   background: #277B9E;
   color: #fff !important; text-decoration: none !important;
   border-radius: 12px; margin-right: 50px; margin-top: 5px; text-decoration: none; }
@media only screen and (max-width: 992px) {
#cookie_disclaimer{
   left:0; margin-left: 0;
}
}
/********END*******/
</style>

<?php }?>
<?php
if (!isset($_COOKIE["disclaim"])){?>

<!-- Cookies -->
<script type="text/javascript">
$(function(){
     $('#cookie_stop').click(function(){
        //alert('dd');
        $('#cookie_disclaimer').slideUp();

        var nDays = 60;
        var cookieName = "disclaim";
        var cookieValue = "true";

        var today = new Date();
        var expire = new Date();
        expire.setTime(today.getTime() + 3600000*24*nDays);
        document.cookie = cookieName+"="+escape(cookieValue)+";expires="+expire.toGMTString()+";path=/";
     });
});
</script>
<!-- END COOKIES-->
<?php }?>