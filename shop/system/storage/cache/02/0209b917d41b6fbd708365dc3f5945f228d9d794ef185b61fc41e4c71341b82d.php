<?php

/* tt_naturecircle2/template/common/search.twig */
class __TwigTemplate_9cad675df99864f0455d3ea06480465379ef1ac5f737576d13d4e07a02a3c2f7 extends Twig_Template
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
        echo "<div id=\"search\" class=\"input-group\">
\t<div class=\"btn-group\">
\t\t<div class=\"dropdown-toggle search-button\" data-toggle=\"dropdown\"></div>
\t\t<div class=\"dropdown-menu search-content\" >
\t\t\t<input type=\"text\" name=\"search\" value=\"";
        // line 5
        echo (isset($context["search"]) ? $context["search"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["text_search"]) ? $context["text_search"] : null);
        echo "\" class=\"form-control input-lg\" />
\t\t\t<span class=\"input-group-btn\">
\t\t\t<button type=\"button\" class=\"btn btn-default btn-lg\"><span>";
        // line 7
        echo (isset($context["button_search"]) ? $context["button_search"] : null);
        echo "</span></button>
\t\t\t</span>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "tt_naturecircle2/template/common/search.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 7,  25 => 5,  19 => 1,);
    }
}
/* <div id="search" class="input-group">*/
/* 	<div class="btn-group">*/
/* 		<div class="dropdown-toggle search-button" data-toggle="dropdown"></div>*/
/* 		<div class="dropdown-menu search-content" >*/
/* 			<input type="text" name="search" value="{{ search }}" placeholder="{{ text_search }}" class="form-control input-lg" />*/
/* 			<span class="input-group-btn">*/
/* 			<button type="button" class="btn btn-default btn-lg"><span>{{ button_search }}</span></button>*/
/* 			</span>*/
/* 		</div>*/
/* 	</div>*/
/* </div>*/
