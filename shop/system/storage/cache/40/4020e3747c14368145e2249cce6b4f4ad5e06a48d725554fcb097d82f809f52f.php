<?php

/* tt_naturecircle2/template/common/footer.twig */
class __TwigTemplate_0637790bdd3b52b337f70d65a87f7247dba716e96ababb7d9050cf670b7b20a0 extends Twig_Template
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
        echo "<section class=\"footer_top\">
<footer>
\t<div class=\"container\">
\t\t";
        // line 4
        if ((isset($context["block4"]) ? $context["block4"] : null)) {
            // line 5
            echo "\t\t\t";
            echo (isset($context["block4"]) ? $context["block4"] : null);
            echo "
\t\t";
        }
        // line 6
        echo "\t
\t\t";
        // line 7
        if ((isset($context["block5"]) ? $context["block5"] : null)) {
            // line 8
            echo "\t\t\t";
            echo (isset($context["social"]) ? $context["social"] : null);
            echo "
\t\t";
        }
        // line 9
        echo "\t
\t\t";
        // line 10
        if ((isset($context["block6"]) ? $context["block6"] : null)) {
            // line 11
            echo "\t\t\t";
            echo (isset($context["block6"]) ? $context["block6"] : null);
            echo "
\t\t";
        }
        // line 12
        echo "\t
\t</div>
\t<div class=\"footer-top\">
\t  <div class=\"container\">
\t\t<div class=\"row footer_info\">
\t\t\t  <div class=\"col-12 col-md-3\">
\t\t\t\t\t";
        // line 18
        if ((isset($context["block7"]) ? $context["block7"] : null)) {
            // line 19
            echo "\t\t\t\t\t\t";
            echo (isset($context["col_1"]) ? $context["col_1"] : null);
            echo "
\t\t\t\t\t";
        }
        // line 20
        echo "\t
\t\t\t\t</div>
\t\t\t  ";
        // line 22
        if ((isset($context["informations"]) ? $context["informations"] : null)) {
            // line 23
            echo "\t\t\t  <div class=\"col-12 col-md-3\">
\t\t\t\t<div class=\"footer-title\"><h3>";
            // line 24
            echo (isset($context["text_information"]) ? $context["text_information"] : null);
            echo "</h3></div>
\t\t\t\t<div class=\"footer-content\">
\t\t\t\t\t<ul class=\"\">
\t\t\t\t\t ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["informations"]) ? $context["informations"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
                // line 28
                echo "\t\t\t\t\t  <li><a href=\"";
                echo $this->getAttribute($context["information"], "href", array());
                echo "\">";
                echo $this->getAttribute($context["information"], "title", array());
                echo "</a></li>
\t\t\t\t\t  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "\t\t\t\t\t  <li><a href=\"";
            echo (isset($context["manufacturer"]) ? $context["manufacturer"] : null);
            echo "\">";
            echo (isset($context["text_manufacturer"]) ? $context["text_manufacturer"] : null);
            echo "</a></li>
\t\t\t\t\t  <li><a href=\"";
            // line 31
            echo (isset($context["voucher"]) ? $context["voucher"] : null);
            echo "\">";
            echo (isset($context["text_voucher"]) ? $context["text_voucher"] : null);
            echo "</a></li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t  </div>
\t\t\t  ";
        }
        // line 36
        echo "\t\t\t  <div class=\"col-12 col-md-3\">
\t\t\t\t<div class=\"footer-title\"><h3>";
        // line 37
        echo (isset($context["text_service"]) ? $context["text_service"] : null);
        echo "</h3></div>
\t\t\t\t<div class=\"footer-content\">
\t\t\t\t\t<ul class=\"\">
\t\t\t\t\t  <li><a href=\"";
        // line 40
        echo (isset($context["contact"]) ? $context["contact"] : null);
        echo "\">";
        echo (isset($context["text_contact"]) ? $context["text_contact"] : null);
        echo "</a></li>
\t\t\t\t\t  <li><a href=\"";
        // line 41
        echo (isset($context["return"]) ? $context["return"] : null);
        echo "\">";
        echo (isset($context["text_return"]) ? $context["text_return"] : null);
        echo "</a></li>
\t\t\t\t\t  <li><a href=\"";
        // line 42
        echo (isset($context["sitemap"]) ? $context["sitemap"] : null);
        echo "\">";
        echo (isset($context["text_sitemap"]) ? $context["text_sitemap"] : null);
        echo "</a></li>
\t\t\t\t\t  <li><a href=\"";
        // line 43
        echo (isset($context["affiliate"]) ? $context["affiliate"] : null);
        echo "\">";
        echo (isset($context["text_affiliate"]) ? $context["text_affiliate"] : null);
        echo "</a></li>
\t\t\t\t\t  <li><a href=\"";
        // line 44
        echo (isset($context["special"]) ? $context["special"] : null);
        echo "\">";
        echo (isset($context["text_special"]) ? $context["text_special"] : null);
        echo "</a></li>
\t\t\t\t\t  <li><a href=\"";
        // line 45
        echo (isset($context["newsletter"]) ? $context["newsletter"] : null);
        echo "\">";
        echo (isset($context["text_newsletter"]) ? $context["text_newsletter"] : null);
        echo "</a></li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t  </div>
\t\t\t  <div class=\"col-12 col-md-3\">
\t\t\t\t";
        // line 50
        if ((isset($context["block8"]) ? $context["block8"] : null)) {
            // line 51
            echo "\t\t\t\t\t";
            echo (isset($context["block8"]) ? $context["block8"] : null);
            echo "
\t\t\t\t";
        }
        // line 52
        echo "\t
\t\t\t  </div>
\t\t</div>
\t  </div>
\t</div>
\t<div class=\"footer-bottom\">
\t\t<div class=\"container\">
\t\t\t<div class=\"container-inner\">
\t\t\t\t<div class=\"footer-copyright\">
\t\t\t\t\t<span>Â© Copyright Jakob Mùˆller, Konzept und Gestaltung Konzept fùˆnf, www.konzept-fuenf.de</span>
\t\t\t\t</div>
\t\t\t\t";
        // line 63
        if ((isset($context["block9"]) ? $context["block9"] : null)) {
            // line 64
            echo "\t\t\t\t\t";
            echo (isset($context["block9"]) ? $context["block9"] : null);
            echo "
\t\t\t\t";
        }
        // line 65
        echo "\t
\t\t\t</div>
\t\t</div>
\t</div>
\t<div id=\"back-top\"><i class=\"fa fa-angle-up\"></i></div>
</footer>
</section>
<script >
\$(document).ready(function(){
\t// hide #back-top first
\t\$(\"#back-top\").hide();
\t// fade in #back-top
\t\$(function () {
\t\t\$(window).scroll(function () {
\t\t\tif (\$(this).scrollTop() > \$('body').height()/3) {
\t\t\t\t\$('#back-top').fadeIn();
\t\t\t} else {
\t\t\t\t\$('#back-top').fadeOut();
\t\t\t}
\t\t});
\t\t// scroll body to 0px on click
\t\t\$('#back-top').click(function () {
\t\t\t\$('body,html').animate({scrollTop: 0}, 800);
\t\t\treturn false;
\t\t});
\t});
});
</script>
";
        // line 93
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["scripts"]) ? $context["scripts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 94
            echo "<script src=\"";
            echo $context["script"];
            echo "\" ></script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 96
        echo "<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
</div><!-- wrapper -->
</body></html>";
    }

    public function getTemplateName()
    {
        return "tt_naturecircle2/template/common/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  238 => 96,  229 => 94,  225 => 93,  195 => 65,  189 => 64,  187 => 63,  174 => 52,  168 => 51,  166 => 50,  156 => 45,  150 => 44,  144 => 43,  138 => 42,  132 => 41,  126 => 40,  120 => 37,  117 => 36,  107 => 31,  100 => 30,  89 => 28,  85 => 27,  79 => 24,  76 => 23,  74 => 22,  70 => 20,  64 => 19,  62 => 18,  54 => 12,  48 => 11,  46 => 10,  43 => 9,  37 => 8,  35 => 7,  32 => 6,  26 => 5,  24 => 4,  19 => 1,);
    }
}
/* <section class="footer_top">*/
/* <footer>*/
/* 	<div class="container">*/
/* 		{% if block4 %}*/
/* 			{{ block4 }}*/
/* 		{% endif %}	*/
/* 		{% if block5 %}*/
/* 			{{ social }}*/
/* 		{% endif %}	*/
/* 		{% if block6 %}*/
/* 			{{ block6 }}*/
/* 		{% endif %}	*/
/* 	</div>*/
/* 	<div class="footer-top">*/
/* 	  <div class="container">*/
/* 		<div class="row footer_info">*/
/* 			  <div class="col-12 col-md-3">*/
/* 					{% if block7 %}*/
/* 						{{ col_1 }}*/
/* 					{% endif %}	*/
/* 				</div>*/
/* 			  {% if informations %}*/
/* 			  <div class="col-12 col-md-3">*/
/* 				<div class="footer-title"><h3>{{ text_information }}</h3></div>*/
/* 				<div class="footer-content">*/
/* 					<ul class="">*/
/* 					 {% for information in informations %}*/
/* 					  <li><a href="{{ information.href }}">{{ information.title }}</a></li>*/
/* 					  {% endfor %}*/
/* 					  <li><a href="{{ manufacturer }}">{{ text_manufacturer }}</a></li>*/
/* 					  <li><a href="{{ voucher }}">{{ text_voucher }}</a></li>*/
/* 					</ul>*/
/* 				</div>*/
/* 			  </div>*/
/* 			  {% endif %}*/
/* 			  <div class="col-12 col-md-3">*/
/* 				<div class="footer-title"><h3>{{ text_service }}</h3></div>*/
/* 				<div class="footer-content">*/
/* 					<ul class="">*/
/* 					  <li><a href="{{ contact }}">{{ text_contact }}</a></li>*/
/* 					  <li><a href="{{ return }}">{{ text_return }}</a></li>*/
/* 					  <li><a href="{{ sitemap }}">{{ text_sitemap }}</a></li>*/
/* 					  <li><a href="{{ affiliate }}">{{ text_affiliate }}</a></li>*/
/* 					  <li><a href="{{ special }}">{{ text_special }}</a></li>*/
/* 					  <li><a href="{{ newsletter }}">{{ text_newsletter }}</a></li>*/
/* 					</ul>*/
/* 				</div>*/
/* 			  </div>*/
/* 			  <div class="col-12 col-md-3">*/
/* 				{% if block8 %}*/
/* 					{{ block8 }}*/
/* 				{% endif %}	*/
/* 			  </div>*/
/* 		</div>*/
/* 	  </div>*/
/* 	</div>*/
/* 	<div class="footer-bottom">*/
/* 		<div class="container">*/
/* 			<div class="container-inner">*/
/* 				<div class="footer-copyright">*/
/* 					<span>Â© Copyright Jakob Mùˆller, Konzept und Gestaltung Konzept fùˆnf, www.konzept-fuenf.de</span>*/
/* 				</div>*/
/* 				{% if block9 %}*/
/* 					{{ block9 }}*/
/* 				{% endif %}	*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* 	<div id="back-top"><i class="fa fa-angle-up"></i></div>*/
/* </footer>*/
/* </section>*/
/* <script >*/
/* $(document).ready(function(){*/
/* 	// hide #back-top first*/
/* 	$("#back-top").hide();*/
/* 	// fade in #back-top*/
/* 	$(function () {*/
/* 		$(window).scroll(function () {*/
/* 			if ($(this).scrollTop() > $('body').height()/3) {*/
/* 				$('#back-top').fadeIn();*/
/* 			} else {*/
/* 				$('#back-top').fadeOut();*/
/* 			}*/
/* 		});*/
/* 		// scroll body to 0px on click*/
/* 		$('#back-top').click(function () {*/
/* 			$('body,html').animate({scrollTop: 0}, 800);*/
/* 			return false;*/
/* 		});*/
/* 	});*/
/* });*/
/* </script>*/
/* {% for script in scripts %}*/
/* <script src="{{ script }}" ></script>*/
/* {% endfor %}*/
/* <!--*/
/* OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.*/
/* Please donate via PayPal to donate@opencart.com*/
/* //-->*/
/* </div><!-- wrapper -->*/
/* </body></html>*/
