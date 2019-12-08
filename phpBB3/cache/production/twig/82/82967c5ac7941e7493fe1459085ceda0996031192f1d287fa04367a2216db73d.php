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

/* feed.xml.twig */
class __TwigTemplate_1c31e3e73a67688d2cb33d6609addce36d68155cb74d080c043902c13c0b6de7 extends \Twig\Template
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
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<feed xmlns=\"http://www.w3.org/2005/Atom\" xml:lang=\"";
        // line 2
        echo ($context["FEED_LANG"] ?? null);
        echo "\">
\t<link rel=\"self\" type=\"application/atom+xml\" href=\"";
        // line 3
        echo ($context["SELF_LINK"] ?? null);
        echo "\" />

\t";
        // line 5
        if ( !twig_test_empty(($context["FEED_TITLE"] ?? null))) {
            echo "<title>";
            echo ($context["FEED_TITLE"] ?? null);
            echo "</title>";
        }
        // line 6
        echo "
\t";
        // line 7
        if ( !twig_test_empty(($context["FEED_SUBTITLE"] ?? null))) {
            echo "<subtitle>";
            echo ($context["FEED_SUBTITLE"] ?? null);
            echo "</subtitle>";
        }
        // line 8
        echo "
\t";
        // line 9
        if ( !twig_test_empty(($context["FEED_LINK"] ?? null))) {
            echo "<link href=\"";
            echo ($context["FEED_LINK"] ?? null);
            echo "\" />";
        }
        // line 10
        echo "
\t<updated>";
        // line 11
        echo ($context["FEED_UPDATED"] ?? null);
        echo "</updated>

\t<author><name><![CDATA[";
        // line 13
        echo ($context["FEED_AUTHOR"] ?? null);
        echo "]]></name></author>
\t<id>";
        // line 14
        echo ($context["SELF_LINK"] ?? null);
        echo "</id>

\t";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["FEED_ROWS"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 17
            echo "\t<entry>
\t\t";
            // line 18
            if ( !twig_test_empty($this->getAttribute($context["row"], "author", []))) {
                echo "<author><name><![CDATA[";
                echo $this->getAttribute($context["row"], "author", []);
                echo "]]></name></author>";
            }
            // line 19
            echo "
\t\t<updated>";
            // line 20
            if ( !twig_test_empty($this->getAttribute($context["row"], "updated", []))) {
                echo $this->getAttribute($context["row"], "updated", []);
                echo " ";
            } else {
                echo $this->getAttribute($context["row"], "published", []);
            }
            echo "</updated>

\t\t";
            // line 22
            if ( !twig_test_empty($this->getAttribute($context["row"], "published", []))) {
                echo "<published>";
                echo $this->getAttribute($context["row"], "published", []);
                echo "</published>";
            }
            // line 23
            echo "
\t\t<id>";
            // line 24
            echo $this->getAttribute($context["row"], "link", []);
            echo "</id>
\t\t<link href=\"";
            // line 25
            echo $this->getAttribute($context["row"], "link", []);
            echo "\"/>
\t\t<title type=\"html\"><![CDATA[";
            // line 26
            echo $this->getAttribute($context["row"], "title", []);
            echo "]]></title>

\t\t";
            // line 28
            if ((( !twig_test_empty($this->getAttribute($context["row"], "category", [])) && $this->getAttribute($context["row"], "category_name", [], "any", true, true)) && ($this->getAttribute($context["row"], "category_name", []) != ""))) {
                // line 29
                echo "\t\t\t<category term=\"";
                echo $this->getAttribute($context["row"], "category_name", []);
                echo "\" scheme=\"";
                echo $this->getAttribute($context["row"], "category", []);
                echo "\" label=\"";
                echo $this->getAttribute($context["row"], "category_name", []);
                echo "\"/>
\t\t";
            }
            // line 31
            echo "
\t\t<content type=\"html\" xml:base=\"";
            // line 32
            echo $this->getAttribute($context["row"], "link", []);
            echo "\"><![CDATA[
";
            // line 33
            echo $this->getAttribute($context["row"], "description", []);
            if ( !twig_test_empty($this->getAttribute($context["row"], "statistics", []))) {
                echo "<p>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("STATISTICS");
                echo ": ";
                echo $this->getAttribute($context["row"], "statistics", []);
                echo "</p>";
            }
            echo "<hr />
]]></content>
\t</entry>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "</feed>
";
    }

    public function getTemplateName()
    {
        return "feed.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 37,  150 => 33,  146 => 32,  143 => 31,  133 => 29,  131 => 28,  126 => 26,  122 => 25,  118 => 24,  115 => 23,  109 => 22,  99 => 20,  96 => 19,  90 => 18,  87 => 17,  83 => 16,  78 => 14,  74 => 13,  69 => 11,  66 => 10,  60 => 9,  57 => 8,  51 => 7,  48 => 6,  42 => 5,  37 => 3,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "feed.xml.twig", "");
    }
}
