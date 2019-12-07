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

/* index_body.html */
class __TwigTemplate_e0b64b063d4639b4a07d7c5ebe9211afb8a3f811985672de61315101b4bf9f1e extends \Twig\Template
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
        $location = "overall_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_header.html", "index_body.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<p class=\"";
        // line 3
        echo ($context["S_CONTENT_FLOW_END"] ?? null);
        echo " responsive-center time";
        if (($context["S_USER_LOGGED_IN"] ?? null)) {
            echo " rightside";
        }
        echo "\">";
        if (($context["S_USER_LOGGED_IN"] ?? null)) {
            echo ($context["LAST_VISIT_DATE"] ?? null);
        } else {
            echo ($context["CURRENT_TIME"] ?? null);
        }
        echo "</p>
";
        // line 4
        if (($context["S_USER_LOGGED_IN"] ?? null)) {
            echo "<p class=\"responsive-center time\">";
            echo ($context["CURRENT_TIME"] ?? null);
            echo "</p>";
        }
        // line 5
        echo "
";
        // line 6
        // line 7
        if (($context["U_MARK_FORUMS"] ?? null)) {
            // line 8
            echo "\t<div class=\"action-bar compact\">
\t\t<a href=\"";
            // line 9
            echo ($context["U_MARK_FORUMS"] ?? null);
            echo "\" class=\"mark-read rightside\" accesskey=\"m\" data-ajax=\"mark_forums_read\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK_FORUMS_READ");
            echo "</a>

\t</div>
";
        }
        // line 13
        // line 14
        echo "
";
        // line 15
        $location = "forumlist_body.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("forumlist_body.html", "index_body.html", 15)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 16
        echo "
";
        // line 17
        // line 18
        echo "


";
        // line 21
        // line 22
        echo "<div class=\"stats\">";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("STATISTICS");
        echo "</div>
<div class=\"statsblock\">
";
        // line 24
        if (( !($context["S_USER_LOGGED_IN"] ?? null) &&  !($context["S_IS_BOT"] ?? null))) {
            // line 25
            echo "\t<form method=\"post\" action=\"";
            echo ($context["S_LOGIN_ACTION"] ?? null);
            echo "\" class=\"headerspace\">
\t<h3><a href=\"";
            // line 26
            echo ($context["U_LOGIN_LOGOUT"] ?? null);
            echo "\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN_LOGOUT");
            echo "</a>";
            if (($context["S_REGISTER_ENABLED"] ?? null)) {
                echo "&nbsp; &bull; &nbsp;<a href=\"";
                echo ($context["U_REGISTER"] ?? null);
                echo "\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REGISTER");
                echo "</a>";
            }
            echo "</h3>
\t\t<fieldset class=\"quick-login\">
\t\t\t<i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i><label for=\"username\"><span>";
            // line 28
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("USERNAME");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</span> <input type=\"text\" tabindex=\"1\" name=\"username\" id=\"username\" size=\"10\" class=\"inputbox\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("USERNAME");
            echo "\" /></label>
\t\t\t<label for=\"password\"><span>";
            // line 29
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PASSWORD");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</span> <input type=\"password\" tabindex=\"2\" name=\"password\" id=\"password\" size=\"10\" class=\"inputbox\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PASSWORD");
            echo "\" autocomplete=\"off\" /></label>
\t\t\t";
            // line 30
            if (($context["U_SEND_PASSWORD"] ?? null)) {
                // line 31
                echo "\t\t\t\t<a href=\"";
                echo ($context["U_SEND_PASSWORD"] ?? null);
                echo "\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORGOT_PASS");
                echo "</a>
\t\t\t";
            }
            // line 33
            echo "\t\t\t";
            if (($context["S_AUTOLOGIN_ENABLED"] ?? null)) {
                // line 34
                echo "\t\t\t\t<span class=\"responsive-hide\">|</span> <label for=\"autologin\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOG_ME_IN");
                echo " <input type=\"checkbox\" tabindex=\"4\" name=\"autologin\" id=\"autologin\" /></label>
\t\t\t";
            }
            // line 36
            echo "\t\t\t<input type=\"submit\" tabindex=\"5\" name=\"login\" value=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN");
            echo "\" class=\"button2\" />
\t\t\t";
            // line 37
            echo ($context["S_LOGIN_REDIRECT"] ?? null);
            echo "
\t\t\t";
            // line 38
            echo ($context["S_FORM_TOKEN_LOGIN"] ?? null);
            echo "
\t\t</fieldset>
\t</form>
";
        }
        // line 42
        if (($context["S_DISPLAY_ONLINE_LIST"] ?? null)) {
            // line 43
            echo "\t<div class=\"stat-block online-list\">
\t\t";
            // line 44
            if (($context["U_VIEWONLINE"] ?? null)) {
                echo "<h3><a href=\"";
                echo ($context["U_VIEWONLINE"] ?? null);
                echo "\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WHO_IS_ONLINE");
                echo "</a></h3>";
            } else {
                echo "<h3>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WHO_IS_ONLINE");
                echo "</h3>";
            }
            // line 45
            echo "\t\t<div class=\"onlinestat\"><i class=\"fa fa-users\" aria-hidden=\"true\"></i>
\t\t<p class=\"whois\">
\t\t\t";
            // line 47
            // line 48
            echo "\t\t\t";
            echo ($context["TOTAL_USERS_ONLINE"] ?? null);
            echo " (";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ONLINE_EXPLAIN");
            echo ")<br />";
            echo ($context["RECORD_USERS"] ?? null);
            echo "<br /> 
\t\t\t";
            // line 49
            if (($context["U_VIEWONLINE"] ?? null)) {
                // line 50
                echo "\t\t\t\t<br />";
                echo ($context["LOGGED_IN_USER_LIST"] ?? null);
                echo "
\t\t\t\t";
                // line 51
                if (($context["LEGEND"] ?? null)) {
                    echo "<br /><em>";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LEGEND");
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo " ";
                    echo ($context["LEGEND"] ?? null);
                    echo "</em>";
                }
                // line 52
                echo "\t\t\t";
            }
            // line 53
            echo "\t\t\t";
            // line 54
            echo "\t\t</p></div>
\t</div>
";
        }
        // line 57
        // line 58
        echo "
";
        // line 59
        if (($context["S_DISPLAY_BIRTHDAY_LIST"] ?? null)) {
            // line 60
            echo "\t<div class=\"stat-block birthday-list\">
\t\t<h3>";
            // line 61
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BIRTHDAYS");
            echo "</h3>
\t\t<i class=\"fa fa-birthday-cake\" aria-hidden=\"true\"></i>
\t\t<p class=\"bday\">
\t\t\t";
            // line 64
            // line 65
            echo "\t\t\t";
            if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "birthdays", []))) {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("CONGRATULATIONS");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo " <strong>";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "birthdays", []));
                foreach ($context['_seq'] as $context["_key"] => $context["birthdays"]) {
                    echo $this->getAttribute($context["birthdays"], "USERNAME", []);
                    if (($this->getAttribute($context["birthdays"], "AGE", []) !== "")) {
                        echo " (";
                        echo $this->getAttribute($context["birthdays"], "AGE", []);
                        echo ")";
                    }
                    if ( !$this->getAttribute($context["birthdays"], "S_LAST_ROW", [])) {
                        echo ", ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['birthdays'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo "</strong>";
            } else {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_BIRTHDAYS");
            }
            // line 66
            echo "\t\t\t";
            // line 67
            echo "\t\t</p>
\t</div>
\t
";
        }
        // line 71
        echo "
";
        // line 72
        if (($context["NEWEST_USER"] ?? null)) {
            // line 73
            echo "\t<div class=\"stat-block statistics\">
\t\t<h3>";
            // line 74
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("STATISTICS");
            echo "</h3>
\t\t<i class=\"fa fa-pie-chart\" aria-hidden=\"true\"></i>
\t\t<p class=\"statistics\">
\t\t\t";
            // line 77
            // line 78
            echo "\t\t\t";
            echo ($context["TOTAL_POSTS"] ?? null);
            echo " &bull; ";
            echo ($context["TOTAL_TOPICS"] ?? null);
            echo " &bull; ";
            echo ($context["TOTAL_USERS"] ?? null);
            echo " &bull; ";
            echo ($context["NEWEST_USER"] ?? null);
            echo "
\t\t\t";
            // line 79
            // line 80
            echo "\t\t</p>
\t</div>
</div>
";
        }
        // line 84
        echo "
";
        // line 85
        // line 86
        echo "
";
        // line 87
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "index_body.html", 87)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "index_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  333 => 87,  330 => 86,  329 => 85,  326 => 84,  320 => 80,  319 => 79,  308 => 78,  307 => 77,  301 => 74,  298 => 73,  296 => 72,  293 => 71,  287 => 67,  285 => 66,  259 => 65,  258 => 64,  252 => 61,  249 => 60,  247 => 59,  244 => 58,  243 => 57,  238 => 54,  236 => 53,  233 => 52,  224 => 51,  219 => 50,  217 => 49,  208 => 48,  207 => 47,  203 => 45,  191 => 44,  188 => 43,  186 => 42,  179 => 38,  175 => 37,  170 => 36,  164 => 34,  161 => 33,  153 => 31,  151 => 30,  144 => 29,  137 => 28,  122 => 26,  117 => 25,  115 => 24,  109 => 22,  108 => 21,  103 => 18,  102 => 17,  99 => 16,  87 => 15,  84 => 14,  83 => 13,  74 => 9,  71 => 8,  69 => 7,  68 => 6,  65 => 5,  59 => 4,  45 => 3,  42 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "index_body.html", "");
    }
}
