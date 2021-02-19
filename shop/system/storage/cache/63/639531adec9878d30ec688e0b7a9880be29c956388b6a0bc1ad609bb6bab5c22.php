<?php

/* tt_naturecircle2/template/extension/module/occmsblock.twig */
class __TwigTemplate_763f4f4778512059ab578128cb20e83f201da56977406c518754338fe127fe7e extends Twig_Template
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
        echo $this->getAttribute($this->getAttribute((isset($context["cmsblocks"]) ? $context["cmsblocks"] : null), 0, array(), "array"), "description", array(), "array");
    }

    public function getTemplateName()
    {
        return "tt_naturecircle2/template/extension/module/occmsblock.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* {{ cmsblocks[0]['description']  }}*/
