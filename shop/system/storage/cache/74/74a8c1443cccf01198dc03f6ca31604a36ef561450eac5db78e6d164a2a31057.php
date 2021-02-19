<?php

/* tt_naturecircle2/template/extension/module/newslettersubscribe.twig */
class __TwigTemplate_3b9d63b488e4115d019c1c0f68a0fc05708802673c607f121379e92fb5a2c04a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"newletter-subscribe-container\">
<div class=\"container-inner\">
<div class=\"newletter-subscribe\">
\t<div id=\"boxes-normal\" class=\"newletter-container\">
\t\t<div style=\"\" id=\"dialog-normal\" class=\"window\">
\t\t\t<div class=\"box\">
\t\t\t\t\t\t<div class=\"newletter-title\">
\t\t\t\t\t\t\t<h2>";
        // line 8
        echo (isset($context["heading_title2"]) ? $context["heading_title2"] : null);
        echo "</h2>
\t\t\t\t\t\t\t<p>Kauf auf Rechnung Kostenloser Versand ab xxKostenlose Ru`ˆcksendungTe porectatur?<br>
        Is alitiis aut lit re pel is eicientem intemporro corum, quae qui consent</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"box-content newleter-content\">
\t\t\t\t\t\t\t<div id=\"frm_subscribe-normal\">
\t\t\t\t\t\t\t\t<form name=\"subscribe\" id=\"subscribe-normal\">
\t\t\t\t\t\t\t\t\t<input type=\"text\" value=\"\" name=\"subscribe_email\" id=\"subscribe_email-normal\" placeholder=\"";
        // line 15
        echo (isset($context["entry_email"]) ? $context["entry_email"] : null);
        echo "\">
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"\" name=\"subscribe_name\" id=\"subscribe_name\" />
\t\t\t\t\t\t\t\t\t<a class=\"btn btnokay\" onclick=\"email_subscribe()\" title=\"";
        // line 17
        echo (isset($context["entry_button"]) ? $context["entry_button"] : null);
        echo "\"><span>okay</span></a>
\t\t\t\t\t\t\t\t\t";
        // line 18
        if ((isset($context["option_unsubscribe"]) ? $context["option_unsubscribe"] : null)) {
            // line 19
            echo "\t\t\t\t\t\t\t\t\t\t<a class=\"btn btnokay\" onclick=\"email_unsubscribe()\" title=\"";
            echo (isset($context["entry_unbutton"]) ? $context["entry_unbutton"] : null);
            echo "\"><span>okay</span></a>
\t\t\t\t\t\t\t\t\t";
        }
        // line 20
        echo "   
\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t</div><!-- /#frm_subscribe -->
\t\t\t\t\t\t\t<div id=\"notification-normal\"></div>
\t\t\t\t\t\t</div><!-- /.box-content -->
\t\t\t</div>
\t\t</div>
<script >
function email_subscribe(){
\t\$.ajax({
\t\ttype: 'post',
\t\turl: 'index.php?route=extension/module/newslettersubscribe/subscribe',
\t\tdataType: 'html',
\t\tdata:\$(\"#subscribe-normal\").serialize(),
\t\tsuccess: function (html) {
\t\t\ttry {
\t\t\t\teval(html);
\t\t\t} 
\t\t\tcatch (e) {
\t\t\t}\t\t\t\t
\t\t}});
}
function email_unsubscribe(){
\t\$.ajax({
\t\ttype: 'post',
\t\turl: 'index.php?route=extension/module/newslettersubscribe/unsubscribe',
\t\tdataType: 'html',
\t\tdata:\$(\"#subscribe\").serialize(),
\t\tsuccess: function (html) {
\t\t\ttry {
\t\t\t\teval(html);
\t\t\t} catch (e) {
\t\t\t}
\t\t}}); 
\t\$('html, body').delay( 1500 ).animate({ scrollTop: 0 }, 'slow'); 
}
</script>
<script >
    \$(document).ready(function() {
\t\t\$('#subscribe_email').keypress(function(e) {
            if(e.which == 13) {
                e.preventDefault();
                email_subscribe();
            }
\t\t\tvar name= \$(this).val();
\t\t  \t\$('#subscribe_name').val(name);
        });
\t\t\$('#subscribe_email').change(function() {
\t\t var name= \$(this).val();
\t\t  \t\t\$('#subscribe_name').val(name);
\t\t});
    });
</script>
</div>
</div>
</div>
</div>";
    }

    public function getTemplateName()
    {
        return "tt_naturecircle2/template/extension/module/newslettersubscribe.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 20,  49 => 19,  47 => 18,  43 => 17,  38 => 15,  28 => 8,  19 => 1,);
    }
}
/* <div class="newletter-subscribe-container">*/
/* <div class="container-inner">*/
/* <div class="newletter-subscribe">*/
/* 	<div id="boxes-normal" class="newletter-container">*/
/* 		<div style="" id="dialog-normal" class="window">*/
/* 			<div class="box">*/
/* 						<div class="newletter-title">*/
/* 							<h2>{{ heading_title2 }}</h2>*/
/* 							<p>Kauf auf Rechnung Kostenloser Versand ab xxKostenlose Ru`ˆcksendungTe porectatur?<br>*/
/*         Is alitiis aut lit re pel is eicientem intemporro corum, quae qui consent</p>*/
/* 						</div>*/
/* 						<div class="box-content newleter-content">*/
/* 							<div id="frm_subscribe-normal">*/
/* 								<form name="subscribe" id="subscribe-normal">*/
/* 									<input type="text" value="" name="subscribe_email" id="subscribe_email-normal" placeholder="{{ entry_email }}">*/
/* 									<input type="hidden" value="" name="subscribe_name" id="subscribe_name" />*/
/* 									<a class="btn btnokay" onclick="email_subscribe()" title="{{ entry_button }}"><span>okay</span></a>*/
/* 									{% if option_unsubscribe %}*/
/* 										<a class="btn btnokay" onclick="email_unsubscribe()" title="{{ entry_unbutton }}"><span>okay</span></a>*/
/* 									{% endif %}   */
/* 								</form>*/
/* 							</div><!-- /#frm_subscribe -->*/
/* 							<div id="notification-normal"></div>*/
/* 						</div><!-- /.box-content -->*/
/* 			</div>*/
/* 		</div>*/
/* <script >*/
/* function email_subscribe(){*/
/* 	$.ajax({*/
/* 		type: 'post',*/
/* 		url: 'index.php?route=extension/module/newslettersubscribe/subscribe',*/
/* 		dataType: 'html',*/
/* 		data:$("#subscribe-normal").serialize(),*/
/* 		success: function (html) {*/
/* 			try {*/
/* 				eval(html);*/
/* 			} */
/* 			catch (e) {*/
/* 			}				*/
/* 		}});*/
/* }*/
/* function email_unsubscribe(){*/
/* 	$.ajax({*/
/* 		type: 'post',*/
/* 		url: 'index.php?route=extension/module/newslettersubscribe/unsubscribe',*/
/* 		dataType: 'html',*/
/* 		data:$("#subscribe").serialize(),*/
/* 		success: function (html) {*/
/* 			try {*/
/* 				eval(html);*/
/* 			} catch (e) {*/
/* 			}*/
/* 		}}); */
/* 	$('html, body').delay( 1500 ).animate({ scrollTop: 0 }, 'slow'); */
/* }*/
/* </script>*/
/* <script >*/
/*     $(document).ready(function() {*/
/* 		$('#subscribe_email').keypress(function(e) {*/
/*             if(e.which == 13) {*/
/*                 e.preventDefault();*/
/*                 email_subscribe();*/
/*             }*/
/* 			var name= $(this).val();*/
/* 		  	$('#subscribe_name').val(name);*/
/*         });*/
/* 		$('#subscribe_email').change(function() {*/
/* 		 var name= $(this).val();*/
/* 		  		$('#subscribe_name').val(name);*/
/* 		});*/
/*     });*/
/* </script>*/
/* </div>*/
/* </div>*/
/* </div>*/
/* </div>*/
