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

/* viewtopic_body.html */
class __TwigTemplate_c22387448e3f932736d6fc609ccffa9fd038d297c1048611af7ce37ea467c386 extends \Twig\Template
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
        $this->loadTemplate("overall_header.html", "viewtopic_body.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        // line 3
        echo "<h2 class=\"topic-title\">";
        echo "<a href=\"";
        echo ($context["U_VIEW_TOPIC"] ?? null);
        echo "\">";
        echo ($context["TOPIC_TITLE"] ?? null);
        echo "</a>";
        echo "</h2>
";
        // line 4
        // line 5
        echo "<!-- NOTE: remove the style=\"display: none\" when you want to have the forum description on the topic body -->
";
        // line 6
        if (($context["FORUM_DESC"] ?? null)) {
            echo "<div style=\"display: none !important;\">";
            echo ($context["FORUM_DESC"] ?? null);
            echo "<br /></div>";
        }
        // line 7
        echo "
";
        // line 8
        if (($context["MODERATORS"] ?? null)) {
            // line 9
            echo "<p>
\t<strong>";
            // line 10
            if (($context["S_SINGLE_MODERATOR"] ?? null)) {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MODERATOR");
            } else {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MODERATORS");
            }
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</strong> ";
            echo ($context["MODERATORS"] ?? null);
            echo "
</p>
";
        }
        // line 13
        echo "
";
        // line 14
        if (($context["S_FORUM_RULES"] ?? null)) {
            // line 15
            echo "\t<div class=\"rules";
            if (($context["U_FORUM_RULES"] ?? null)) {
                echo " rules-link";
            }
            echo "\">
\t\t<div class=\"inner\">

\t\t";
            // line 18
            if (($context["U_FORUM_RULES"] ?? null)) {
                // line 19
                echo "\t\t\t<a href=\"";
                echo ($context["U_FORUM_RULES"] ?? null);
                echo "\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORUM_RULES");
                echo "</a>
\t\t";
            } else {
                // line 21
                echo "\t\t\t<strong>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORUM_RULES");
                echo "</strong><br />
\t\t\t";
                // line 22
                echo ($context["FORUM_RULES"] ?? null);
                echo "
\t\t";
            }
            // line 24
            echo "
\t\t</div>
\t</div>
";
        }
        // line 28
        echo "
<div class=\"action-bar bar-top\">
\t";
        // line 30
        // line 31
        echo "
\t";
        // line 32
        if (( !($context["S_IS_BOT"] ?? null) && ($context["S_DISPLAY_REPLY_INFO"] ?? null))) {
            // line 33
            echo "\t\t<a href=\"";
            echo ($context["U_POST_REPLY_TOPIC"] ?? null);
            echo "\" class=\"postbutton\" title=\"";
            if (($context["S_IS_LOCKED"] ?? null)) {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPIC_LOCKED");
            } else {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_REPLY");
            }
            echo "\">
\t\t\t";
            // line 34
            if (($context["S_IS_LOCKED"] ?? null)) {
                // line 35
                echo "\t\t\t\t<span>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_TOPIC_LOCKED");
                echo "</span> <i class=\"icon fa-lock fa-fw\" aria-hidden=\"true\"></i>
\t\t\t";
            } else {
                // line 37
                echo "\t\t\t\t<span>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_POST_REPLY");
                echo "</span> <i class=\"icon fa-reply fa-fw\" aria-hidden=\"true\"></i>
\t\t\t";
            }
            // line 39
            echo "\t\t</a>
\t";
        }
        // line 41
        echo "
\t";
        // line 42
        // line 43
        echo "\t";
        $location = "viewtopic_topic_tools.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("viewtopic_topic_tools.html", "viewtopic_body.html", 43)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 44
        echo "\t";
        // line 45
        echo "
\t";
        // line 46
        if (($context["S_DISPLAY_SEARCHBOX"] ?? null)) {
            // line 47
            echo "\t\t<div class=\"search-box\" role=\"search\">
\t\t\t<form method=\"get\" id=\"topic-search\" action=\"";
            // line 48
            echo ($context["S_SEARCHBOX_ACTION"] ?? null);
            echo "\">
\t\t\t<fieldset>
\t\t\t\t<input class=\"inputbox search tiny\"  type=\"search\" name=\"keywords\" id=\"search_keywords\" size=\"20\" placeholder=\"";
            // line 50
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_TOPIC");
            echo "\" />
\t\t\t\t<button class=\"button button-search\" type=\"submit\" title=\"";
            // line 51
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH");
            echo "\">
\t\t\t\t\t<i class=\"icon fa-search fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
            // line 52
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH");
            echo "</span>
\t\t\t\t</button>
\t\t\t\t<a href=\"";
            // line 54
            echo ($context["U_SEARCH"] ?? null);
            echo "\" class=\"button button-search-end\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_ADV");
            echo "\">
\t\t\t\t\t<i class=\"icon fa-cog fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
            // line 55
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_ADV");
            echo "</span>
\t\t\t\t</a>
\t\t\t\t";
            // line 57
            echo ($context["S_SEARCH_LOCAL_HIDDEN_FIELDS"] ?? null);
            echo "
\t\t\t</fieldset>
\t\t\t</form>
\t\t</div>
\t";
        }
        // line 62
        echo "
\t";
        // line 63
        if ((twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", [])) || ($context["TOTAL_POSTS"] ?? null))) {
            // line 64
            echo "\t\t<div class=\"pagination\">
\t\t\t";
            // line 65
            if ((($context["U_VIEW_UNREAD_POST"] ?? null) &&  !($context["S_IS_BOT"] ?? null))) {
                echo "<a href=\"";
                echo ($context["U_VIEW_UNREAD_POST"] ?? null);
                echo "\" class=\"mark\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_UNREAD_POST");
                echo "</a> &bull; ";
            }
            echo ($context["TOTAL_POSTS"] ?? null);
            echo "
\t\t\t";
            // line 66
            if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", []))) {
                // line 67
                echo "\t\t\t\t";
                $location = "pagination.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("pagination.html", "viewtopic_body.html", 67)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 68
                echo "\t\t\t";
            } else {
                // line 69
                echo "\t\t\t\t&bull; ";
                echo ($context["PAGE_NUMBER"] ?? null);
                echo "
\t\t\t";
            }
            // line 71
            echo "\t\t</div>
\t";
        }
        // line 73
        echo "\t";
        // line 74
        echo "</div>

";
        // line 76
        // line 77
        echo "
";
        // line 78
        if (($context["S_HAS_POLL"] ?? null)) {
            // line 79
            echo "\t<form method=\"post\" action=\"";
            echo ($context["S_POLL_ACTION"] ?? null);
            echo "\" data-ajax=\"vote_poll\" class=\"topic_poll\">

\t<div class=\"panel\">
\t\t<div class=\"inner\">

\t\t<div class=\"content\">
\t\t\t<h2 class=\"poll-title\">";
            // line 85
            echo ($context["POLL_QUESTION"] ?? null);
            echo "</h2>
\t\t\t<p class=\"author\">";
            // line 86
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POLL_LENGTH");
            if ((($context["S_CAN_VOTE"] ?? null) && ($context["L_POLL_LENGTH"] ?? null))) {
                echo "<br />";
            }
            if (($context["S_CAN_VOTE"] ?? null)) {
                echo "<span class=\"poll_max_votes\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MAX_VOTES");
                echo "</span>";
            }
            echo "</p>

\t\t\t<fieldset class=\"polls\">
\t\t\t";
            // line 89
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "poll_option", []));
            foreach ($context['_seq'] as $context["_key"] => $context["poll_option"]) {
                // line 90
                echo "\t\t\t\t";
                // line 91
                echo "\t\t\t\t<dl class=\"";
                if ($this->getAttribute($context["poll_option"], "POLL_OPTION_VOTED", [])) {
                    echo "voted";
                }
                if ($this->getAttribute($context["poll_option"], "POLL_OPTION_MOST_VOTES", [])) {
                    echo " most-votes";
                }
                echo "\"";
                if ($this->getAttribute($context["poll_option"], "POLL_OPTION_VOTED", [])) {
                    echo " title=\"";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POLL_VOTED_OPTION");
                    echo "\"";
                }
                echo " data-alt-text=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POLL_VOTED_OPTION");
                echo "\" data-poll-option-id=\"";
                echo $this->getAttribute($context["poll_option"], "POLL_OPTION_ID", []);
                echo "\">
\t\t\t\t\t<dt>";
                // line 92
                if (($context["S_CAN_VOTE"] ?? null)) {
                    echo "<label for=\"vote_";
                    echo $this->getAttribute($context["poll_option"], "POLL_OPTION_ID", []);
                    echo "\">";
                    echo $this->getAttribute($context["poll_option"], "POLL_OPTION_CAPTION", []);
                    echo "</label>";
                } else {
                    echo $this->getAttribute($context["poll_option"], "POLL_OPTION_CAPTION", []);
                }
                echo "</dt>
\t\t\t\t\t";
                // line 93
                if (($context["S_CAN_VOTE"] ?? null)) {
                    echo "<dd style=\"width: auto;\" class=\"poll_option_select\">";
                    if (($context["S_IS_MULTI_CHOICE"] ?? null)) {
                        echo "<input type=\"checkbox\" name=\"vote_id[]\" id=\"vote_";
                        echo $this->getAttribute($context["poll_option"], "POLL_OPTION_ID", []);
                        echo "\" value=\"";
                        echo $this->getAttribute($context["poll_option"], "POLL_OPTION_ID", []);
                        echo "\"";
                        if ($this->getAttribute($context["poll_option"], "POLL_OPTION_VOTED", [])) {
                            echo " checked=\"checked\"";
                        }
                        echo " />";
                    } else {
                        echo "<input type=\"radio\" name=\"vote_id[]\" id=\"vote_";
                        echo $this->getAttribute($context["poll_option"], "POLL_OPTION_ID", []);
                        echo "\" value=\"";
                        echo $this->getAttribute($context["poll_option"], "POLL_OPTION_ID", []);
                        echo "\"";
                        if ($this->getAttribute($context["poll_option"], "POLL_OPTION_VOTED", [])) {
                            echo " checked=\"checked\"";
                        }
                        echo " />";
                    }
                    echo "</dd>";
                }
                // line 94
                echo "\t\t\t\t\t<dd class=\"resultbar";
                if ( !($context["S_DISPLAY_RESULTS"] ?? null)) {
                    echo " hidden";
                }
                echo "\"><div class=\"";
                if (($this->getAttribute($context["poll_option"], "POLL_OPTION_PCT", []) < 20)) {
                    echo "pollbar1";
                } elseif (($this->getAttribute($context["poll_option"], "POLL_OPTION_PCT", []) < 40)) {
                    echo "pollbar2";
                } elseif (($this->getAttribute($context["poll_option"], "POLL_OPTION_PCT", []) < 60)) {
                    echo "pollbar3";
                } elseif (($this->getAttribute($context["poll_option"], "POLL_OPTION_PCT", []) < 80)) {
                    echo "pollbar4";
                } else {
                    echo "pollbar5";
                }
                echo "\" style=\"width:";
                echo $this->getAttribute($context["poll_option"], "POLL_OPTION_PERCENT_REL", []);
                echo ";\">";
                echo $this->getAttribute($context["poll_option"], "POLL_OPTION_RESULT", []);
                echo "</div></dd>
\t\t\t\t\t<dd class=\"poll_option_percent";
                // line 95
                if ( !($context["S_DISPLAY_RESULTS"] ?? null)) {
                    echo " hidden";
                }
                echo "\">";
                if (($this->getAttribute($context["poll_option"], "POLL_OPTION_RESULT", []) == 0)) {
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_VOTES");
                } else {
                    echo $this->getAttribute($context["poll_option"], "POLL_OPTION_PERCENT", []);
                }
                echo "</dd>
\t\t\t\t</dl>
\t\t\t\t";
                // line 97
                // line 98
                echo "\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['poll_option'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 99
            echo "
\t\t\t\t<dl class=\"poll_total_votes";
            // line 100
            if ( !($context["S_DISPLAY_RESULTS"] ?? null)) {
                echo " hidden";
            }
            echo "\">
\t\t\t\t\t<dt>&nbsp;</dt>
\t\t\t\t\t<dd class=\"resultbar\">";
            // line 102
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOTAL_VOTES");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo " <span class=\"poll_total_vote_cnt\">";
            echo ($context["TOTAL_VOTES"] ?? null);
            echo "</span></dd>
\t\t\t\t</dl>

\t\t\t";
            // line 105
            if (($context["S_CAN_VOTE"] ?? null)) {
                // line 106
                echo "\t\t\t\t<dl style=\"border-top: none;\" class=\"poll_vote\">
\t\t\t\t\t<dt>&nbsp;</dt>
\t\t\t\t\t<dd class=\"resultbar\"><input type=\"submit\" name=\"update\" value=\"";
                // line 108
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT_VOTE");
                echo "\" class=\"button1\" /></dd>
\t\t\t\t</dl>
\t\t\t";
            }
            // line 111
            echo "
\t\t\t";
            // line 112
            if ( !($context["S_DISPLAY_RESULTS"] ?? null)) {
                // line 113
                echo "\t\t\t\t<dl style=\"border-top: none;\" class=\"poll_view_results\">
\t\t\t\t\t<dt>&nbsp;</dt>
\t\t\t\t\t<dd class=\"resultbar\"><a href=\"";
                // line 115
                echo ($context["U_VIEW_RESULTS"] ?? null);
                echo "\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_RESULTS");
                echo "</a></dd>
\t\t\t\t</dl>
\t\t\t";
            }
            // line 118
            echo "\t\t\t</fieldset>
\t\t\t<div class=\"vote-submitted hidden\">";
            // line 119
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VOTE_SUBMITTED");
            echo "</div>
\t\t</div>

\t\t</div>
\t\t";
            // line 123
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t\t";
            // line 124
            echo ($context["S_HIDDEN_FIELDS"] ?? null);
            echo "
\t</div>

\t</form>
\t<hr />
";
        }
        // line 130
        echo "
";
        // line 131
        // line 132
        echo "
";
        // line 133
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "postrow", []));
        foreach ($context['_seq'] as $context["_key"] => $context["postrow"]) {
            // line 134
            echo "\t";
            // line 135
            echo "\t";
            if ($this->getAttribute($context["postrow"], "S_FIRST_UNREAD", [])) {
                // line 136
                echo "\t\t<a id=\"unread\" class=\"anchor\"";
                if (($context["S_UNREAD_VIEW"] ?? null)) {
                    echo " data-url=\"";
                    echo $this->getAttribute($context["postrow"], "U_MINI_POST", []);
                    echo "\"";
                }
                echo "></a>
\t";
            }
            // line 138
            echo "\t<div id=\"p";
            echo $this->getAttribute($context["postrow"], "POST_ID", []);
            echo "\" class=\"post has-profile ";
            if (($this->getAttribute($context["postrow"], "S_ROW_COUNT", []) % 2 == 1)) {
                echo "bg1";
            } else {
                echo "bg2";
            }
            if ($this->getAttribute($context["postrow"], "S_UNREAD_POST", [])) {
                echo " unreadpost";
            }
            if ($this->getAttribute($context["postrow"], "S_POST_REPORTED", [])) {
                echo " reported";
            }
            if ($this->getAttribute($context["postrow"], "S_POST_DELETED", [])) {
                echo " deleted";
            }
            if (($this->getAttribute($context["postrow"], "S_ONLINE", []) &&  !$this->getAttribute($context["postrow"], "S_POST_HIDDEN", []))) {
                echo " online";
            }
            if ($this->getAttribute($context["postrow"], "POSTER_WARNINGS", [])) {
                echo " warned";
            }
            echo "\">
\t\t<div class=\"inner\">

\t\t<dl class=\"postprofile\" id=\"profile";
            // line 141
            echo $this->getAttribute($context["postrow"], "POST_ID", []);
            echo "\"";
            if ($this->getAttribute($context["postrow"], "S_POST_HIDDEN", [])) {
                echo " style=\"display: none;\"";
            }
            echo ">
\t\t\t<dt class=\"";
            // line 142
            if (($this->getAttribute($context["postrow"], "RANK_TITLE", []) || $this->getAttribute($context["postrow"], "RANK_IMG", []))) {
                echo "has-profile-rank";
            } else {
                echo "no-profile-rank";
            }
            echo " ";
            if ($this->getAttribute($context["postrow"], "POSTER_AVATAR", [])) {
                echo "has-avatar";
            } else {
                echo "no-avatar";
            }
            echo "\">
\t\t\t\t<div class=\"avatar-container\">
\t\t\t\t\t";
            // line 144
            // line 145
            echo "\t\t\t\t\t";
            if ($this->getAttribute($context["postrow"], "POSTER_AVATAR", [])) {
                // line 146
                echo "\t\t\t\t\t\t";
                if ($this->getAttribute($context["postrow"], "U_POST_AUTHOR", [])) {
                    echo "<a href=\"";
                    echo $this->getAttribute($context["postrow"], "U_POST_AUTHOR", []);
                    echo "\" class=\"avatar\">";
                    echo $this->getAttribute($context["postrow"], "POSTER_AVATAR", []);
                    echo "</a>";
                } else {
                    echo "<span class=\"avatar\">";
                    echo $this->getAttribute($context["postrow"], "POSTER_AVATAR", []);
                    echo "</span>";
                }
                // line 147
                echo "\t\t\t\t\t";
            }
            // line 148
            echo "\t\t\t\t\t";
            // line 149
            echo "\t\t\t\t</div>
\t\t\t\t";
            // line 150
            // line 151
            echo "\t\t\t\t";
            if ( !$this->getAttribute($context["postrow"], "U_POST_AUTHOR", [])) {
                echo "<strong>";
                echo $this->getAttribute($context["postrow"], "POST_AUTHOR_FULL", []);
                echo "</strong>";
            } else {
                echo $this->getAttribute($context["postrow"], "POST_AUTHOR_FULL", []);
            }
            // line 152
            echo "\t\t\t\t";
            // line 153
            echo "\t\t\t</dt>

\t\t\t";
            // line 155
            // line 156
            echo "\t\t\t";
            if (($this->getAttribute($context["postrow"], "RANK_TITLE", []) || $this->getAttribute($context["postrow"], "RANK_IMG", []))) {
                echo "<dd class=\"profile-rank\">";
                echo $this->getAttribute($context["postrow"], "RANK_TITLE", []);
                if (($this->getAttribute($context["postrow"], "RANK_TITLE", []) && $this->getAttribute($context["postrow"], "RANK_IMG", []))) {
                    echo "<br />";
                }
                echo $this->getAttribute($context["postrow"], "RANK_IMG", []);
                echo "</dd>";
            }
            // line 157
            echo "\t\t\t";
            // line 158
            echo "
\t\t";
            // line 159
            if (($this->getAttribute($context["postrow"], "POSTER_POSTS", []) != "")) {
                echo "<dd class=\"profile-posts\"><strong>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POSTS");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</strong> ";
                if (($this->getAttribute($context["postrow"], "U_SEARCH", []) !== "")) {
                    echo "<a href=\"";
                    echo $this->getAttribute($context["postrow"], "U_SEARCH", []);
                    echo "\">";
                }
                echo $this->getAttribute($context["postrow"], "POSTER_POSTS", []);
                if (($this->getAttribute($context["postrow"], "U_SEARCH", []) !== "")) {
                    echo "</a>";
                }
                echo "</dd>";
            }
            // line 160
            echo "\t\t";
            if ($this->getAttribute($context["postrow"], "POSTER_JOINED", [])) {
                echo "<dd class=\"profile-joined\"><strong>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("JOINED");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</strong> ";
                echo $this->getAttribute($context["postrow"], "POSTER_JOINED", []);
                echo "</dd>";
            }
            // line 161
            echo "\t\t";
            if ($this->getAttribute($context["postrow"], "POSTER_WARNINGS", [])) {
                echo "<dd class=\"profile-warnings\"><strong>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WARNINGS");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</strong> ";
                echo $this->getAttribute($context["postrow"], "POSTER_WARNINGS", []);
                echo "</dd>";
            }
            // line 162
            echo "
\t\t";
            // line 163
            if ($this->getAttribute($context["postrow"], "S_PROFILE_FIELD1", [])) {
                // line 164
                echo "\t\t\t<!-- Use a construct like this to include admin defined profile fields. Replace FIELD1 with the name of your field. -->
\t\t\t<dd><strong>";
                // line 165
                echo $this->getAttribute($context["postrow"], "PROFILE_FIELD1_NAME", []);
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</strong> ";
                echo $this->getAttribute($context["postrow"], "PROFILE_FIELD1_VALUE", []);
                echo "</dd>
\t\t";
            }
            // line 167
            echo "
\t\t";
            // line 168
            // line 169
            echo "\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["postrow"], "custom_fields", []));
            foreach ($context['_seq'] as $context["_key"] => $context["custom_fields"]) {
                // line 170
                echo "\t\t\t";
                if ( !$this->getAttribute($context["custom_fields"], "S_PROFILE_CONTACT", [])) {
                    // line 171
                    echo "\t\t\t\t<dd class=\"profile-custom-field profile-";
                    echo $this->getAttribute($context["custom_fields"], "PROFILE_FIELD_IDENT", []);
                    echo "\"><strong>";
                    echo $this->getAttribute($context["custom_fields"], "PROFILE_FIELD_NAME", []);
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo "</strong> ";
                    echo $this->getAttribute($context["custom_fields"], "PROFILE_FIELD_VALUE", []);
                    echo "</dd>
\t\t\t";
                }
                // line 173
                echo "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_fields'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 174
            echo "\t\t";
            // line 175
            echo "
\t\t";
            // line 176
            // line 177
            echo "\t\t";
            if (( !($context["S_IS_BOT"] ?? null) && twig_length_filter($this->env, $this->getAttribute($context["postrow"], "contact", [])))) {
                // line 178
                echo "\t\t\t<dd class=\"profile-contact\">
\t\t\t\t<strong>";
                // line 179
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("CONTACT");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</strong>
\t\t\t\t<div class=\"dropdown-container dropdown-left\">
\t\t\t\t\t<a href=\"#\" class=\"dropdown-trigger\" title=\"";
                // line 181
                echo $this->getAttribute($context["postrow"], "CONTACT_USER", []);
                echo "\">
\t\t\t\t\t\t<i class=\"icon fa-commenting-o fa-fw icon-lg\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                // line 182
                echo $this->getAttribute($context["postrow"], "CONTACT_USER", []);
                echo "</span>
\t\t\t\t\t</a>
\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t\t\t<div class=\"dropdown-contents contact-icons\">
\t\t\t\t\t\t\t";
                // line 187
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["postrow"], "contact", []));
                foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
                    // line 188
                    echo "\t\t\t\t\t\t\t\t";
                    $context["REMAINDER"] = ($this->getAttribute($context["contact"], "S_ROW_COUNT", []) % 4);
                    // line 189
                    echo "\t\t\t\t\t\t\t\t";
                    $value = ((($context["REMAINDER"] ?? null) == 3) || ($this->getAttribute($context["contact"], "S_LAST_ROW", []) && ($this->getAttribute($context["contact"], "S_NUM_ROWS", []) < 4)));
                    $context['definition']->set('S_LAST_CELL', $value);
                    // line 190
                    echo "\t\t\t\t\t\t\t\t";
                    if ((($context["REMAINDER"] ?? null) == 0)) {
                        // line 191
                        echo "\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t";
                    }
                    // line 193
                    echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                    if ($this->getAttribute($context["contact"], "U_CONTACT", [])) {
                        echo $this->getAttribute($context["contact"], "U_CONTACT", []);
                    } else {
                        echo $this->getAttribute($context["postrow"], "U_POST_AUTHOR", []);
                    }
                    echo "\" title=\"";
                    echo $this->getAttribute($context["contact"], "NAME", []);
                    echo "\"";
                    if ($this->getAttribute(($context["definition"] ?? null), "S_LAST_CELL", [])) {
                        echo " class=\"last-cell\"";
                    }
                    if (($this->getAttribute($context["contact"], "ID", []) == "jabber")) {
                        echo " onclick=\"popup(this.href, 750, 320); return false;\"";
                    }
                    echo ">
\t\t\t\t\t\t\t\t\t\t<span class=\"contact-icon ";
                    // line 194
                    echo $this->getAttribute($context["contact"], "ID", []);
                    echo "-icon\">";
                    echo $this->getAttribute($context["contact"], "NAME", []);
                    echo "</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t";
                    // line 196
                    if (((($context["REMAINDER"] ?? null) == 3) || $this->getAttribute($context["contact"], "S_LAST_ROW", []))) {
                        // line 197
                        echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                    }
                    // line 199
                    echo "\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 200
                echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</dd>
\t\t";
            }
            // line 205
            echo "\t\t";
            // line 206
            echo "
\t\t</dl>

\t\t<div class=\"postbody\">
\t\t\t";
            // line 210
            if ($this->getAttribute($context["postrow"], "S_POST_HIDDEN", [])) {
                // line 211
                echo "\t\t\t\t";
                if ($this->getAttribute($context["postrow"], "S_POST_DELETED", [])) {
                    // line 212
                    echo "\t\t\t\t\t<div class=\"ignore\" id=\"post_hidden";
                    echo $this->getAttribute($context["postrow"], "POST_ID", []);
                    echo "\">
\t\t\t\t\t\t";
                    // line 213
                    echo $this->getAttribute($context["postrow"], "L_POST_DELETED_MESSAGE", []);
                    echo "<br />
\t\t\t\t\t\t";
                    // line 214
                    echo $this->getAttribute($context["postrow"], "L_POST_DISPLAY", []);
                    echo "
\t\t\t\t\t</div>
\t\t\t\t";
                } elseif ($this->getAttribute(                // line 216
$context["postrow"], "S_IGNORE_POST", [])) {
                    // line 217
                    echo "\t\t\t\t\t<div class=\"ignore\" id=\"post_hidden";
                    echo $this->getAttribute($context["postrow"], "POST_ID", []);
                    echo "\">
\t\t\t\t\t\t";
                    // line 218
                    echo $this->getAttribute($context["postrow"], "L_IGNORE_POST", []);
                    echo "<br />
\t\t\t\t\t\t";
                    // line 219
                    echo $this->getAttribute($context["postrow"], "L_POST_DISPLAY", []);
                    echo "
\t\t\t\t\t</div>
\t\t\t\t";
                }
                // line 222
                echo "\t\t\t";
            }
            // line 223
            echo "\t\t\t<div id=\"post_content";
            echo $this->getAttribute($context["postrow"], "POST_ID", []);
            echo "\"";
            if ($this->getAttribute($context["postrow"], "S_POST_HIDDEN", [])) {
                echo " style=\"display: none;\"";
            }
            echo ">

\t\t\t";
            // line 225
            // line 226
            echo "\t\t\t<h5 ";
            if ($this->getAttribute($context["postrow"], "S_FIRST_ROW", [])) {
                echo "class=\"first\"";
            }
            echo ">";
            if ($this->getAttribute($context["postrow"], "POST_ICON_IMG", [])) {
                echo "<img src=\"";
                echo ($context["T_ICONS_PATH"] ?? null);
                echo $this->getAttribute($context["postrow"], "POST_ICON_IMG", []);
                echo "\" width=\"";
                echo $this->getAttribute($context["postrow"], "POST_ICON_IMG_WIDTH", []);
                echo "\" height=\"";
                echo $this->getAttribute($context["postrow"], "POST_ICON_IMG_HEIGHT", []);
                echo "\" alt=\"";
                echo $this->getAttribute($context["postrow"], "POST_ICON_IMG_ALT", []);
                echo "\" title=\"";
                echo $this->getAttribute($context["postrow"], "POST_ICON_IMG_ALT", []);
                echo "\" /> ";
            }
            echo "<a href=\"#p";
            echo $this->getAttribute($context["postrow"], "POST_ID", []);
            echo "\">";
            echo $this->getAttribute($context["postrow"], "POST_SUBJECT", []);
            echo "</a></h5>

\t\t";
            // line 228
            $value = ((((($this->getAttribute($context["postrow"], "U_EDIT", []) || $this->getAttribute($context["postrow"], "U_DELETE", [])) || $this->getAttribute($context["postrow"], "U_REPORT", [])) || $this->getAttribute($context["postrow"], "U_WARN", [])) || $this->getAttribute($context["postrow"], "U_INFO", [])) || $this->getAttribute($context["postrow"], "U_QUOTE", []));
            $context['definition']->set('SHOW_POST_BUTTONS', $value);
            // line 229
            echo "\t\t";
            // line 230
            echo "\t\t";
            if ( !($context["S_IS_BOT"] ?? null)) {
                // line 231
                echo "\t\t\t";
                if ($this->getAttribute(($context["definition"] ?? null), "SHOW_POST_BUTTONS", [])) {
                    // line 232
                    echo "\t\t\t\t<ul class=\"post-buttons\">
\t\t\t\t\t";
                    // line 233
                    // line 234
                    echo "\t\t\t\t\t";
                    if ($this->getAttribute($context["postrow"], "U_EDIT", [])) {
                        // line 235
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                        // line 236
                        echo $this->getAttribute($context["postrow"], "U_EDIT", []);
                        echo "\" title=\"";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("EDIT_POST");
                        echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-pencil fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                        // line 237
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_EDIT");
                        echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                    }
                    // line 241
                    echo "\t\t\t\t\t";
                    if ($this->getAttribute($context["postrow"], "U_DELETE", [])) {
                        // line 242
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                        // line 243
                        echo $this->getAttribute($context["postrow"], "U_DELETE", []);
                        echo "\" title=\"";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE_POST");
                        echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-times fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                        // line 244
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_DELETE");
                        echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                    }
                    // line 248
                    echo "\t\t\t\t\t";
                    if ($this->getAttribute($context["postrow"], "U_REPORT", [])) {
                        // line 249
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                        // line 250
                        echo $this->getAttribute($context["postrow"], "U_REPORT", []);
                        echo "\" title=\"";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REPORT_POST");
                        echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-exclamation fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                        // line 251
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_REPORT");
                        echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                    }
                    // line 255
                    echo "\t\t\t\t\t";
                    if ($this->getAttribute($context["postrow"], "U_WARN", [])) {
                        // line 256
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                        // line 257
                        echo $this->getAttribute($context["postrow"], "U_WARN", []);
                        echo "\" title=\"";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WARN_USER");
                        echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-exclamation-triangle fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                        // line 258
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_WARN");
                        echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                    }
                    // line 262
                    echo "\t\t\t\t\t";
                    if ($this->getAttribute($context["postrow"], "U_INFO", [])) {
                        // line 263
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                        // line 264
                        echo $this->getAttribute($context["postrow"], "U_INFO", []);
                        echo "\" title=\"";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("INFORMATION");
                        echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-info fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                        // line 265
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_INFORMATION");
                        echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                    }
                    // line 269
                    echo "\t\t\t\t\t";
                    if ($this->getAttribute($context["postrow"], "U_QUOTE", [])) {
                        // line 270
                        echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                        // line 271
                        echo $this->getAttribute($context["postrow"], "U_QUOTE", []);
                        echo "\" title=\"";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REPLY_WITH_QUOTE");
                        echo "\" class=\"button button-icon-only\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-quote-left fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                        // line 272
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_QUOTE");
                        echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
                    }
                    // line 276
                    echo "\t\t\t\t\t";
                    // line 277
                    echo "\t\t\t\t</ul>
\t\t\t";
                }
                // line 279
                echo "\t\t";
            }
            // line 280
            echo "\t\t";
            // line 281
            echo "
\t\t\t";
            // line 282
            // line 283
            echo "\t\t\t<p class=\"author\">
\t\t\t\t";
            // line 284
            if (($context["S_IS_BOT"] ?? null)) {
                // line 285
                echo "\t\t\t\t\t<span><i class=\"icon fa-file fa-fw ";
                if ($this->getAttribute($context["postrow"], "S_UNREAD_POST", [])) {
                    echo "icon-red";
                } else {
                    echo "icon-lightgray";
                }
                echo " icon-md\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                echo $this->getAttribute($context["postrow"], "MINI_POST", []);
                echo "</span></span>
\t\t\t\t";
            } else {
                // line 287
                echo "\t\t\t\t\t<a class=\"unread\" href=\"";
                echo $this->getAttribute($context["postrow"], "U_MINI_POST", []);
                echo "\" title=\"";
                echo $this->getAttribute($context["postrow"], "MINI_POST", []);
                echo "\">
\t\t\t\t\t\t<i class=\"icon fa-file fa-fw ";
                // line 288
                if ($this->getAttribute($context["postrow"], "S_UNREAD_POST", [])) {
                    echo "icon-red";
                } else {
                    echo "icon-lightgray";
                }
                echo " icon-md\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                echo $this->getAttribute($context["postrow"], "MINI_POST", []);
                echo "</span>
\t\t\t\t\t</a>
\t\t\t\t";
            }
            // line 291
            echo "\t\t\t\t<span class=\"responsive-hide\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_BY_AUTHOR");
            echo " <strong>";
            echo $this->getAttribute($context["postrow"], "POST_AUTHOR_FULL", []);
            echo "</strong> &raquo; </span>";
            echo $this->getAttribute($context["postrow"], "POST_DATE", []);
            echo "
\t\t\t</p>
\t\t\t";
            // line 293
            // line 294
            echo "
\t\t\t";
            // line 295
            if ($this->getAttribute($context["postrow"], "S_POST_UNAPPROVED", [])) {
                // line 296
                echo "\t\t\t<form method=\"post\" class=\"mcp_approve\" action=\"";
                echo $this->getAttribute($context["postrow"], "U_APPROVE_ACTION", []);
                echo "\">
\t\t\t\t<p class=\"post-notice unapproved\">
\t\t\t\t\t<span><i class=\"icon fa-question icon-red fa-fw\" aria-hidden=\"true\"></i></span>
\t\t\t\t\t<strong>";
                // line 299
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_UNAPPROVED_ACTION");
                echo "</strong>
\t\t\t\t\t<input class=\"button2\" type=\"submit\" value=\"";
                // line 300
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DISAPPROVE");
                echo "\" name=\"action[disapprove]\" />
\t\t\t\t\t<input class=\"button1\" type=\"submit\" value=\"";
                // line 301
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("APPROVE");
                echo "\" name=\"action[approve]\" />
\t\t\t\t\t<input type=\"hidden\" name=\"post_id_list[]\" value=\"";
                // line 302
                echo $this->getAttribute($context["postrow"], "POST_ID", []);
                echo "\" />
\t\t\t\t\t";
                // line 303
                echo ($context["S_FORM_TOKEN"] ?? null);
                echo "
\t\t\t\t</p>
\t\t\t</form>
\t\t\t";
            } elseif ($this->getAttribute(            // line 306
$context["postrow"], "S_POST_DELETED", [])) {
                // line 307
                echo "\t\t\t<form method=\"post\" class=\"mcp_approve\" action=\"";
                echo $this->getAttribute($context["postrow"], "U_APPROVE_ACTION", []);
                echo "\">
\t\t\t\t<p class=\"post-notice deleted\">
\t\t\t\t\t<strong>";
                // line 309
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_DELETED_ACTION");
                echo "</strong>
\t\t\t\t\t";
                // line 310
                if ($this->getAttribute($context["postrow"], "S_DELETE_PERMANENT", [])) {
                    // line 311
                    echo "\t\t\t\t\t\t<input class=\"button2\" type=\"submit\" value=\"";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE");
                    echo "\" name=\"action[delete]\" />
\t\t\t\t\t";
                }
                // line 313
                echo "\t\t\t\t\t<input class=\"button1\" type=\"submit\" value=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESTORE");
                echo "\" name=\"action[restore]\" />
\t\t\t\t\t<input type=\"hidden\" name=\"post_id_list[]\" value=\"";
                // line 314
                echo $this->getAttribute($context["postrow"], "POST_ID", []);
                echo "\" />
\t\t\t\t\t";
                // line 315
                echo ($context["S_FORM_TOKEN"] ?? null);
                echo "
\t\t\t\t</p>
\t\t\t</form>
\t\t\t";
            }
            // line 319
            echo "
\t\t\t";
            // line 320
            if ($this->getAttribute($context["postrow"], "S_POST_REPORTED", [])) {
                // line 321
                echo "\t\t\t<p class=\"post-notice reported\">
\t\t\t\t<a href=\"";
                // line 322
                echo $this->getAttribute($context["postrow"], "U_MCP_REPORT", []);
                echo "\"><i class=\"icon fa-exclamation fa-fw icon-red\" aria-hidden=\"true\"></i><strong>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_REPORTED");
                echo "</strong></a>
\t\t\t</p>
\t\t\t";
            }
            // line 325
            echo "
\t\t\t<div class=\"content\">";
            // line 326
            echo $this->getAttribute($context["postrow"], "MESSAGE", []);
            echo "</div>
\t\t\t";
            // line 327
            // line 328
            echo "
\t\t\t";
            // line 329
            if ($this->getAttribute($context["postrow"], "S_HAS_ATTACHMENTS", [])) {
                // line 330
                echo "\t\t\t\t<dl class=\"attachbox\">
\t\t\t\t\t<dt>
\t\t\t\t\t\t";
                // line 332
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ATTACHMENTS");
                echo "
\t\t\t\t\t</dt>
\t\t\t\t\t";
                // line 334
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["postrow"], "attachment", []));
                foreach ($context['_seq'] as $context["_key"] => $context["attachment"]) {
                    // line 335
                    echo "\t\t\t\t\t\t<dd>";
                    echo $this->getAttribute($context["attachment"], "DISPLAY_ATTACHMENT", []);
                    echo "</dd>
\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attachment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 337
                echo "\t\t\t\t</dl>
\t\t\t";
            }
            // line 339
            echo "
\t\t\t";
            // line 340
            // line 341
            echo "\t\t\t";
            if ($this->getAttribute($context["postrow"], "S_DISPLAY_NOTICE", [])) {
                echo "<div class=\"rules\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DOWNLOAD_NOTICE");
                echo "</div>";
            }
            // line 342
            echo "\t\t\t";
            if (($this->getAttribute($context["postrow"], "DELETED_MESSAGE", []) || $this->getAttribute($context["postrow"], "DELETE_REASON", []))) {
                // line 343
                echo "\t\t\t\t<div class=\"notice post_deleted_msg\">
\t\t\t\t\t";
                // line 344
                echo $this->getAttribute($context["postrow"], "DELETED_MESSAGE", []);
                echo "
\t\t\t\t\t";
                // line 345
                if ($this->getAttribute($context["postrow"], "DELETE_REASON", [])) {
                    echo "<br /><strong>";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REASON");
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo "</strong> <em>";
                    echo $this->getAttribute($context["postrow"], "DELETE_REASON", []);
                    echo "</em>";
                }
                // line 346
                echo "\t\t\t\t</div>
\t\t\t";
            } elseif (($this->getAttribute(            // line 347
$context["postrow"], "EDITED_MESSAGE", []) || $this->getAttribute($context["postrow"], "EDIT_REASON", []))) {
                // line 348
                echo "\t\t\t\t<div class=\"notice\">
\t\t\t\t\t";
                // line 349
                echo $this->getAttribute($context["postrow"], "EDITED_MESSAGE", []);
                echo "
\t\t\t\t\t";
                // line 350
                if ($this->getAttribute($context["postrow"], "EDIT_REASON", [])) {
                    echo "<br /><strong>";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REASON");
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo "</strong> <em>";
                    echo $this->getAttribute($context["postrow"], "EDIT_REASON", []);
                    echo "</em>";
                }
                // line 351
                echo "\t\t\t\t</div>
\t\t\t";
            }
            // line 353
            echo "
\t\t\t";
            // line 354
            if ($this->getAttribute($context["postrow"], "BUMPED_MESSAGE", [])) {
                echo "<div class=\"notice\"><br /><br />";
                echo $this->getAttribute($context["postrow"], "BUMPED_MESSAGE", []);
                echo "</div>";
            }
            // line 355
            echo "\t\t\t";
            // line 356
            echo "\t\t\t";
            if ($this->getAttribute($context["postrow"], "SIGNATURE", [])) {
                echo "<div id=\"sig";
                echo $this->getAttribute($context["postrow"], "POST_ID", []);
                echo "\" class=\"signature\">";
                echo $this->getAttribute($context["postrow"], "SIGNATURE", []);
                echo "</div>";
            }
            // line 357
            echo "
\t\t\t";
            // line 358
            // line 359
            echo "\t\t\t</div>

\t\t</div>

\t\t";
            // line 363
            // line 364
            echo "\t\t<div class=\"back2top\">
\t\t\t";
            // line 365
            // line 366
            echo "\t\t\t<a href=\"#top\" class=\"top\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BACK_TO_TOP");
            echo "\">
\t\t\t\t<i class=\"icon fa-chevron-circle-up fa-fw icon-gray\" aria-hidden=\"true\"></i>
\t\t\t\t<span class=\"sr-only\">";
            // line 368
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BACK_TO_TOP");
            echo "</span>
\t\t\t</a>
\t\t\t";
            // line 370
            // line 371
            echo "\t\t</div>
\t\t";
            // line 372
            // line 373
            echo "
\t\t</div>
\t</div>

\t<hr class=\"divider\" />
\t";
            // line 378
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['postrow'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 380
        echo "
";
        // line 381
        if (($context["S_QUICK_REPLY"] ?? null)) {
            // line 382
            echo "\t";
            $location = "quickreply_editor.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("quickreply_editor.html", "viewtopic_body.html", 382)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
        // line 384
        echo "
";
        // line 385
        // line 386
        echo "\t<hr><div class=\"action-bar bar-bottom\">
\t";
        // line 387
        // line 388
        echo "
\t";
        // line 389
        if (( !($context["S_IS_BOT"] ?? null) && ($context["S_DISPLAY_REPLY_INFO"] ?? null))) {
            // line 390
            echo "\t\t<a href=\"";
            echo ($context["U_POST_REPLY_TOPIC"] ?? null);
            echo "\" class=\"postbutton\" title=\"";
            if (($context["S_IS_LOCKED"] ?? null)) {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPIC_LOCKED");
            } else {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_REPLY");
            }
            echo "\">
\t\t\t";
            // line 391
            if (($context["S_IS_LOCKED"] ?? null)) {
                // line 392
                echo "\t\t\t\t<span>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_TOPIC_LOCKED");
                echo "</span> <i class=\"icon fa-lock fa-fw\" aria-hidden=\"true\"></i>
\t\t\t";
            } else {
                // line 394
                echo "\t\t\t\t<span>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_POST_REPLY");
                echo "</span> <i class=\"icon fa-reply fa-fw\" aria-hidden=\"true\"></i>
\t\t\t";
            }
            // line 396
            echo "\t\t</a>
\t";
        }
        // line 398
        echo "\t";
        // line 399
        echo "
\t";
        // line 400
        $location = "viewtopic_topic_tools.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("viewtopic_topic_tools.html", "viewtopic_body.html", 400)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 401
        echo "
\t";
        // line 402
        if ((((($context["S_NUM_POSTS"] ?? null) > 1) || twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", []))) &&  !($context["S_IS_BOT"] ?? null))) {
            // line 403
            echo "\t\t<form method=\"post\" action=\"";
            echo ($context["S_TOPIC_ACTION"] ?? null);
            echo "\">
\t\t";
            // line 404
            $location = "display_options.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("display_options.html", "viewtopic_body.html", 404)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 405
            echo "\t\t</form>
\t";
        }
        // line 407
        echo "
\t";
        // line 408
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "quickmod", []))) {
            // line 409
            echo "\t<div class=\"quickmod dropdown-container dropdown-container-left dropdown-up dropdown-";
            echo ($context["S_CONTENT_FLOW_END"] ?? null);
            echo " dropdown-button-control\" id=\"quickmod\">
\t\t<span title=\"";
            // line 410
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("QUICK_MOD");
            echo "\" class=\"button button-secondary dropdown-trigger dropdown-select\">
\t\t\t<i class=\"icon fa-gavel fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
            // line 411
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("QUICK_MOD");
            echo "</span>
\t\t\t<span class=\"caret\"><i class=\"icon fa-sort-down fa-fw\" aria-hidden=\"true\"></i></span>
\t\t</span>
\t\t<div class=\"dropdown\">
\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t<ul class=\"dropdown-contents-scp\">
\t\t\t\t";
            // line 417
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "quickmod", []));
            foreach ($context['_seq'] as $context["_key"] => $context["quickmod"]) {
                // line 418
                echo "\t\t\t\t\t";
                $value = twig_in_filter($this->getAttribute($context["quickmod"], "VALUE", []), [0 => "lock", 1 => "unlock", 2 => "delete_topic", 3 => "restore_topic", 4 => "make_normal", 5 => "make_sticky", 6 => "make_announce", 7 => "make_global"]);
                $context['definition']->set('QUICKMOD_AJAX', $value);
                // line 419
                echo "\t\t\t\t\t<li><a href=\"";
                echo $this->getAttribute($context["quickmod"], "LINK", []);
                echo "\"";
                if ($this->getAttribute(($context["definition"] ?? null), "QUICKMOD_AJAX", [])) {
                    echo " data-ajax=\"true\" data-refresh=\"true\"";
                }
                echo ">";
                echo $this->getAttribute($context["quickmod"], "TITLE", []);
                echo "</a></li>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['quickmod'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 421
            echo "\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t";
        }
        // line 425
        echo "
\t";
        // line 426
        // line 427
        echo "
\t";
        // line 428
        if ((twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", [])) || ($context["TOTAL_POSTS"] ?? null))) {
            // line 429
            echo "\t\t<div class=\"pagination\">
\t\t\t";
            // line 430
            echo ($context["TOTAL_POSTS"] ?? null);
            echo "
\t\t\t";
            // line 431
            if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", []))) {
                // line 432
                echo "\t\t\t\t";
                $location = "pagination.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("pagination.html", "viewtopic_body.html", 432)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 433
                echo "\t\t\t";
            } else {
                // line 434
                echo "\t\t\t\t&bull; ";
                echo ($context["PAGE_NUMBER"] ?? null);
                echo "
\t\t\t";
            }
            // line 436
            echo "\t\t</div>
\t";
        }
        // line 438
        echo "</div>

";
        // line 440
        // line 441
        $location = "jumpbox.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("jumpbox.html", "viewtopic_body.html", 441)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 442
        echo "
";
        // line 443
        if ((($context["S_DISPLAY_ONLINE_LIST"] ?? null) && ($context["U_VIEWONLINE"] ?? null))) {
            // line 444
            echo "\t<div class=\"stat-block online-list\">
\t\t<h4><a href=\"";
            // line 445
            echo ($context["U_VIEWONLINE"] ?? null);
            echo "\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WHO_IS_ONLINE");
            echo "</a></h4>
\t\t<p>";
            // line 446
            echo ($context["LOGGED_IN_USER_LIST"] ?? null);
            echo "</p>
\t</div>
";
        }
        // line 449
        echo "
";
        // line 450
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "viewtopic_body.html", 450)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "viewtopic_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1559 => 450,  1556 => 449,  1550 => 446,  1544 => 445,  1541 => 444,  1539 => 443,  1536 => 442,  1524 => 441,  1523 => 440,  1519 => 438,  1515 => 436,  1509 => 434,  1506 => 433,  1493 => 432,  1491 => 431,  1487 => 430,  1484 => 429,  1482 => 428,  1479 => 427,  1478 => 426,  1475 => 425,  1469 => 421,  1454 => 419,  1450 => 418,  1446 => 417,  1437 => 411,  1433 => 410,  1428 => 409,  1426 => 408,  1423 => 407,  1419 => 405,  1407 => 404,  1402 => 403,  1400 => 402,  1397 => 401,  1385 => 400,  1382 => 399,  1380 => 398,  1376 => 396,  1370 => 394,  1364 => 392,  1362 => 391,  1351 => 390,  1349 => 389,  1346 => 388,  1345 => 387,  1342 => 386,  1341 => 385,  1338 => 384,  1324 => 382,  1322 => 381,  1319 => 380,  1314 => 378,  1307 => 373,  1306 => 372,  1303 => 371,  1302 => 370,  1297 => 368,  1291 => 366,  1290 => 365,  1287 => 364,  1286 => 363,  1280 => 359,  1279 => 358,  1276 => 357,  1267 => 356,  1265 => 355,  1259 => 354,  1256 => 353,  1252 => 351,  1243 => 350,  1239 => 349,  1236 => 348,  1234 => 347,  1231 => 346,  1222 => 345,  1218 => 344,  1215 => 343,  1212 => 342,  1205 => 341,  1204 => 340,  1201 => 339,  1197 => 337,  1188 => 335,  1184 => 334,  1179 => 332,  1175 => 330,  1173 => 329,  1170 => 328,  1169 => 327,  1165 => 326,  1162 => 325,  1154 => 322,  1151 => 321,  1149 => 320,  1146 => 319,  1139 => 315,  1135 => 314,  1130 => 313,  1124 => 311,  1122 => 310,  1118 => 309,  1112 => 307,  1110 => 306,  1104 => 303,  1100 => 302,  1096 => 301,  1092 => 300,  1088 => 299,  1081 => 296,  1079 => 295,  1076 => 294,  1075 => 293,  1065 => 291,  1053 => 288,  1046 => 287,  1034 => 285,  1032 => 284,  1029 => 283,  1028 => 282,  1025 => 281,  1023 => 280,  1020 => 279,  1016 => 277,  1014 => 276,  1007 => 272,  1001 => 271,  998 => 270,  995 => 269,  988 => 265,  982 => 264,  979 => 263,  976 => 262,  969 => 258,  963 => 257,  960 => 256,  957 => 255,  950 => 251,  944 => 250,  941 => 249,  938 => 248,  931 => 244,  925 => 243,  922 => 242,  919 => 241,  912 => 237,  906 => 236,  903 => 235,  900 => 234,  899 => 233,  896 => 232,  893 => 231,  890 => 230,  888 => 229,  885 => 228,  858 => 226,  857 => 225,  847 => 223,  844 => 222,  838 => 219,  834 => 218,  829 => 217,  827 => 216,  822 => 214,  818 => 213,  813 => 212,  810 => 211,  808 => 210,  802 => 206,  800 => 205,  793 => 200,  787 => 199,  783 => 197,  781 => 196,  774 => 194,  756 => 193,  752 => 191,  749 => 190,  745 => 189,  742 => 188,  738 => 187,  730 => 182,  726 => 181,  720 => 179,  717 => 178,  714 => 177,  713 => 176,  710 => 175,  708 => 174,  702 => 173,  691 => 171,  688 => 170,  683 => 169,  682 => 168,  679 => 167,  671 => 165,  668 => 164,  666 => 163,  663 => 162,  653 => 161,  643 => 160,  626 => 159,  623 => 158,  621 => 157,  610 => 156,  609 => 155,  605 => 153,  603 => 152,  594 => 151,  593 => 150,  590 => 149,  588 => 148,  585 => 147,  572 => 146,  569 => 145,  568 => 144,  553 => 142,  545 => 141,  517 => 138,  507 => 136,  504 => 135,  502 => 134,  498 => 133,  495 => 132,  494 => 131,  491 => 130,  482 => 124,  478 => 123,  471 => 119,  468 => 118,  460 => 115,  456 => 113,  454 => 112,  451 => 111,  445 => 108,  441 => 106,  439 => 105,  430 => 102,  423 => 100,  420 => 99,  414 => 98,  413 => 97,  400 => 95,  377 => 94,  351 => 93,  339 => 92,  319 => 91,  317 => 90,  313 => 89,  299 => 86,  295 => 85,  285 => 79,  283 => 78,  280 => 77,  279 => 76,  275 => 74,  273 => 73,  269 => 71,  263 => 69,  260 => 68,  247 => 67,  245 => 66,  234 => 65,  231 => 64,  229 => 63,  226 => 62,  218 => 57,  213 => 55,  207 => 54,  202 => 52,  198 => 51,  194 => 50,  189 => 48,  186 => 47,  184 => 46,  181 => 45,  179 => 44,  166 => 43,  165 => 42,  162 => 41,  158 => 39,  152 => 37,  146 => 35,  144 => 34,  133 => 33,  131 => 32,  128 => 31,  127 => 30,  123 => 28,  117 => 24,  112 => 22,  107 => 21,  99 => 19,  97 => 18,  88 => 15,  86 => 14,  83 => 13,  70 => 10,  67 => 9,  65 => 8,  62 => 7,  56 => 6,  53 => 5,  52 => 4,  43 => 3,  42 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "viewtopic_body.html", "");
    }
}
