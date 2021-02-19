<?php

/* tt_naturecircle2/template/common/header.twig */
class __TwigTemplate_60efcff0321ae87ee430c86b01757960497d94b2957c31fb6e9de9fd3fdc3a6d extends Twig_Template
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
        echo "<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir=\"";
        // line 3
        echo (isset($context["direction"]) ? $context["direction"] : null);
        echo "\" lang=\"";
        echo (isset($context["lang"]) ? $context["lang"] : null);
        echo "\" class=\"ie8\"><![endif]-->
<!--[if IE 9 ]><html dir=\"";
        // line 4
        echo (isset($context["direction"]) ? $context["direction"] : null);
        echo "\" lang=\"";
        echo (isset($context["lang"]) ? $context["lang"] : null);
        echo "\" class=\"ie9\"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir=\"";
        // line 6
        echo (isset($context["direction"]) ? $context["direction"] : null);
        echo "\" lang=\"";
        echo (isset($context["lang"]) ? $context["lang"] : null);
        echo "\">
<!--<![endif]-->
<head>
<meta charset=\"UTF-8\" />
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
<title>";
        // line 12
        echo (isset($context["title"]) ? $context["title"] : null);
        echo "</title>
<base href=\"";
        // line 13
        echo (isset($context["base"]) ? $context["base"] : null);
        echo "\" />
";
        // line 14
        if ((isset($context["description"]) ? $context["description"] : null)) {
            // line 15
            echo "<meta name=\"description\" content=\"";
            echo (isset($context["description"]) ? $context["description"] : null);
            echo "\" />
";
        }
        // line 17
        if ((isset($context["keywords"]) ? $context["keywords"] : null)) {
            // line 18
            echo "<meta name=\"keywords\" content=\"";
            echo (isset($context["keywords"]) ? $context["keywords"] : null);
            echo "\" />
";
        }
        // line 20
        echo "<script src=\"catalog/view/javascript/jquery/jquery-2.1.1.min.js\" ></script>

<script src=\"catalog/view/javascript/jquery/jquery-ui.min.js\" ></script>
<script src=\"catalog/view/javascript/opentheme/ocquickview/ocquickview.js\" ></script>
<link href=\"catalog/view/theme/tt_naturecircle2/stylesheet/opentheme/ocquickview/css/ocquickview.css\" rel=\"stylesheet\" type=\"text/css\" />
<script src=\"catalog/view/javascript/jquery/owl-carousel/js/owl.carousel.min.js\" ></script>
<link href=\"catalog/view/javascript/jquery/owl-carousel/css/owl.carousel.min.css\" rel=\"stylesheet\" />
<link href=\"catalog/view/javascript/jquery/owl-carousel/css/owl.theme.green.min.css\" rel=\"stylesheet\" />
<script src=\"catalog/view/javascript/jquery/elevatezoom/jquery.elevatezoom.js\" ></script>
<script src=\"catalog/view/javascript/opentheme/countdown/jquery.plugin.min.js\" ></script>
<script src=\"catalog/view/javascript/opentheme/countdown/jquery.countdown.min.js\" ></script>
<script src=\"catalog/view/javascript/opentheme/hozmegamenu/custommenu.js\" ></script>
<script src=\"catalog/view/javascript/opentheme/hozmegamenu/mobile_menu.js\" ></script>
<script src=\"catalog/view/javascript/opentheme/vermegamenu/ver_menu.js\" ></script>
<link href=\"catalog/view/theme/tt_naturecircle2/stylesheet/opentheme/vermegamenu/css/ocvermegamenu.css\" rel=\"stylesheet\" />
<link href=\"catalog/view/theme/tt_naturecircle2/stylesheet/opentheme/hozmegamenu/css/custommenu.css\" rel=\"stylesheet\" />
<link href=\"catalog/view/theme/tt_naturecircle2/stylesheet/opentheme/css/animate.css\" rel=\"stylesheet\" />

<link href=\"catalog/view/javascript/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\" />
<script src=\"catalog/view/javascript/bootstrap/js/bootstrap.min.js\" ></script>
<link href=\"catalog/view/javascript/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"catalog/view/javascript/pe-icon-7-stroke/css/pe-icon-7-stroke.css\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"catalog/view/javascript/pe-icon-7-stroke/css/helper.css\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"catalog/view/javascript/ionicons/css/ionicons.css\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"catalog/view/javascript/stroke-gap-icons/css/stroke-gap-icons.css\" rel=\"stylesheet\" type=\"text/css\" />

<link href=\"https://fonts.googleapis.com/css?family=Poppins:400,500,600,700\" rel=\"stylesheet\" />
<link href=\"https://fonts.googleapis.com/css?family=Oswald:200,500,600,700\" rel=\"stylesheet\" />
<link href=\"https://fonts.googleapis.com/css?family=Playfair+Display:700,900\" rel=\"stylesheet\" />

<link href=\"catalog/view/theme/tt_naturecircle2/stylesheet/stylesheet.css\" rel=\"stylesheet\" />
<link rel=\"stylesheet\" href=\"https://use.typekit.net/shb8xdz.css\">
<link rel=\"stylesheet\" href=\"css/fontawesome-pro-5.7.0-web/css/all.css\">
<link href=\"catalog/view/theme/tt_naturecircle2/stylesheet/styles.css\" rel=\"stylesheet\" />

";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["styles"]) ? $context["styles"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["style"]) {
            // line 56
            echo "<link href=\"";
            echo $this->getAttribute($context["style"], "href", array());
            echo "\" type=\"text/css\" rel=\"";
            echo $this->getAttribute($context["style"], "rel", array());
            echo "\" media=\"";
            echo $this->getAttribute($context["style"], "media", array());
            echo "\" />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['style'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["scripts"]) ? $context["scripts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 59
            echo "<script src=\"";
            echo $context["script"];
            echo "\" ></script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "<script src=\"catalog/view/javascript/common.js\" ></script>
";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["links"]) ? $context["links"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            // line 63
            echo "<link href=\"";
            echo $this->getAttribute($context["link"], "href", array());
            echo "\" rel=\"";
            echo $this->getAttribute($context["link"], "rel", array());
            echo "\" />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["analytics"]) ? $context["analytics"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["analytic"]) {
            // line 66
            echo $context["analytic"];
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['analytic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        if ($this->getAttribute((isset($context["theme_option_status"]) ? $context["theme_option_status"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array")) {
            // line 69
            echo "  <script src=\"https://ajax.googleapis.com/ajax/libs/webfont/1.5.10/webfont.js\"></script>
  <script>
    WebFont.load({
      google: {
        ";
            // line 73
            if (($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_family", array()) == $this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_family", array()))) {
                // line 74
                echo "\t\tfamilies: ['";
                echo (($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_family", array())) ? ($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_family", array())) : (""));
                echo "']
\t\t";
            } else {
                // line 76
                echo "\t\tfamilies: ['";
                echo (($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_family", array())) ? ($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_family", array())) : (""));
                echo "', '";
                echo (($this->getAttribute($this->getAttribute((isset($context["body_css"]) ? $context["body_css"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_family", array())) ? ($this->getAttribute($this->getAttribute((isset($context["body_css"]) ? $context["body_css"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_family", array())) : (""));
                echo "']
\t\t";
            }
            // line 78
            echo "      }
    });
\t
  </script>
  <style>
    ";
            // line 83
            if ((isset($context["a_tag"]) ? $context["a_tag"] : null)) {
                // line 84
                echo "    ";
                echo (($this->getAttribute($this->getAttribute((isset($context["a_tag"]) ? $context["a_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "color", array())) ? ((("a { color: #" . $this->getAttribute($this->getAttribute((isset($context["a_tag"]) ? $context["a_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "color", array())) . "; }")) : (""));
                echo "
    ";
                // line 85
                echo (($this->getAttribute($this->getAttribute((isset($context["a_tag"]) ? $context["a_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "hover_color", array())) ? ((("a:hover { color: #" . $this->getAttribute($this->getAttribute((isset($context["a_tag"]) ? $context["a_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "hover_color", array())) . "; }")) : (""));
                echo "
    ";
            }
            // line 87
            echo "
    ";
            // line 88
            if ((isset($context["header_tag"]) ? $context["header_tag"] : null)) {
                // line 89
                echo "    h1, h2, h3, h4, h5, h6 {
    ";
                // line 90
                echo (($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "color", array())) ? ((("color: #" . $this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "color", array())) . ";")) : (""));
                echo "
    ";
                // line 91
                echo (($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_family", array())) ? ((("font-family: " . $this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_family", array())) . ";")) : (""));
                echo "
    ";
                // line 92
                echo (($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_weight", array())) ? ((("font-weight: " . $this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_weight", array())) . ";")) : (""));
                echo "
    }
    ";
                // line 94
                echo (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "h1", array()), "font_size", array())) ? ((("h1 { font-size: " . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "h1", array()), "font_size", array())) . "; }")) : (""));
                echo "
    ";
                // line 95
                echo (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "h2", array()), "font_size", array())) ? ((("h2 { font-size: " . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "h2", array()), "font_size", array())) . "; }")) : (""));
                echo "
    ";
                // line 96
                echo (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "h3", array()), "font_size", array())) ? ((("h3 { font-size: " . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "h3", array()), "font_size", array())) . "; }")) : (""));
                echo "
    ";
                // line 97
                echo (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "h4", array()), "font_size", array())) ? ((("h4 { font-size: " . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "h4", array()), "font_size", array())) . "; }")) : (""));
                echo "
    ";
                // line 98
                echo (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "h5", array()), "font_size", array())) ? ((("h5 { font-size: " . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "h5", array()), "font_size", array())) . "; }")) : (""));
                echo "
    ";
                // line 99
                echo (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "h6", array()), "font_size", array())) ? ((("h6 { font-size: " . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["header_tag"]) ? $context["header_tag"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "h6", array()), "font_size", array())) . "; }")) : (""));
                echo "
    ";
            }
            // line 101
            echo "
    ";
            // line 102
            if ((isset($context["body_css"]) ? $context["body_css"] : null)) {
                // line 103
                echo "    body {
    ";
                // line 104
                echo (($this->getAttribute($this->getAttribute((isset($context["body_css"]) ? $context["body_css"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "color", array())) ? ((("color: #" . $this->getAttribute($this->getAttribute((isset($context["body_css"]) ? $context["body_css"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "color", array())) . ";")) : (""));
                echo "
    ";
                // line 105
                echo (($this->getAttribute($this->getAttribute((isset($context["body_css"]) ? $context["body_css"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_family", array())) ? ((("font-family: " . $this->getAttribute($this->getAttribute((isset($context["body_css"]) ? $context["body_css"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_family", array())) . ";")) : (""));
                echo "
    ";
                // line 106
                echo (($this->getAttribute($this->getAttribute((isset($context["body_css"]) ? $context["body_css"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_size", array())) ? ((("font-size: " . $this->getAttribute($this->getAttribute((isset($context["body_css"]) ? $context["body_css"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_size", array())) . ";")) : (""));
                echo "
    ";
                // line 107
                echo (($this->getAttribute($this->getAttribute((isset($context["body_css"]) ? $context["body_css"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_weight", array())) ? ((("font-weight: " . $this->getAttribute($this->getAttribute((isset($context["body_css"]) ? $context["body_css"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "font_weight", array())) . ";")) : (""));
                echo "
    ";
                // line 108
                echo (($this->getAttribute($this->getAttribute((isset($context["body_css"]) ? $context["body_css"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "line_height", array())) ? ((("line-height: " . $this->getAttribute($this->getAttribute((isset($context["body_css"]) ? $context["body_css"] : null), (isset($context["store_id"]) ? $context["store_id"] : null), array(), "array"), "line_height", array())) . ";")) : (""));
                echo "
    }
    ";
            }
            // line 111
            echo "  </style>
";
        }
        // line 113
        echo "</head>
<body class=\"";
        // line 114
        echo (isset($context["class"]) ? $context["class"] : null);
        echo " home2\">
<div class=\"wrapper\">
<header>
\t<div class=\"header-inner fix\" >
\t\t<div class=\"container-inner\">
\t\t\t<div class=\"logo-container\">
\t\t\t\t<div id=\"logo\">
\t\t\t\t  ";
        // line 121
        if ((isset($context["logo"]) ? $context["logo"] : null)) {
            // line 122
            echo "\t\t\t\t\t<a href=\"";
            echo (isset($context["home"]) ? $context["home"] : null);
            echo "\"><img src=\"";
            echo (isset($context["logo"]) ? $context["logo"] : null);
            echo "\" title=\"";
            echo (isset($context["name"]) ? $context["name"] : null);
            echo "\" alt=\"";
            echo (isset($context["name"]) ? $context["name"] : null);
            echo "\" class=\"img-responsive\" /></a>
\t\t\t\t  ";
        } else {
            // line 124
            echo "\t\t\t\t\t<h1><a href=\"";
            echo (isset($context["home"]) ? $context["home"] : null);
            echo "\">";
            echo (isset($context["name"]) ? $context["name"] : null);
            echo "</a></h1>
\t\t\t\t  ";
        }
        // line 126
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"box box-left\">
\t\t\t\t";
        // line 129
        if ((isset($context["block1"]) ? $context["block1"] : null)) {
            // line 130
            echo "\t\t\t\t\t";
            echo (isset($context["block1"]) ? $context["block1"] : null);
            echo "
\t\t\t\t";
        }
        // line 132
        echo "\t\t\t</div>
\t\t\t<div class=\"box box-right\">
\t\t\t\t";
        // line 134
        echo (isset($context["search"]) ? $context["search"] : null);
        echo "
\t\t\t\t
\t\t\t\t<div class=\"box-setting\">
\t\t\t\t\t<div class=\"btn-group\">\t
\t\t\t\t\t\t<div class=\"dropdown-toggle setting-button\" data-toggle=\"dropdown\"></div>
\t\t\t\t\t\t<div class=\"dropdown-menu setting-content\">
\t\t\t\t\t\t\t<div class=\"account\">
\t\t\t\t\t\t\t\t<button class=\"btn btn-link btn-link-current\">";
        // line 141
        echo (isset($context["text_account"]) ? $context["text_account"] : null);
        echo " <i class=\"fa fa-angle-down\"></i></button>
\t\t\t\t\t\t\t\t<div class=\"content\"  id=\"top-links\">
\t\t\t\t\t\t\t\t\t";
        // line 143
        if ((isset($context["use_ajax_login"]) ? $context["use_ajax_login"] : null)) {
            // line 144
            echo "\t\t\t\t\t\t\t\t\t\t<ul class=\"ul-account list-unstyled\">
\t\t\t\t\t\t\t\t\t";
        } else {
            // line 146
            echo "\t\t\t\t\t\t\t\t\t\t<ul class=\"list-unstyled\">
\t\t\t\t\t\t\t\t\t";
        }
        // line 148
        echo "\t\t\t\t\t\t\t\t\t";
        if ((isset($context["logged"]) ? $context["logged"] : null)) {
            // line 149
            echo "\t\t\t\t\t\t\t\t\t<li><a href=\"";
            echo (isset($context["account"]) ? $context["account"] : null);
            echo "\">";
            echo (isset($context["text_account"]) ? $context["text_account"] : null);
            echo "</a></li>
\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 150
            echo (isset($context["order"]) ? $context["order"] : null);
            echo "\">";
            echo (isset($context["text_order"]) ? $context["text_order"] : null);
            echo "</a></li>
\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 151
            echo (isset($context["transaction"]) ? $context["transaction"] : null);
            echo "\">";
            echo (isset($context["text_transaction"]) ? $context["text_transaction"] : null);
            echo "</a></li>
\t\t\t\t\t\t\t\t\t<li><a href=\"";
            // line 152
            echo (isset($context["download"]) ? $context["download"] : null);
            echo "\">";
            echo (isset($context["text_download"]) ? $context["text_download"] : null);
            echo "</a></li>\t\t\t\t
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t";
            // line 154
            if ((isset($context["use_ajax_login"]) ? $context["use_ajax_login"] : null)) {
                // line 155
                echo "\t\t\t\t\t\t\t\t\t\t\t<a id=\"a-logout-link\" href=\"";
                echo (isset($context["logout"]) ? $context["logout"] : null);
                echo "\">";
                echo (isset($context["text_logout"]) ? $context["text_logout"] : null);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 157
                echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                echo (isset($context["logout"]) ? $context["logout"] : null);
                echo "\">";
                echo (isset($context["text_logout"]) ? $context["text_logout"] : null);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 159
            echo "\t\t\t\t\t\t\t\t\t</li>\t\t\t
\t\t\t\t\t\t\t\t\t";
        } else {
            // line 161
            echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t";
            // line 162
            if ((isset($context["use_ajax_login"]) ? $context["use_ajax_login"] : null)) {
                // line 163
                echo "\t\t\t\t\t\t\t\t\t\t\t<a id=\"a-register-link\" href=\"";
                echo (isset($context["register"]) ? $context["register"] : null);
                echo "\">";
                echo (isset($context["text_register"]) ? $context["text_register"] : null);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 165
                echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                echo (isset($context["register"]) ? $context["register"] : null);
                echo "\">";
                echo (isset($context["text_register"]) ? $context["text_register"] : null);
                echo "</a> 
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 167
            echo "\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t";
            // line 169
            if ((isset($context["use_ajax_login"]) ? $context["use_ajax_login"] : null)) {
                // line 170
                echo "\t\t\t\t\t\t\t\t\t\t\t<a id=\"a-login-link\" href=\"";
                echo (isset($context["login"]) ? $context["login"] : null);
                echo "\">";
                echo (isset($context["text_login"]) ? $context["text_login"] : null);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 172
                echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                echo (isset($context["login"]) ? $context["login"] : null);
                echo "\">";
                echo (isset($context["text_login"]) ? $context["text_login"] : null);
                echo "</a> 
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 174
            echo "\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
        }
        // line 176
        echo "\t\t\t\t\t\t\t\t  </ul>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"currency\">";
        // line 179
        echo (isset($context["currency"]) ? $context["currency"] : null);
        echo "</div>
\t\t\t\t\t\t\t<div class=\"language\">";
        // line 180
        echo (isset($context["language"]) ? $context["language"] : null);
        echo "</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        // line 184
        echo (isset($context["cart"]) ? $context["cart"] : null);
        echo "
\t\t\t</div>
\t\t  <div class=\"clearfix\"></div>
\t\t</div>
\t\t</div>
</header>";
    }

    public function getTemplateName()
    {
        return "tt_naturecircle2/template/common/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  482 => 184,  475 => 180,  471 => 179,  466 => 176,  462 => 174,  454 => 172,  446 => 170,  444 => 169,  440 => 167,  432 => 165,  424 => 163,  422 => 162,  419 => 161,  415 => 159,  407 => 157,  399 => 155,  397 => 154,  390 => 152,  384 => 151,  378 => 150,  371 => 149,  368 => 148,  364 => 146,  360 => 144,  358 => 143,  353 => 141,  343 => 134,  339 => 132,  333 => 130,  331 => 129,  326 => 126,  318 => 124,  306 => 122,  304 => 121,  294 => 114,  291 => 113,  287 => 111,  281 => 108,  277 => 107,  273 => 106,  269 => 105,  265 => 104,  262 => 103,  260 => 102,  257 => 101,  252 => 99,  248 => 98,  244 => 97,  240 => 96,  236 => 95,  232 => 94,  227 => 92,  223 => 91,  219 => 90,  216 => 89,  214 => 88,  211 => 87,  206 => 85,  201 => 84,  199 => 83,  192 => 78,  184 => 76,  178 => 74,  176 => 73,  170 => 69,  168 => 68,  160 => 66,  156 => 65,  145 => 63,  141 => 62,  138 => 61,  129 => 59,  125 => 58,  112 => 56,  108 => 55,  71 => 20,  65 => 18,  63 => 17,  57 => 15,  55 => 14,  51 => 13,  47 => 12,  36 => 6,  29 => 4,  23 => 3,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <!--[if IE]><![endif]-->*/
/* <!--[if IE 8 ]><html dir="{{ direction }}" lang="{{ lang }}" class="ie8"><![endif]-->*/
/* <!--[if IE 9 ]><html dir="{{ direction }}" lang="{{ lang }}" class="ie9"><![endif]-->*/
/* <!--[if (gt IE 9)|!(IE)]><!-->*/
/* <html dir="{{ direction }}" lang="{{ lang }}">*/
/* <!--<![endif]-->*/
/* <head>*/
/* <meta charset="UTF-8" />*/
/* <meta name="viewport" content="width=device-width, initial-scale=1">*/
/* <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/* <title>{{ title }}</title>*/
/* <base href="{{ base }}" />*/
/* {% if description %}*/
/* <meta name="description" content="{{ description }}" />*/
/* {% endif %}*/
/* {% if keywords %}*/
/* <meta name="keywords" content="{{ keywords }}" />*/
/* {% endif %}*/
/* <script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" ></script>*/
/* */
/* <script src="catalog/view/javascript/jquery/jquery-ui.min.js" ></script>*/
/* <script src="catalog/view/javascript/opentheme/ocquickview/ocquickview.js" ></script>*/
/* <link href="catalog/view/theme/tt_naturecircle2/stylesheet/opentheme/ocquickview/css/ocquickview.css" rel="stylesheet" type="text/css" />*/
/* <script src="catalog/view/javascript/jquery/owl-carousel/js/owl.carousel.min.js" ></script>*/
/* <link href="catalog/view/javascript/jquery/owl-carousel/css/owl.carousel.min.css" rel="stylesheet" />*/
/* <link href="catalog/view/javascript/jquery/owl-carousel/css/owl.theme.green.min.css" rel="stylesheet" />*/
/* <script src="catalog/view/javascript/jquery/elevatezoom/jquery.elevatezoom.js" ></script>*/
/* <script src="catalog/view/javascript/opentheme/countdown/jquery.plugin.min.js" ></script>*/
/* <script src="catalog/view/javascript/opentheme/countdown/jquery.countdown.min.js" ></script>*/
/* <script src="catalog/view/javascript/opentheme/hozmegamenu/custommenu.js" ></script>*/
/* <script src="catalog/view/javascript/opentheme/hozmegamenu/mobile_menu.js" ></script>*/
/* <script src="catalog/view/javascript/opentheme/vermegamenu/ver_menu.js" ></script>*/
/* <link href="catalog/view/theme/tt_naturecircle2/stylesheet/opentheme/vermegamenu/css/ocvermegamenu.css" rel="stylesheet" />*/
/* <link href="catalog/view/theme/tt_naturecircle2/stylesheet/opentheme/hozmegamenu/css/custommenu.css" rel="stylesheet" />*/
/* <link href="catalog/view/theme/tt_naturecircle2/stylesheet/opentheme/css/animate.css" rel="stylesheet" />*/
/* */
/* <link href="catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />*/
/* <script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js" ></script>*/
/* <link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />*/
/* <link href="catalog/view/javascript/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css" />*/
/* <link href="catalog/view/javascript/pe-icon-7-stroke/css/helper.css" rel="stylesheet" type="text/css" />*/
/* <link href="catalog/view/javascript/ionicons/css/ionicons.css" rel="stylesheet" type="text/css" />*/
/* <link href="catalog/view/javascript/stroke-gap-icons/css/stroke-gap-icons.css" rel="stylesheet" type="text/css" />*/
/* */
/* <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet" />*/
/* <link href="https://fonts.googleapis.com/css?family=Oswald:200,500,600,700" rel="stylesheet" />*/
/* <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet" />*/
/* */
/* <link href="catalog/view/theme/tt_naturecircle2/stylesheet/stylesheet.css" rel="stylesheet" />*/
/* <link rel="stylesheet" href="https://use.typekit.net/shb8xdz.css">*/
/* <link rel="stylesheet" href="css/fontawesome-pro-5.7.0-web/css/all.css">*/
/* <link href="catalog/view/theme/tt_naturecircle2/stylesheet/styles.css" rel="stylesheet" />*/
/* */
/* {% for style in styles %}*/
/* <link href="{{ style.href }}" type="text/css" rel="{{ style.rel }}" media="{{ style.media }}" />*/
/* {% endfor %}*/
/* {% for script in scripts %}*/
/* <script src="{{ script }}" ></script>*/
/* {% endfor %}*/
/* <script src="catalog/view/javascript/common.js" ></script>*/
/* {% for link in links %}*/
/* <link href="{{ link.href }}" rel="{{ link.rel }}" />*/
/* {% endfor %}*/
/* {% for analytic in analytics %}*/
/* {{ analytic }}*/
/* {% endfor %}*/
/* {% if theme_option_status[store_id] %}*/
/*   <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.10/webfont.js"></script>*/
/*   <script>*/
/*     WebFont.load({*/
/*       google: {*/
/*         {% if header_tag[store_id].font_family == header_tag[store_id].font_family %}*/
/* 		families: ['{{ header_tag[store_id].font_family ? header_tag[store_id].font_family }}']*/
/* 		{% else %}*/
/* 		families: ['{{ header_tag[store_id].font_family ? header_tag[store_id].font_family }}', '{{ body_css[store_id].font_family ? body_css[store_id].font_family }}']*/
/* 		{% endif %}*/
/*       }*/
/*     });*/
/* 	*/
/*   </script>*/
/*   <style>*/
/*     {% if a_tag %}*/
/*     {{ a_tag[store_id].color ? 'a { color: #' ~ a_tag[store_id].color ~ '; }' : '' }}*/
/*     {{ a_tag[store_id].hover_color ? 'a:hover { color: #' ~ a_tag[store_id].hover_color ~ '; }' : '' }}*/
/*     {% endif %}*/
/* */
/*     {% if header_tag %}*/
/*     h1, h2, h3, h4, h5, h6 {*/
/*     {{ header_tag[store_id].color ? 'color: #' ~ header_tag[store_id].color ~ ';' : '' }}*/
/*     {{ header_tag[store_id].font_family ? 'font-family: ' ~ header_tag[store_id].font_family ~ ';' : '' }}*/
/*     {{ header_tag[store_id].font_weight ? 'font-weight: ' ~ header_tag[store_id].font_weight ~ ';' : ''}}*/
/*     }*/
/*     {{ header_tag[store_id].h1.font_size ? 'h1 { font-size: ' ~ header_tag[store_id].h1.font_size ~ '; }' : '' }}*/
/*     {{ header_tag[store_id].h2.font_size ? 'h2 { font-size: ' ~ header_tag[store_id].h2.font_size ~ '; }' : '' }}*/
/*     {{ header_tag[store_id].h3.font_size ? 'h3 { font-size: ' ~ header_tag[store_id].h3.font_size ~ '; }' : '' }}*/
/*     {{ header_tag[store_id].h4.font_size ? 'h4 { font-size: ' ~ header_tag[store_id].h4.font_size ~ '; }' : '' }}*/
/*     {{ header_tag[store_id].h5.font_size ? 'h5 { font-size: ' ~ header_tag[store_id].h5.font_size ~ '; }' : '' }}*/
/*     {{ header_tag[store_id].h6.font_size ? 'h6 { font-size: ' ~ header_tag[store_id].h6.font_size ~ '; }' : '' }}*/
/*     {% endif %}*/
/* */
/*     {% if body_css %}*/
/*     body {*/
/*     {{ body_css[store_id].color ? 'color: #' ~ body_css[store_id].color ~ ';' : '' }}*/
/*     {{ body_css[store_id].font_family ? 'font-family: ' ~ body_css[store_id].font_family ~ ';' : '' }}*/
/*     {{ body_css[store_id].font_size ? 'font-size: ' ~ body_css[store_id].font_size ~ ';' : '' }}*/
/*     {{ body_css[store_id].font_weight ? 'font-weight: ' ~ body_css[store_id].font_weight ~ ';' : '' }}*/
/*     {{ body_css[store_id].line_height ? 'line-height: ' ~ body_css[store_id].line_height ~ ';' : '' }}*/
/*     }*/
/*     {% endif %}*/
/*   </style>*/
/* {% endif %}*/
/* </head>*/
/* <body class="{{ class }} home2">*/
/* <div class="wrapper">*/
/* <header>*/
/* 	<div class="header-inner fix" >*/
/* 		<div class="container-inner">*/
/* 			<div class="logo-container">*/
/* 				<div id="logo">*/
/* 				  {% if logo %}*/
/* 					<a href="{{ home }}"><img src="{{ logo }}" title="{{ name }}" alt="{{ name }}" class="img-responsive" /></a>*/
/* 				  {% else %}*/
/* 					<h1><a href="{{ home }}">{{ name }}</a></h1>*/
/* 				  {% endif %}*/
/* 				</div>*/
/* 			</div>*/
/* 			<div class="box box-left">*/
/* 				{% if block1 %}*/
/* 					{{ block1 }}*/
/* 				{% endif %}*/
/* 			</div>*/
/* 			<div class="box box-right">*/
/* 				{{ search }}*/
/* 				*/
/* 				<div class="box-setting">*/
/* 					<div class="btn-group">	*/
/* 						<div class="dropdown-toggle setting-button" data-toggle="dropdown"></div>*/
/* 						<div class="dropdown-menu setting-content">*/
/* 							<div class="account">*/
/* 								<button class="btn btn-link btn-link-current">{{ text_account }} <i class="fa fa-angle-down"></i></button>*/
/* 								<div class="content"  id="top-links">*/
/* 									{% if use_ajax_login %}*/
/* 										<ul class="ul-account list-unstyled">*/
/* 									{% else %}*/
/* 										<ul class="list-unstyled">*/
/* 									{% endif %}*/
/* 									{% if logged %}*/
/* 									<li><a href="{{ account }}">{{ text_account }}</a></li>*/
/* 									<li><a href="{{ order }}">{{ text_order }}</a></li>*/
/* 									<li><a href="{{ transaction }}">{{ text_transaction }}</a></li>*/
/* 									<li><a href="{{ download }}">{{ text_download }}</a></li>				*/
/* 									<li>*/
/* 										{% if use_ajax_login %}*/
/* 											<a id="a-logout-link" href="{{ logout }}">{{ text_logout }}</a>*/
/* 										{% else %}*/
/* 											<a href="{{ logout }}">{{ text_logout }}</a>*/
/* 										{% endif %}*/
/* 									</li>			*/
/* 									{% else %}*/
/* 									<li>*/
/* 										{% if use_ajax_login %}*/
/* 											<a id="a-register-link" href="{{ register }}">{{ text_register }}</a>*/
/* 										{% else %}*/
/* 											<a href="{{ register }}">{{ text_register }}</a> */
/* 										{% endif %}*/
/* 									</li>*/
/* 									<li>*/
/* 										{% if use_ajax_login %}*/
/* 											<a id="a-login-link" href="{{ login }}">{{ text_login }}</a>*/
/* 										{% else %}*/
/* 											<a href="{{ login }}">{{ text_login }}</a> */
/* 										{% endif %}*/
/* 									</li>*/
/* 									{% endif %}*/
/* 								  </ul>*/
/* 								</div>*/
/* 							</div>*/
/* 							<div class="currency">{{ currency }}</div>*/
/* 							<div class="language">{{ language }}</div>*/
/* 						</div>*/
/* 					</div>*/
/* 				</div>*/
/* 				{{ cart }}*/
/* 			</div>*/
/* 		  <div class="clearfix"></div>*/
/* 		</div>*/
/* 		</div>*/
/* </header>*/
