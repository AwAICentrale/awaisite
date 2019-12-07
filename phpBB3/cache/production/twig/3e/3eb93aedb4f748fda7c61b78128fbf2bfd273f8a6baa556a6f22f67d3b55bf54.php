<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* breadcrumb.html */
class __TwigTemplate_7469327dacbd7bda583bef586fc7cd5253abfea45104fd0edab1ee85353d366d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div class=\"navbar\" role=\"navigation\">
\t<div class=\"inner\">

\t

\t<ul id=\"nav-breadcrumbs\" class=\"nav-breadcrumbs linklist navlinks\" role=\"menubar\">
\t\t";
        // line 7
        $value = " itemtype=\"http://schema.org/ListItem\" itemprop=\"itemListElement\" itemscope";
        $context['definition']->set('MICRODATA', $value);
        // line 8
        echo "\t\t";
        $context["navlink_position"] = 1;
        echo "\t\t
\t\t";
        // line 9
        // line 10
        echo "\t\t<li class=\"breadcrumbs\" itemscope itemtype=\"http://schema.org/BreadcrumbList\">
\t\t\t";
        // line 11
        if (($context["U_SITE_HOME"] ?? null)) {
            // line 12
            echo "\t\t\t\t<span class=\"crumb\" ";
            echo $this->getAttribute(($context["definition"] ?? null), "MICRODATA", []);
            echo "><a href=\"";
            echo ($context["U_SITE_HOME"] ?? null);
            echo "\" itemtype=\"https://schema.org/Thing\" itemprop=\"item\" data-navbar-reference=\"home\"><i class=\"icon fa-home fa-fw\" aria-hidden=\"true\"></i><span itemprop=\"name\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SITE_HOME");
            echo "</span></a><meta itemprop=\"position\" content=\"";
            echo ($context["navlink_position"] ?? null);
            $context["navlink_position"] = (($context["navlink_position"] ?? null) + 1);
            echo "\" /></span>
\t\t\t";
        }
        // line 14
        echo "\t\t\t";
        // line 15
        echo "\t\t\t\t<span class=\"crumb\" ";
        echo $this->getAttribute(($context["definition"] ?? null), "MICRODATA", []);
        echo "><a href=\"";
        echo ($context["U_INDEX"] ?? null);
        echo "\" itemtype=\"https://schema.org/Thing\" itemprop=\"item\" accesskey=\"h\" data-navbar-reference=\"index\">";
        if ( !($context["U_SITE_HOME"] ?? null)) {
            echo "<i class=\"icon fa-home fa-fw\"></i>";
        }
        echo "<span itemprop=\"name\">";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("INDEX");
        echo "</span></a><meta itemprop=\"position\" content=\"";
        echo ($context["navlink_position"] ?? null);
        $context["navlink_position"] = (($context["navlink_position"] ?? null) + 1);
        echo "\" /></span>

\t\t\t";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "navlinks", []));
        foreach ($context['_seq'] as $context["_key"] => $context["navlinks"]) {
            // line 18
            echo "\t\t\t\t";
            // line 19
            echo "\t\t\t\t<span class=\"crumb\" ";
            echo $this->getAttribute(($context["definition"] ?? null), "MICRODATA", []);
            if ($this->getAttribute($context["navlinks"], "MICRODATA", [])) {
                echo " ";
                echo $this->getAttribute($context["navlinks"], "MICRODATA", []);
            }
            echo "><a href=\"";
            echo $this->getAttribute($context["navlinks"], "U_VIEW_FORUM", []);
            echo "\" itemtype=\"https://schema.org/Thing\" itemprop=\"item\"><span itemprop=\"name\">";
            echo $this->getAttribute($context["navlinks"], "FORUM_NAME", []);
            echo "</span></a><meta itemprop=\"position\" content=\"";
            echo ($context["navlink_position"] ?? null);
            $context["navlink_position"] = (($context["navlink_position"] ?? null) + 1);
            echo "\" /></span>
\t\t\t\t";
            // line 20
            // line 21
            echo "\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['navlinks'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "\t\t\t";
        // line 23
        echo "\t\t</li>
\t\t";
        // line 24
        // line 25
        echo "
\t\t";
        // line 26
        if ((($context["S_DISPLAY_SEARCH"] ?? null) &&  !($context["S_IN_SEARCH"] ?? null))) {
            // line 27
            echo "\t\t\t<li class=\"rightside responsive-search\">
\t\t\t\t<a href=\"";
            // line 28
            echo ($context["U_SEARCH"] ?? null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_ADV_EXPLAIN");
            echo "\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-search fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
            // line 29
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH");
            echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t";
        }
        // line 33
        echo "\t\t
\t</ul>

\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "breadcrumb.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 33,  133 => 29,  127 => 28,  124 => 27,  122 => 26,  119 => 25,  118 => 24,  115 => 23,  113 => 22,  107 => 21,  106 => 20,  90 => 19,  88 => 18,  84 => 17,  67 => 15,  65 => 14,  52 => 12,  50 => 11,  47 => 10,  46 => 9,  41 => 8,  38 => 7,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "breadcrumb.html", "");
    }
}
