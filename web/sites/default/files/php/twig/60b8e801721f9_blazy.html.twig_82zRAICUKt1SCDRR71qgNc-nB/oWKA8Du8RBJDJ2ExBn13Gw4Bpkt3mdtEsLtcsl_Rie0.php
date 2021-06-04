<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/contrib/blazy/templates/blazy.html.twig */
class __TwigTemplate_a62f5cedd8b43bb1d0f933eb8e9e70c18cd6f3c9ddf807201acf4f36126b6487 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'blazy_player' => [$this, 'block_blazy_player'],
            'blazy_media' => [$this, 'block_blazy_media'],
            'blazy_content' => [$this, 'block_blazy_content'],
            'blazy_caption' => [$this, 'block_blazy_caption'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 55
        $context["classes"] = [0 => ((        // line 56
($context["content"] ?? null)) ? ("media--rendered") : ("")), 1 => ((twig_get_attribute($this->env, $this->source,         // line 57
($context["settings"] ?? null), "bundle", [], "any", false, false, true, 57)) ? (("media--bundle--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "bundle", [], "any", false, false, true, 57), 57, $this->source)))) : ("")), 2 => ((twig_get_attribute($this->env, $this->source,         // line 58
($context["settings"] ?? null), "namespace", [], "any", false, false, true, 58)) ? (("media--" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "namespace", [], "any", false, false, true, 58), 58, $this->source))) : ("")), 3 => (((twig_get_attribute($this->env, $this->source,         // line 59
($context["settings"] ?? null), "lazy", [], "any", false, false, true, 59) && twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "use_loading", [], "any", false, false, true, 59))) ? ("media--loading is-b-loading") : ("")), 4 => ((twig_get_attribute($this->env, $this->source,         // line 60
($context["settings"] ?? null), "media_switch", [], "any", false, false, true, 60)) ? (("media--switch media--switch--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "media_switch", [], "any", false, false, true, 60), 60, $this->source)))) : ("")), 5 => ((twig_get_attribute($this->env, $this->source,         // line 61
($context["settings"] ?? null), "player", [], "any", false, false, true, 61)) ? ("media--player") : ("")), 6 => ((twig_get_attribute($this->env, $this->source,         // line 62
($context["settings"] ?? null), "ratio", [], "any", false, false, true, 62)) ? (("media--ratio media--ratio--" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "ratio", [], "any", false, false, true, 62), 62, $this->source))) : ("")), 7 => ((twig_get_attribute($this->env, $this->source,         // line 63
($context["settings"] ?? null), "responsive_image_style_id", [], "any", false, false, true, 63)) ? ("media--responsive") : ("")), 8 => ((twig_get_attribute($this->env, $this->source,         // line 64
($context["settings"] ?? null), "type", [], "any", false, false, true, 64)) ? (("media--" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "type", [], "any", false, false, true, 64), 64, $this->source))) : ("")), 9 => ((twig_get_attribute($this->env, $this->source,         // line 65
($context["settings"] ?? null), "classes", [], "any", false, false, true, 65)) ? (\Drupal\Component\Utility\Html::getClass(twig_join_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "classes", [], "any", false, false, true, 65), 65, $this->source), " "))) : (""))];
        // line 68
        echo "
";
        // line 69
        ob_start(function () { return ''; });
        // line 70
        echo "  ";
        $this->displayBlock('blazy_player', $context, $blocks);
        $context["player"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 79
        echo "
";
        // line 80
        ob_start(function () { return ''; });
        // line 81
        echo "  ";
        $this->displayBlock('blazy_media', $context, $blocks);
        $context["media"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 96
        echo "
";
        // line 97
        ob_start(function () { return ''; });
        // line 98
        echo "  ";
        $this->displayBlock('blazy_content', $context, $blocks);
        // line 115
        echo "
  ";
        // line 116
        if ((($context["captions"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["captions"] ?? null), "inline", [], "any", true, true, true, 116))) {
            // line 117
            echo "    ";
            $this->displayBlock('blazy_caption', $context, $blocks);
            // line 126
            echo "  ";
        }
        // line 128
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["postscript"] ?? null), 128, $this->source), "html", null, true));
        $context["blazy"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 131
        echo "
";
        // line 132
        if (($context["wrapper_attributes"] ?? null)) {
            // line 133
            echo "  <div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapper_attributes"] ?? null), 133, $this->source), "html", null, true));
            echo ">";
            // line 134
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["blazy"] ?? null), 134, $this->source), "html", null, true));
            // line 135
            echo "</div>
";
        } else {
            // line 137
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["blazy"] ?? null), 137, $this->source), "html", null, true));
            echo "
";
        }
    }

    // line 70
    public function block_blazy_player($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 71
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "player", [], "any", false, false, true, 71)) {
            // line 72
            echo "      <span class=\"media__icon media__icon--close\"></span>
      <span class=\"media__icon media__icon--play\" data-url=\"";
            // line 73
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "embed_url", [], "any", false, false, true, 73), 73, $this->source), "html", null, true));
            echo "\"></span>
    ";
        } else {
            // line 75
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["iframe"] ?? null), 75, $this->source), "html", null, true));
        }
        // line 77
        echo "  ";
    }

    // line 81
    public function block_blazy_media($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 82
        echo "    <div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 82), 82, $this->source), "html", null, true));
        echo ">";
        // line 83
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["preface"] ?? null), 83, $this->source), "html", null, true));
        // line 84
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["noscript"] ?? null), 84, $this->source), "html", null, true));
        // line 85
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 85, $this->source), "html", null, true));
        // line 86
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["image"] ?? null), 86, $this->source), "html", null, true));
        // line 87
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["overlay"] ?? null), 87, $this->source), "html", null, true));
        // line 88
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["player"] ?? null), 88, $this->source), "html", null, true));
        // line 91
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "icon", [], "any", false, false, true, 91), 91, $this->source), "html", null, true));
        // line 92
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["icon"] ?? null), 92, $this->source), "html", null, true));
        // line 93
        echo "</div>
  ";
    }

    // line 98
    public function block_blazy_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 99
        echo "    ";
        if (($context["media_attributes"] ?? null)) {
            echo "<div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["media_attributes"] ?? null), 99, $this->source), "html", null, true));
            echo ">";
        }
        // line 100
        echo "      ";
        if ((($context["url"] ?? null) &&  !twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "player", [], "any", false, false, true, 100))) {
            // line 101
            echo "        <a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 101, $this->source), "html", null, true));
            echo "\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url_attributes"] ?? null), 101, $this->source), "html", null, true));
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["media"] ?? null), 101, $this->source), "html", null, true));
            echo "</a>

        ";
            // line 104
            echo "        ";
            if ((($context["captions"] ?? null) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["captions"] ?? null), "lightbox", [], "any", false, false, true, 104)))) {
                // line 105
                echo "          <div class=\"litebox-caption visually-hidden\">";
                // line 106
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["captions"] ?? null), "lightbox", [], "any", false, false, true, 106), 106, $this->source), "html", null, true));
                // line 107
                echo "</div>
        ";
            }
            // line 109
            echo "
      ";
        } else {
            // line 111
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["media"] ?? null), 111, $this->source), "html", null, true));
        }
        // line 113
        echo "    ";
        if (($context["media_attributes"] ?? null)) {
            echo "</div>";
        }
        // line 114
        echo "  ";
    }

    // line 117
    public function block_blazy_caption($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 118
        echo "      <div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["caption_attributes"] ?? null), 118, $this->source), "html", null, true));
        echo ">
        ";
        // line 119
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["captions"] ?? null), "inline", [], "any", false, false, true, 119));
        foreach ($context['_seq'] as $context["_key"] => $context["caption"]) {
            // line 120
            echo "          ";
            if (twig_get_attribute($this->env, $this->source, $context["caption"], "content", [], "any", false, false, true, 120)) {
                // line 121
                echo "            <";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["caption"], "tag", [], "any", false, false, true, 121), 121, $this->source), "html", null, true));
                echo " ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["caption"], "attributes", [], "any", false, false, true, 121), 121, $this->source), "html", null, true));
                echo ">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["caption"], "content", [], "any", false, false, true, 121), 121, $this->source), "html", null, true));
                echo "</";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["caption"], "tag", [], "any", false, false, true, 121), 121, $this->source), "html", null, true));
                echo ">
          ";
            }
            // line 123
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['caption'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 124
        echo "      </div>
    ";
    }

    public function getTemplateName()
    {
        return "modules/contrib/blazy/templates/blazy.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  253 => 124,  247 => 123,  235 => 121,  232 => 120,  228 => 119,  223 => 118,  219 => 117,  215 => 114,  210 => 113,  207 => 111,  203 => 109,  199 => 107,  197 => 106,  195 => 105,  192 => 104,  182 => 101,  179 => 100,  172 => 99,  168 => 98,  163 => 93,  161 => 92,  159 => 91,  157 => 88,  155 => 87,  153 => 86,  151 => 85,  149 => 84,  147 => 83,  143 => 82,  139 => 81,  135 => 77,  132 => 75,  127 => 73,  124 => 72,  121 => 71,  117 => 70,  110 => 137,  106 => 135,  104 => 134,  100 => 133,  98 => 132,  95 => 131,  92 => 128,  89 => 126,  86 => 117,  84 => 116,  81 => 115,  78 => 98,  76 => 97,  73 => 96,  69 => 81,  67 => 80,  64 => 79,  60 => 70,  58 => 69,  55 => 68,  53 => 65,  52 => 64,  51 => 63,  50 => 62,  49 => 61,  48 => 60,  47 => 59,  46 => 58,  45 => 57,  44 => 56,  43 => 55,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/blazy/templates/blazy.html.twig", "/var/www/web/modules/contrib/blazy/templates/blazy.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 55, "block" => 70, "if" => 116, "for" => 119);
        static $filters = array("clean_class" => 57, "join" => 65, "escape" => 128);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if', 'for'],
                ['clean_class', 'join', 'escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
