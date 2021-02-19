<?php

/* tt_naturecircle2/template/extension/module/ocslideshow.twig */
class __TwigTemplate_27afc7108ea5c9c45c0bf0d31bde072fa20b2a1ea10198f1579503e3da457c23 extends Twig_Template
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
        echo "<div class=\"banner7\">
\t<div class= \"oc-banner7-container\">
\t\t<div class=\"flexslider oc-nivoslider\">
\t\t\t<div class=\"oc-loading\"></div>
\t\t\t<div id=\"oc-inivoslider1\" class=\"nivoSlider\">

                ";
        // line 7
        $context["config"] = $this->getAttribute((isset($context["slide_setting"]) ? $context["slide_setting"] : null), 0, array(), "array");
        // line 8
        echo "                ";
        $context["i"] = 1;
        // line 9
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ocslideshows"]) ? $context["ocslideshows"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 10
            echo "                    ";
            $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
            // line 11
            echo "\t\t\t\t\t<img style=\"display: none;\" src=\"";
            echo $this->getAttribute($context["s"], "image", array(), "array");
            echo "\" alt=\"\" title=\"#banner7-caption";
            echo (isset($context["i"]) ? $context["i"] : null);
            echo "\"  />
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "
\t\t\t</div>

            ";
        // line 16
        $context["i"] = 1;
        // line 17
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ocslideshows"]) ? $context["ocslideshows"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 18
            echo "\t\t\t
\t\t\t\t";
            // line 19
            $context["class"] = "";
            // line 20
            echo "\t\t\t\t";
            if (($this->getAttribute($context["s"], "type", array(), "array") == 1)) {
                // line 21
                echo "\t\t\t\t\t";
                $context["class"] = "slider-1";
                // line 22
                echo "\t\t\t\t";
            }
            // line 23
            echo "\t\t\t\t
\t\t\t\t";
            // line 24
            if (($this->getAttribute($context["s"], "type", array(), "array") == 2)) {
                // line 25
                echo "\t\t\t\t\t";
                $context["class"] = "slider-2";
                // line 26
                echo "\t\t\t\t";
            }
            // line 27
            echo "\t\t\t\t
\t\t\t\t";
            // line 28
            if (($this->getAttribute($context["s"], "type", array(), "array") == 3)) {
                // line 29
                echo "\t\t\t\t\t";
                $context["class"] = "slider-3";
                // line 30
                echo "\t\t\t\t";
            }
            // line 31
            echo "\t\t\t\t
                ";
            // line 32
            $context["i"] = ((isset($context["i"]) ? $context["i"] : null) + 1);
            // line 33
            echo "\t\t\t\t<div id=\"banner7-caption";
            echo (isset($context["i"]) ? $context["i"] : null);
            echo "\" class=\"banner7-caption nivo-html-caption nivo-caption move-slides-effect\" data-class=\"slide-movetype";
            echo $this->getAttribute($context["s"], "type", array(), "array");
            echo "\">
\t\t\t\t\t<div class=\"timeloading\"></div>
\t\t\t\t\t<div class=\" banner7-content ";
            // line 35
            echo (isset($context["class"]) ? $context["class"] : null);
            echo "\">
\t\t\t\t\t\t<div class=\"container\" style=\"height:100%;\">
\t\t\t\t\t\t\t<div class=\"container-inner\" style=\"height: 100%;position: relative;\">
\t\t\t\t\t\t\t\t<div class=\"text-content\">\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
            // line 39
            if (($this->getAttribute($context["s"], "title", array(), "array") && ($this->getAttribute($context["s"], "title", array(), "array") != ""))) {
                // line 40
                echo "\t\t\t\t\t\t\t\t\t\t<h1 class=\"title1\">";
                echo $this->getAttribute($context["s"], "title", array(), "array");
                echo "</h1>
\t\t\t\t\t\t\t\t\t";
            }
            // line 41
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
            // line 42
            if (($this->getAttribute($context["s"], "sub_title", array(), "array") && ($this->getAttribute($context["s"], "sub_title", array(), "array") != ""))) {
                // line 43
                echo "\t\t\t\t\t\t\t\t\t\t<h2 class=\"sub-title\">";
                echo $this->getAttribute($context["s"], "sub_title", array(), "array");
                echo "</h2>
\t\t\t\t\t\t\t\t\t";
            }
            // line 44
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<div class=\"banner7-des\">
\t\t\t\t\t\t\t\t\t\t";
            // line 46
            echo $this->getAttribute($context["s"], "description", array(), "array");
            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            // line 48
            if ($this->getAttribute($context["s"], "link", array(), "array")) {
                // line 49
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"banner7-readmore\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btnGoshop\" href=\"";
                // line 50
                echo $this->getAttribute($context["s"], "link", array(), "array");
                echo "\" title=\"";
                echo (isset($context["text_readmore"]) ? $context["text_readmore"] : null);
                echo "\">";
                echo (isset($context["text_readmore"]) ? $context["text_readmore"] : null);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            }
            // line 53
            echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['s'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "\t\t\t<script >
                \$(window).load(function() {
                    \$('#oc-inivoslider1').nivoSlider({
                        effect:  ";
        // line 62
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "effect", array(), "array")) {
            echo "  \"";
            echo trim($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "effect", array(), "array"));
            echo "\" ";
        } else {
            echo "   'random'  ";
        }
        echo " ,
                        slices: 15,
                        boxCols: 8,
                        boxRows: 4,
                        manualAdvance: ";
        // line 66
        if (($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "auto", array(), "array") && ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "auto", array(), "array") == 1))) {
            echo " false ";
        } else {
            echo "   true  ";
        }
        echo " ,
                        animSpeed: 500,
                        pauseTime: ";
        // line 68
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "delay", array(), "array")) {
            echo "  ";
            echo $this->getAttribute((isset($context["config"]) ? $context["config"] : null), "delay", array(), "array");
            echo " ";
        } else {
            echo "   3000  ";
        }
        echo " ,
                        startSlide: 0,
                        controlNav:  ";
        // line 70
        if (($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "contrl", array(), "array") && ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "contrl", array(), "array") == 1))) {
            echo " true ";
        } else {
            echo "   false  ";
        }
        echo " ,
                        directionNav:  ";
        // line 71
        if (($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "nextback", array(), "array") && ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "nextback", array(), "array") == 1))) {
            echo " true ";
        } else {
            echo "   false  ";
        }
        echo " ,
                        controlNavThumbs: false,
                        pauseOnHover:  ";
        // line 73
        if (($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "hover", array(), "array") && ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "hover", array(), "array") == 1))) {
            echo " true ";
        } else {
            echo "   false  ";
        }
        echo " ,
                        prevText: '<i class=\"fa fa-angle-left\"></i>',
\t\t\t\t\t\tnextText: '<i class=\"fa fa-angle-right\"></i>',
\t\t\t\t\t\tafterLoad: function(){
\t\t\t\t\t\t\t\$('.oc-loading').css(\"display\",\"none\");
\t\t\t\t\t\t\t\$('.timeloading').css('animation-duration',\"";
        // line 78
        if ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "delay", array(), "array")) {
            echo " ";
            echo ($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "delay", array(), "array") . "ms");
            echo " ";
        } else {
            echo " 3000 ";
        }
        echo "\");
\t\t\t\t\t\t},\t\t\t\t\t\t
                    });
                });
\t\t\t</script>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "tt_naturecircle2/template/extension/module/ocslideshow.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 78,  228 => 73,  219 => 71,  211 => 70,  200 => 68,  191 => 66,  178 => 62,  173 => 59,  162 => 53,  152 => 50,  149 => 49,  147 => 48,  142 => 46,  138 => 44,  132 => 43,  130 => 42,  127 => 41,  121 => 40,  119 => 39,  112 => 35,  104 => 33,  102 => 32,  99 => 31,  96 => 30,  93 => 29,  91 => 28,  88 => 27,  85 => 26,  82 => 25,  80 => 24,  77 => 23,  74 => 22,  71 => 21,  68 => 20,  66 => 19,  63 => 18,  58 => 17,  56 => 16,  51 => 13,  40 => 11,  37 => 10,  32 => 9,  29 => 8,  27 => 7,  19 => 1,);
    }
}
/* <div class="banner7">*/
/* 	<div class= "oc-banner7-container">*/
/* 		<div class="flexslider oc-nivoslider">*/
/* 			<div class="oc-loading"></div>*/
/* 			<div id="oc-inivoslider1" class="nivoSlider">*/
/* */
/*                 {% set config = slide_setting[0] %}*/
/*                 {% set i=1 %}*/
/*                 {% for s in ocslideshows %}*/
/*                     {% set i=i+1 %}*/
/* 					<img style="display: none;" src="{{ s['image'] }}" alt="" title="#banner7-caption{{ i }}"  />*/
/*                 {% endfor %}*/
/* */
/* 			</div>*/
/* */
/*             {% set i=1 %}*/
/*             {% for s in ocslideshows %}*/
/* 			*/
/* 				{% set class = "" %}*/
/* 				{% if s['type'] == 1 %}*/
/* 					{% set class = 'slider-1' %}*/
/* 				{% endif %}*/
/* 				*/
/* 				{% if s['type'] == 2 %}*/
/* 					{% set class = 'slider-2' %}*/
/* 				{% endif %}*/
/* 				*/
/* 				{% if s['type'] == 3 %}*/
/* 					{% set class = 'slider-3' %}*/
/* 				{% endif %}*/
/* 				*/
/*                 {% set i=i+1 %}*/
/* 				<div id="banner7-caption{{ i }}" class="banner7-caption nivo-html-caption nivo-caption move-slides-effect" data-class="slide-movetype{{ s['type'] }}">*/
/* 					<div class="timeloading"></div>*/
/* 					<div class=" banner7-content {{ class }}">*/
/* 						<div class="container" style="height:100%;">*/
/* 							<div class="container-inner" style="height: 100%;position: relative;">*/
/* 								<div class="text-content">							*/
/* 									{%  if s['title'] and s['title'] != ""  %}*/
/* 										<h1 class="title1">{{ s['title'] }}</h1>*/
/* 									{% endif %}														*/
/* 									{%  if s['sub_title'] and s['sub_title'] != "" %}*/
/* 										<h2 class="sub-title">{{ s['sub_title'] }}</h2>*/
/* 									{% endif %}							*/
/* 									<div class="banner7-des">*/
/* 										{{ s['description'] }}*/
/* 									</div>*/
/* 									{% if s['link'] %}*/
/* 										<div class="banner7-readmore">*/
/* 											<a class="btn btnGoshop" href="{{ s['link'] }}" title="{{ text_readmore }}">{{ text_readmore }}</a>*/
/* 										</div>*/
/* 									{% endif %}*/
/* 								</div>*/
/* 							</div>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/*             {% endfor %}*/
/* 			<script >*/
/*                 $(window).load(function() {*/
/*                     $('#oc-inivoslider1').nivoSlider({*/
/*                         effect:  {% if config['effect'] %}  "{{ config['effect'] | trim }}" {% else %}   'random'  {% endif %} ,*/
/*                         slices: 15,*/
/*                         boxCols: 8,*/
/*                         boxRows: 4,*/
/*                         manualAdvance: {% if config['auto'] and config['auto'] == 1 %} false {% else %}   true  {% endif %} ,*/
/*                         animSpeed: 500,*/
/*                         pauseTime: {% if config['delay'] %}  {{ config['delay'] }} {% else %}   3000  {% endif %} ,*/
/*                         startSlide: 0,*/
/*                         controlNav:  {% if config['contrl'] and config['contrl'] == 1 %} true {% else %}   false  {% endif %} ,*/
/*                         directionNav:  {% if config['nextback'] and config['nextback'] == 1 %} true {% else %}   false  {% endif %} ,*/
/*                         controlNavThumbs: false,*/
/*                         pauseOnHover:  {% if config['hover'] and config['hover'] == 1 %} true {% else %}   false  {% endif %} ,*/
/*                         prevText: '<i class="fa fa-angle-left"></i>',*/
/* 						nextText: '<i class="fa fa-angle-right"></i>',*/
/* 						afterLoad: function(){*/
/* 							$('.oc-loading').css("display","none");*/
/* 							$('.timeloading').css('animation-duration',"{% if config['delay'] %} {{ config['delay']~'ms' }} {% else %} 3000 {% endif %}");*/
/* 						},						*/
/*                     });*/
/*                 });*/
/* 			</script>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
