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

/* posting_buttons.html */
class __TwigTemplate_0691cababf45ce305ae8dc92db1b21b44e24db934a0a3a7f40c9b197809317ed extends \Twig\Template
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
        echo "
<script>
\tvar form_name = 'postform';
\tvar text_name = ";
        // line 4
        if ($this->getAttribute(($context["definition"] ?? null), "SIG_EDIT", [])) {
            echo "'signature'";
        } else {
            echo "'message'";
        }
        echo ";
\tvar load_draft = false;
\tvar upload = false;

\t// Define the bbCode tags
\tvar bbcode = new Array();
\tvar bbtags = new Array('[b]','[/b]','[i]','[/i]','[u]','[/u]','[quote]','[/quote]','[code]','[/code]','[list]','[/list]','[list=]','[/list]','[img]','[/img]','[url]','[/url]','[flash=]', '[/flash]','[size=]','[/size]'";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "custom_tags", []));
        foreach ($context['_seq'] as $context["_key"] => $context["custom_tags"]) {
            echo ", ";
            echo $this->getAttribute($context["custom_tags"], "BBCODE_NAME", []);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_tags'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo ");
\tvar imageTag = false;

\t// Helpline messages
\tvar help_line = {
\t\tb: '";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_B_HELP"), "js");
        echo "',
\t\ti: '";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_I_HELP"), "js");
        echo "',
\t\tu: '";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_U_HELP"), "js");
        echo "',
\t\tq: '";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_Q_HELP"), "js");
        echo "',
\t\tc: '";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_C_HELP"), "js");
        echo "',
\t\tl: '";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_L_HELP"), "js");
        echo "',
\t\to: '";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_O_HELP"), "js");
        echo "',
\t\tp: '";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_P_HELP"), "js");
        echo "',
\t\tw: '";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_W_HELP"), "js");
        echo "',
\t\ta: '";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_A_HELP"), "js");
        echo "',
\t\ts: '";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_S_HELP"), "js");
        echo "',
\t\tf: '";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_F_HELP"), "js");
        echo "',
\t\ty: '";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_Y_HELP"), "js");
        echo "',
\t\td: '";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_D_HELP"), "js");
        echo "'
\t\t";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "custom_tags", []));
        foreach ($context['_seq'] as $context["_key"] => $context["custom_tags"]) {
            // line 30
            echo "\t\t\t,cb_";
            echo $this->getAttribute($context["custom_tags"], "BBCODE_ID", []);
            echo ": '";
            echo $this->getAttribute($context["custom_tags"], "A_BBCODE_HELPLINE", []);
            echo "'
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_tags'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "\t}

\tfunction change_palette()
\t{
\t\tphpbb.toggleDisplay('colour_palette');
\t\te = document.getElementById('colour_palette');

\t\tif (e.style.display == 'block')
\t\t{
\t\t\tdocument.getElementById('bbpalette').value = '";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("FONT_COLOR_HIDE"), "js");
        echo "';
\t\t}
\t\telse
\t\t{
\t\t\tdocument.getElementById('bbpalette').value = '";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("FONT_COLOR"), "js");
        echo "';
\t\t}
\t}


</script>
";
        // line 51
        $asset_file = (("" . ($context["T_ASSETS_PATH"] ?? null)) . "/javascript/editor.js");
        $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper(), $this->getEnvironment()->get_filesystem());
        if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
            $asset_path = $asset->get_path();            $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
            if (!file_exists($local_file)) {
                $local_file = $this->getEnvironment()->findTemplate($asset_path);
                $asset->set_path($local_file, true);
            }
        }
        
        if ($asset->is_relative()) {
            $asset->add_assets_version('2');
        }
        $this->getEnvironment()->get_assets_bag()->add_script($asset);        // line 52
        echo "
";
        // line 53
        if (($context["S_BBCODE_ALLOWED"] ?? null)) {
            // line 54
            echo "<div id=\"colour_palette\" style=\"display: none;\">
\t<dl style=\"clear: left;\">
\t\t<dt><label>";
            // line 56
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FONT_COLOR");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t<dd id=\"color_palette_placeholder\" class=\"color_palette_placeholder\" data-orientation=\"h\" data-height=\"12\" data-width=\"15\" data-bbcode=\"true\"></dd>
\t</dl>
</div>

";
            // line 61
            // line 62
            echo "<div id=\"format-buttons\" class=\"format-buttons\">
\t<button type=\"button\" class=\"postbutton button-icon-only bbcode-b\" accesskey=\"b\" name=\"addbbcode0\" value=\" B \" onclick=\"bbstyle(0)\" title=\"";
            // line 63
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_B_HELP");
            echo "\">
\t\t<i class=\"icon fa-bold fa-fw\" aria-hidden=\"true\"></i>
\t</button>
\t<button type=\"button\" class=\"postbutton button-icon-only bbcode-i\" accesskey=\"i\" name=\"addbbcode2\" value=\" i \" onclick=\"bbstyle(2)\" title=\"";
            // line 66
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_I_HELP");
            echo "\">
\t\t<i class=\"icon fa-italic fa-fw\" aria-hidden=\"true\"></i>
\t</button>
\t<button type=\"button\" class=\"postbutton button-icon-only bbcode-u\" accesskey=\"u\" name=\"addbbcode4\" value=\" u \" onclick=\"bbstyle(4)\" title=\"";
            // line 69
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_U_HELP");
            echo "\">
\t\t<i class=\"icon fa-underline fa-fw\" aria-hidden=\"true\"></i>
\t</button>
\t";
            // line 72
            if (($context["S_BBCODE_QUOTE"] ?? null)) {
                // line 73
                echo "\t<button type=\"button\" class=\"postbutton button-icon-only bbcode-quote\" accesskey=\"q\" name=\"addbbcode6\" value=\"Quote\" onclick=\"bbstyle(6)\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_Q_HELP");
                echo "\">
\t\t<i class=\"icon fa-quote-left fa-fw\" aria-hidden=\"true\"></i>
\t</button>
\t";
            }
            // line 77
            echo "\t<button type=\"button\" class=\"postbutton button-icon-only bbcode-code\" accesskey=\"c\" name=\"addbbcode8\" value=\"Code\" onclick=\"bbstyle(8)\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_C_HELP");
            echo "\">
\t\t<i class=\"icon fa-code fa-fw\" aria-hidden=\"true\"></i>
\t</button>
\t<button type=\"button\" class=\"postbutton button-icon-only bbcode-list\" accesskey=\"l\" name=\"addbbcode10\" value=\"List\" onclick=\"bbstyle(10)\" title=\"";
            // line 80
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_L_HELP");
            echo "\">
\t\t<i class=\"icon fa-list fa-fw\" aria-hidden=\"true\"></i>
\t</button>
\t<button type=\"button\" class=\"postbutton button-icon-only bbcode-list-\" accesskey=\"o\" name=\"addbbcode12\" value=\"List=\" onclick=\"bbstyle(12)\" title=\"";
            // line 83
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_O_HELP");
            echo "\">
\t\t<i class=\"icon fa-list-ol fa-fw\" aria-hidden=\"true\"></i>
\t</button>
\t<button type=\"button\" class=\"postbutton button-icon-only bbcode-asterisk\" accesskey=\"y\" name=\"addlistitem\" value=\"[*]\" onclick=\"bbstyle(-1)\" title=\"";
            // line 86
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_LISTITEM_HELP");
            echo "\">
\t\t<i class=\"icon fa-asterisk fa-fw\" aria-hidden=\"true\"></i>
\t</button>
\t";
            // line 89
            if (($context["S_BBCODE_IMG"] ?? null)) {
                // line 90
                echo "\t<button type=\"button\" class=\"postbutton button-icon-only bbcode-img\" accesskey=\"p\" name=\"addbbcode14\" value=\"Img\" onclick=\"bbstyle(14)\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_P_HELP");
                echo "\">
\t\t<i class=\"icon fa-image fa-fw\" aria-hidden=\"true\"></i>
\t</button>
\t";
            }
            // line 94
            echo "\t";
            if (($context["S_LINKS_ALLOWED"] ?? null)) {
                // line 95
                echo "\t<button type=\"button\" class=\"postbutton button-icon-only bbcode-url\" accesskey=\"w\" name=\"addbbcode16\" value=\"URL\" onclick=\"bbstyle(16)\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_W_HELP");
                echo "\">
\t\t<i class=\"icon fa-link fa-fw\" aria-hidden=\"true\"></i>
\t</button>
\t";
            }
            // line 99
            echo "\t";
            if (($context["S_BBCODE_FLASH"] ?? null)) {
                // line 100
                echo "\t<button type=\"button\" class=\"postbutton button-icon-only bbcode-flash\" accesskey=\"d\" name=\"addbbcode18\" value=\"Flash\" onclick=\"bbstyle(18)\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_D_HELP");
                echo "\">
\t\t<i class=\"icon fa-flash fa-fw\" aria-hidden=\"true\"></i>
\t</button>
\t";
            }
            // line 104
            echo "\t<button type=\"button\" class=\"postbutton button-icon-only bbcode-color\" name=\"bbpalette\" id=\"bbpalette\" value=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FONT_COLOR");
            echo "\" onclick=\"change_palette();\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_S_HELP");
            echo "\">
\t\t<i class=\"icon fa-tint fa-fw\" aria-hidden=\"true\"></i>
\t</button>
\t<select name=\"addbbcode20\" class=\"bbcode-size\" onchange=\"bbfontstyle('[size=' + this.form.addbbcode20.options[this.form.addbbcode20.selectedIndex].value + ']', '[/size]');this.form.addbbcode20.selectedIndex = 2;\" title=\"";
            // line 107
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BBCODE_F_HELP");
            echo "\">
\t\t<option value=\"50\">";
            // line 108
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FONT_TINY");
            echo "</option>
\t\t<option value=\"85\">";
            // line 109
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FONT_SMALL");
            echo "</option>
\t\t<option value=\"100\" selected=\"selected\">";
            // line 110
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FONT_NORMAL");
            echo "</option>
\t\t";
            // line 111
            if (( !($context["MAX_FONT_SIZE"] ?? null) || (($context["MAX_FONT_SIZE"] ?? null) >= 150))) {
                // line 112
                echo "\t\t\t<option value=\"150\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FONT_LARGE");
                echo "</option>
\t\t\t";
                // line 113
                if (( !($context["MAX_FONT_SIZE"] ?? null) || (($context["MAX_FONT_SIZE"] ?? null) >= 200))) {
                    // line 114
                    echo "\t\t\t\t<option value=\"200\">";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FONT_HUGE");
                    echo "</option>
\t\t\t";
                }
                // line 116
                echo "\t\t";
            }
            // line 117
            echo "\t</select>

\t";
            // line 119
            // line 120
            echo "
\t";
            // line 121
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "custom_tags", []));
            foreach ($context['_seq'] as $context["_key"] => $context["custom_tags"]) {
                // line 122
                echo "\t<button type=\"button\" class=\"postbutton button-secondary bbcode-";
                echo $this->getAttribute($context["custom_tags"], "BBCODE_TAG_CLEAN", []);
                echo "\" name=\"addbbcode";
                echo $this->getAttribute($context["custom_tags"], "BBCODE_ID", []);
                echo "\" value=\"";
                echo $this->getAttribute($context["custom_tags"], "BBCODE_TAG", []);
                echo "\" onclick=\"bbstyle(";
                echo $this->getAttribute($context["custom_tags"], "BBCODE_ID", []);
                echo ")\" title=\"";
                echo $this->getAttribute($context["custom_tags"], "BBCODE_HELPLINE", []);
                echo "\">
\t\t";
                // line 123
                echo $this->getAttribute($context["custom_tags"], "BBCODE_TAG", []);
                echo "
\t</button>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_tags'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 126
            echo "</div>
";
            // line 127
        }
    }

    public function getTemplateName()
    {
        return "posting_buttons.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  363 => 127,  360 => 126,  351 => 123,  338 => 122,  334 => 121,  331 => 120,  330 => 119,  326 => 117,  323 => 116,  317 => 114,  315 => 113,  310 => 112,  308 => 111,  304 => 110,  300 => 109,  296 => 108,  292 => 107,  283 => 104,  275 => 100,  272 => 99,  264 => 95,  261 => 94,  253 => 90,  251 => 89,  245 => 86,  239 => 83,  233 => 80,  226 => 77,  218 => 73,  216 => 72,  210 => 69,  204 => 66,  198 => 63,  195 => 62,  194 => 61,  185 => 56,  181 => 54,  179 => 53,  176 => 52,  162 => 51,  153 => 45,  146 => 41,  135 => 32,  124 => 30,  120 => 29,  116 => 28,  112 => 27,  108 => 26,  104 => 25,  100 => 24,  96 => 23,  92 => 22,  88 => 21,  84 => 20,  80 => 19,  76 => 18,  72 => 17,  68 => 16,  64 => 15,  48 => 10,  35 => 4,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "posting_buttons.html", "");
    }
}
