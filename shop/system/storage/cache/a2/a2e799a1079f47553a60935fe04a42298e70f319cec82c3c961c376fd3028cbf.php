<?php

/* tt_naturecircle2/template/product/ocquickview/qvcontainer.twig */
class __TwigTemplate_5aacd0aec4857a4c8c6f0ae58b450fd357ddfdb1e42d2fe8407ea91119a60bae extends Twig_Template
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
        if ((isset($context["ocquickview_status"]) ? $context["ocquickview_status"] : null)) {
            // line 2
            echo "<div id=\"quickview-content\">
    <!-- Load quickview content into here -->
</div>

<div id=\"quickview-bg-block\">
    <!-- Quick View deep background -->
</div>

<div class=\"quickview-load-img\">
    <img src=\"";
            // line 11
            echo (isset($context["ocquickview_loader_img"]) ? $context["ocquickview_loader_img"] : null);
            echo "\" alt=\"\" />
</div>

<div>
    <input type=\"hidden\" id=\"qv-status\" value=\"<?php echo \$ocquickview_status; ?>\" />
    <input type=\"hidden\" id=\"qv-container\" value=\"<?php echo \$ocquickview_container ?>\" />
    <input type=\"hidden\" id=\"qv-parent-element\" value=\"<?php echo \$ocquickview_parent_element ?>\" />
    <input type=\"hidden\" id=\"qv-children-element\" value=\"<?php echo \$ocquickview_children_element ?>\" />
</div>

<script >
    \$('#quickview-bg-block').click(function () {
        ocquickview.closeQVFrame();
    })
</script>
";
        }
    }

    public function getTemplateName()
    {
        return "tt_naturecircle2/template/product/ocquickview/qvcontainer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 11,  21 => 2,  19 => 1,);
    }
}
/* {% if ocquickview_status %}*/
/* <div id="quickview-content">*/
/*     <!-- Load quickview content into here -->*/
/* </div>*/
/* */
/* <div id="quickview-bg-block">*/
/*     <!-- Quick View deep background -->*/
/* </div>*/
/* */
/* <div class="quickview-load-img">*/
/*     <img src="{{ ocquickview_loader_img }}" alt="" />*/
/* </div>*/
/* */
/* <div>*/
/*     <input type="hidden" id="qv-status" value="<?php echo $ocquickview_status; ?>" />*/
/*     <input type="hidden" id="qv-container" value="<?php echo $ocquickview_container ?>" />*/
/*     <input type="hidden" id="qv-parent-element" value="<?php echo $ocquickview_parent_element ?>" />*/
/*     <input type="hidden" id="qv-children-element" value="<?php echo $ocquickview_children_element ?>" />*/
/* </div>*/
/* */
/* <script >*/
/*     $('#quickview-bg-block').click(function () {*/
/*         ocquickview.closeQVFrame();*/
/*     })*/
/* </script>*/
/* {% endif %}*/
