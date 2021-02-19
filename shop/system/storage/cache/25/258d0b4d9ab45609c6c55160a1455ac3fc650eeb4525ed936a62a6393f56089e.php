<?php

/* tt_naturecircle2/template/common/language.twig */
class __TwigTemplate_e0299c095e93ca54a5b429abc453fb5e703a463fcfc3191655936be68eb431c0 extends Twig_Template
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
        if ((twig_length_filter($this->env, (isset($context["languages"]) ? $context["languages"] : null)) >= 1)) {
            // line 2
            echo "  <form action=\"";
            echo (isset($context["action"]) ? $context["action"] : null);
            echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-language\">
    
\t\t<span class=\"pull-left hidden-xs hidden-sm hidden-md text-ex\">";
            // line 4
            echo (isset($context["text_language"]) ? $context["text_language"] : null);
            echo ":</span>
      <button class=\"btn btn-link btn-link-current\">
      ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 7
                echo "      ";
                if (($this->getAttribute($context["language"], "code", array()) == (isset($context["code"]) ? $context["code"] : null))) {
                    echo " 
\t\t\t";
                    // line 8
                    echo $this->getAttribute($context["language"], "code", array());
                    echo "
\t\t\t<i class=\"fa fa-angle-down\"></i>
      ";
                }
                // line 11
                echo "      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo "      </button>
      <ul class=\"content\">
        ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 15
                echo "\t\t ";
                if (($this->getAttribute($context["language"], "code", array()) == (isset($context["code"]) ? $context["code"] : null))) {
                    // line 16
                    echo "\t\t\t<li><button class=\"btn btn-link btn-block language-select item-selected\" type=\"button\" name=\"";
                    echo $this->getAttribute($context["language"], "code", array());
                    echo "\"><img src=\"catalog/language/";
                    echo $this->getAttribute($context["language"], "code", array());
                    echo "/";
                    echo $this->getAttribute($context["language"], "code", array());
                    echo ".png\" alt=\"";
                    echo $this->getAttribute($context["language"], "name", array());
                    echo "\" title=\"";
                    echo $this->getAttribute($context["language"], "name", array());
                    echo "\" /> ";
                    echo $this->getAttribute($context["language"], "name", array());
                    echo "</button></li>
\t\t";
                } else {
                    // line 18
                    echo "\t\t\t<li><button class=\"btn btn-link btn-block language-select\" type=\"button\" name=\"";
                    echo $this->getAttribute($context["language"], "code", array());
                    echo "\"><img src=\"catalog/language/";
                    echo $this->getAttribute($context["language"], "code", array());
                    echo "/";
                    echo $this->getAttribute($context["language"], "code", array());
                    echo ".png\" alt=\"";
                    echo $this->getAttribute($context["language"], "name", array());
                    echo "\" title=\"";
                    echo $this->getAttribute($context["language"], "name", array());
                    echo "\" /> ";
                    echo $this->getAttribute($context["language"], "name", array());
                    echo "</button></li>
\t\t";
                }
                // line 20
                echo "      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "      </ul>
    
    <input type=\"hidden\" name=\"code\" value=\"\" />
    <input type=\"hidden\" name=\"redirect\" value=\"";
            // line 24
            echo (isset($context["redirect"]) ? $context["redirect"] : null);
            echo "\" />
  </form>
";
        }
    }

    public function getTemplateName()
    {
        return "tt_naturecircle2/template/common/language.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 24,  102 => 21,  96 => 20,  80 => 18,  64 => 16,  61 => 15,  57 => 14,  53 => 12,  47 => 11,  41 => 8,  36 => 7,  32 => 6,  27 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% if languages|length >= 1 %}*/
/*   <form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-language">*/
/*     */
/* 		<span class="pull-left hidden-xs hidden-sm hidden-md text-ex">{{ text_language }}:</span>*/
/*       <button class="btn btn-link btn-link-current">*/
/*       {% for language in languages %}*/
/*       {% if language.code == code %} */
/* 			{{ language.code }}*/
/* 			<i class="fa fa-angle-down"></i>*/
/*       {% endif %}*/
/*       {% endfor %}*/
/*       </button>*/
/*       <ul class="content">*/
/*         {% for language in languages %}*/
/* 		 {% if language.code == code %}*/
/* 			<li><button class="btn btn-link btn-block language-select item-selected" type="button" name="{{ language.code }}"><img src="catalog/language/{{ language.code }}/{{ language.code }}.png" alt="{{ language.name }}" title="{{ language.name }}" /> {{ language.name }}</button></li>*/
/* 		{% else %}*/
/* 			<li><button class="btn btn-link btn-block language-select" type="button" name="{{ language.code }}"><img src="catalog/language/{{ language.code }}/{{ language.code }}.png" alt="{{ language.name }}" title="{{ language.name }}" /> {{ language.name }}</button></li>*/
/* 		{% endif %}*/
/*       {% endfor %}*/
/*       </ul>*/
/*     */
/*     <input type="hidden" name="code" value="" />*/
/*     <input type="hidden" name="redirect" value="{{ redirect }}" />*/
/*   </form>*/
/* {% endif %}*/
/* */
