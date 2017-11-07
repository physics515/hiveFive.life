<?php

/* ucp_pm_message_header.html */
class __TwigTemplate_ea9f2fc1bcfa8570066ee37cbb45412324a5fc1d9fcff6c3dd7ed87564cb8742 extends Twig_Template
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
        echo "<h2>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TITLE");
        if (($context["CUR_FOLDER_NAME"] ?? null)) {
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo " ";
            echo ($context["CUR_FOLDER_NAME"] ?? null);
        }
        echo "</h2>

<form id=\"viewfolder\" method=\"post\" action=\"";
        // line 3
        echo ($context["S_PM_ACTION"] ?? null);
        echo "\">

<div class=\"panel\">
\t<div class=\"inner\">
\t";
        // line 7
        if ((($context["FOLDER_STATUS"] ?? null) && (($context["FOLDER_MAX_MESSAGES"] ?? null) != 0))) {
            echo "<p>";
            echo ($context["FOLDER_STATUS"] ?? null);
            echo "</p>";
        }
        // line 8
        echo "
\t<div class=\"action-bar bar-top\">
\t";
        // line 10
        if (((($context["U_POST_REPLY_PM"] ?? null) || ($context["U_POST_NEW_TOPIC"] ?? null)) || ($context["U_FORWARD_PM"] ?? null))) {
            // line 11
            echo "\t\t";
            if (($context["U_POST_REPLY_PM"] ?? null)) {
                // line 12
                echo "\t\t\t<a title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_REPLY_PM");
                echo "\" href=\"";
                echo ($context["U_POST_REPLY_PM"] ?? null);
                echo "\" class=\"button\">
\t\t\t\t<span>";
                // line 13
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_PM_REPLY");
                echo "</span> <i class=\"icon fa-reply fa-fw\" aria-hidden=\"true\"></i>
\t\t\t</a>
\t\t";
            } elseif (            // line 15
($context["U_POST_NEW_TOPIC"] ?? null)) {
                // line 16
                echo "\t\t\t<a href=\"";
                echo ($context["U_POST_NEW_TOPIC"] ?? null);
                echo "\" accesskey=\"n\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UCP_PM_COMPOSE");
                echo "\" class=\"button\">
\t\t\t\t<span>";
                // line 17
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_PM_NEW");
                echo "</span> <i class=\"icon fa-pencil fa-fw\" aria-hidden=\"true\"></i>
\t\t\t</a>
\t\t";
            }
            // line 20
            echo "\t\t";
            if (($context["U_FORWARD_PM"] ?? null)) {
                // line 21
                echo "\t\t\t<a title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POST_FORWARD_PM");
                echo "\" href=\"";
                echo ($context["U_FORWARD_PM"] ?? null);
                echo "\" class=\"button\">
\t\t\t\t<span>";
                // line 22
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_PM_FORWARD");
                echo "</span> <i class=\"icon fa-mail-forward fa-fw\" aria-hidden=\"true\"></i>
\t\t\t</a>
\t\t";
            }
            // line 25
            echo "\t\t";
            if ((($context["U_POST_REPLY_PM"] ?? null) && (($context["S_PM_RECIPIENTS"] ?? null) > 1))) {
                // line 26
                echo "\t\t\t<a title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REPLY_TO_ALL");
                echo "\" href=\"";
                echo ($context["U_POST_REPLY_ALL"] ?? null);
                echo "\" class=\"button\">
\t\t\t\t<span>";
                // line 27
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BUTTON_PM_REPLY_ALL");
                echo "</span> <i class=\"icon fa-pencil fa-fw\" aria-hidden=\"true\"></i>
\t\t\t</a>
\t\t";
            }
            // line 30
            echo "\t";
        }
        // line 31
        echo "
\t";
        // line 32
        if (( !($context["S_IS_BOT"] ?? null) && ($context["U_PRINT_PM"] ?? null))) {
            // line 33
            echo "\t\t<div class=\"dropdown-container dropdown-button-control topic-tools\">
\t\t\t<span title=\"";
            // line 34
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PM_TOOLS");
            echo "\" class=\"button button-secondary dropdown-trigger dropdown-select\">
\t\t\t\t<i class=\"icon fa-wrench fa-fw\" aria-hidden=\"true\"></i>
\t\t\t\t<span class=\"caret\"><i class=\"icon fa-sort-down fa-fw\" aria-hidden=\"true\"></i></span>
\t\t\t</span>
\t\t\t<div class=\"dropdown\">
\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t<ul class=\"dropdown-contents\">
\t\t\t\t\t";
            // line 41
            if (($context["U_PRINT_PM"] ?? null)) {
                // line 42
                echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                // line 43
                echo ($context["U_PRINT_PM"] ?? null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PRINT_PM");
                echo "\" accesskey=\"p\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-print fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 44
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PRINT_PM");
                echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
            }
            // line 48
            echo "\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t";
        }
        // line 52
        echo "
\t";
        // line 53
        if ((($context["TOTAL_MESSAGES"] ?? null) || ($context["S_VIEW_MESSAGE"] ?? null))) {
            // line 54
            echo "\t\t<div class=\"pagination\">
\t\t\t";
            // line 55
            if (($context["S_VIEW_MESSAGE"] ?? null)) {
                // line 56
                echo "\t\t\t\t<a class=\"arrow-";
                echo ($context["S_CONTENT_FLOW_BEGIN"] ?? null);
                echo "\" href=\"";
                echo ($context["U_CURRENT_FOLDER"] ?? null);
                echo "\">
\t\t\t\t\t<i class=\"icon fa-angle-";
                // line 57
                echo ($context["S_CONTENT_FLOW_BEGIN"] ?? null);
                echo " fa-fw icon-black\" aria-hidden=\"true\"></i><span>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RETURN_TO_FOLDER");
                echo "</span>
\t\t\t\t</a>
\t\t\t";
            } elseif ((            // line 59
($context["FOLDER_CUR_MESSAGES"] ?? null) != 0)) {
                // line 60
                echo "\t\t\t\t";
                if (($context["U_MARK_ALL"] ?? null)) {
                    echo "<a href=\"";
                    echo ($context["U_MARK_ALL"] ?? null);
                    echo "\" class=\"mark\">";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PM_MARK_ALL_READ");
                    echo "</a> &bull; ";
                }
                // line 61
                echo "\t\t\t\t";
                echo ($context["TOTAL_MESSAGES"] ?? null);
                echo "
\t\t\t\t";
                // line 62
                if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "pagination", array()))) {
                    // line 63
                    echo "\t\t\t\t\t";
                    $location = "pagination.html";
                    $namespace = false;
                    if (strpos($location, '@') === 0) {
                        $namespace = substr($location, 1, strpos($location, '/') - 1);
                        $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                        $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                    }
                    $this->loadTemplate("pagination.html", "ucp_pm_message_header.html", 63)->display($context);
                    if ($namespace) {
                        $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                    }
                    // line 64
                    echo "\t\t\t\t";
                } else {
                    // line 65
                    echo "\t\t\t\t\t &bull; ";
                    echo ($context["PAGE_NUMBER"] ?? null);
                    echo "
\t\t\t\t";
                }
                // line 67
                echo "\t\t\t";
            }
            // line 68
            echo "\t\t</div>
\t";
        }
        // line 70
        echo "\t</div>
";
    }

    public function getTemplateName()
    {
        return "ucp_pm_message_header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 70,  223 => 68,  220 => 67,  214 => 65,  211 => 64,  198 => 63,  196 => 62,  191 => 61,  182 => 60,  180 => 59,  173 => 57,  166 => 56,  164 => 55,  161 => 54,  159 => 53,  156 => 52,  150 => 48,  143 => 44,  137 => 43,  134 => 42,  132 => 41,  122 => 34,  119 => 33,  117 => 32,  114 => 31,  111 => 30,  105 => 27,  98 => 26,  95 => 25,  89 => 22,  82 => 21,  79 => 20,  73 => 17,  66 => 16,  64 => 15,  59 => 13,  52 => 12,  49 => 11,  47 => 10,  43 => 8,  37 => 7,  30 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "ucp_pm_message_header.html", "");
    }
}
