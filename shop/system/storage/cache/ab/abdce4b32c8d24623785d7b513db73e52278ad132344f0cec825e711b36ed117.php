<?php

/* tt_naturecircle2/template/common/currency.twig */
class __TwigTemplate_14601be2ec0c5126d3c02ef23d5d3da11e1b36c3ceefff04a002b5ca6c0f1187 extends Twig_Template
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
        if ((twig_length_filter($this->env, (isset($context["currencies"]) ? $context["currencies"] : null)) > 1)) {
            // line 2
            echo "<form action=\"";
            echo (isset($context["action"]) ? $context["action"] : null);
            echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-currency\">
\t
\t\t<span class=\"pull-left hidden-xs hidden-sm hidden-md text-ex\">";
            // line 4
            echo (isset($context["text_currency"]) ? $context["text_currency"] : null);
            echo ":</span>
\t  <button class=\"btn btn-link btn-link-current\">
\t\t";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["currencies"]) ? $context["currencies"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
                // line 7
                echo "\t\t\t";
                if (($this->getAttribute($context["currency"], "code", array()) == (isset($context["code"]) ? $context["code"] : null))) {
                    echo " 
\t\t\t\t";
                    // line 8
                    echo $this->getAttribute($context["currency"], "code", array());
                    echo "
\t\t\t\t<i class=\"fa fa-angle-down\"></i>
\t\t\t";
                }
                // line 11
                echo "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo " 
\t  </button>
\t  <ul class=\"content\">
\t\t";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["currencies"]) ? $context["currencies"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
                // line 15
                echo "\t\t";
                if (($this->getAttribute($context["currency"], "code", array()) == (isset($context["code"]) ? $context["code"] : null))) {
                    // line 16
                    echo "\t\t<li>
\t\t  <button class=\"item-selected currency-select btn btn-link btn-block\" type=\"button\" name=\"";
                    // line 17
                    echo $this->getAttribute($context["currency"], "code", array());
                    echo "\">
\t\t\t";
                    // line 18
                    if ($this->getAttribute($context["currency"], "symbol_left", array())) {
                        echo " 
\t\t\t\t";
                        // line 19
                        echo $this->getAttribute($context["currency"], "symbol_left", array());
                        echo "
\t\t\t";
                    }
                    // line 20
                    echo "\t\t\t
\t\t\t";
                    // line 21
                    echo $this->getAttribute($context["currency"], "title", array());
                    echo "
\t\t\t";
                    // line 22
                    if ($this->getAttribute($context["currency"], "symbol_right", array())) {
                        echo " 
\t\t\t\t";
                        // line 23
                        echo $this->getAttribute($context["currency"], "symbol_right", array());
                        echo "
\t\t\t";
                    }
                    // line 25
                    echo "\t\t</button>
\t\t</li>
\t\t";
                } else {
                    // line 28
                    echo "\t\t<li>
\t\t  <button class=\"currency-select btn btn-link btn-block\" type=\"button\" name=\"";
                    // line 29
                    echo $this->getAttribute($context["currency"], "code", array());
                    echo "\">
\t\t\t";
                    // line 30
                    if ($this->getAttribute($context["currency"], "symbol_left", array())) {
                        echo " 
\t\t\t\t";
                        // line 31
                        echo $this->getAttribute($context["currency"], "symbol_left", array());
                        echo "
\t\t\t";
                    }
                    // line 32
                    echo "\t\t\t
\t\t\t";
                    // line 33
                    echo $this->getAttribute($context["currency"], "title", array());
                    echo "
\t\t\t";
                    // line 34
                    if ($this->getAttribute($context["currency"], "symbol_right", array())) {
                        echo " 
\t\t\t\t";
                        // line 35
                        echo $this->getAttribute($context["currency"], "symbol_right", array());
                        echo "
\t\t\t";
                    }
                    // line 37
                    echo "\t\t  </button>
\t\t</li>
\t\t";
                }
                // line 40
                echo "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "\t  </ul>
\t
\t<input type=\"hidden\" name=\"code\" value=\"\" />
\t<input type=\"hidden\" name=\"redirect\" value=\"";
            // line 44
            echo (isset($context["redirect"]) ? $context["redirect"] : null);
            echo "\" />
</form>
";
        }
        // line 46
        echo " ";
    }

    public function getTemplateName()
    {
        return "tt_naturecircle2/template/common/currency.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 46,  149 => 44,  144 => 41,  138 => 40,  133 => 37,  128 => 35,  124 => 34,  120 => 33,  117 => 32,  112 => 31,  108 => 30,  104 => 29,  101 => 28,  96 => 25,  91 => 23,  87 => 22,  83 => 21,  80 => 20,  75 => 19,  71 => 18,  67 => 17,  64 => 16,  61 => 15,  57 => 14,  47 => 11,  41 => 8,  36 => 7,  32 => 6,  27 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% if currencies|length > 1 %}*/
/* <form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-currency">*/
/* 	*/
/* 		<span class="pull-left hidden-xs hidden-sm hidden-md text-ex">{{ text_currency }}:</span>*/
/* 	  <button class="btn btn-link btn-link-current">*/
/* 		{% for currency in currencies %}*/
/* 			{% if currency.code == code %} */
/* 				{{ currency.code }}*/
/* 				<i class="fa fa-angle-down"></i>*/
/* 			{% endif %}*/
/* 		{% endfor %} */
/* 	  </button>*/
/* 	  <ul class="content">*/
/* 		{% for currency in currencies %}*/
/* 		{% if currency.code == code %}*/
/* 		<li>*/
/* 		  <button class="item-selected currency-select btn btn-link btn-block" type="button" name="{{ currency.code }}">*/
/* 			{% if currency.symbol_left %} */
/* 				{{ currency.symbol_left }}*/
/* 			{% endif %}			*/
/* 			{{ currency.title }}*/
/* 			{% if currency.symbol_right %} */
/* 				{{ currency.symbol_right }}*/
/* 			{% endif %}*/
/* 		</button>*/
/* 		</li>*/
/* 		{% else %}*/
/* 		<li>*/
/* 		  <button class="currency-select btn btn-link btn-block" type="button" name="{{ currency.code }}">*/
/* 			{% if currency.symbol_left %} */
/* 				{{ currency.symbol_left }}*/
/* 			{% endif %}			*/
/* 			{{ currency.title }}*/
/* 			{% if currency.symbol_right %} */
/* 				{{ currency.symbol_right }}*/
/* 			{% endif %}*/
/* 		  </button>*/
/* 		</li>*/
/* 		{% endif %}*/
/* 		{% endfor %}*/
/* 	  </ul>*/
/* 	*/
/* 	<input type="hidden" name="code" value="" />*/
/* 	<input type="hidden" name="redirect" value="{{ redirect }}" />*/
/* </form>*/
/* {% endif %} */
