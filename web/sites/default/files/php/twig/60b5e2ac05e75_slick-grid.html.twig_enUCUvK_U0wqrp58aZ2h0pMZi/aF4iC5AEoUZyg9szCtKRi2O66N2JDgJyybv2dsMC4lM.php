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

/* modules/contrib/slick/templates/slick-grid.html.twig */
class __TwigTemplate_219a740935b024c78db91fb876cc3f487dca660f95d9a18c29bee0f25652d3c3 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        $context["classes"] = [0 => ((twig_get_attribute($this->env, $this->source,         // line 14
($context["settings"] ?? null), "unslick", [], "any", false, false, true, 14)) ? ("slick__grid") : ("slide__content")), 1 => "block-columngrid", 2 => ("block-" . $this->sandbox->ensureToStringAllowed(        // line 16
($context["grid_id"] ?? null), 16, $this->source)), 3 => ((twig_get_attribute($this->env, $this->source,         // line 17
($context["settings"] ?? null), "grid_small", [], "any", false, false, true, 17)) ? (((("small-block-" . $this->sandbox->ensureToStringAllowed(($context["grid_id"] ?? null), 17, $this->source)) . "-") . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "grid_small", [], "any", false, false, true, 17), 17, $this->source))) : ("")), 4 => ((twig_get_attribute($this->env, $this->source,         // line 18
($context["settings"] ?? null), "grid_medium", [], "any", false, false, true, 18)) ? (((("medium-block-" . $this->sandbox->ensureToStringAllowed(($context["grid_id"] ?? null), 18, $this->source)) . "-") . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "grid_medium", [], "any", false, false, true, 18), 18, $this->source))) : ("")), 5 => ((twig_get_attribute($this->env, $this->source,         // line 19
($context["settings"] ?? null), "grid", [], "any", false, false, true, 19)) ? (((("large-block-" . $this->sandbox->ensureToStringAllowed(($context["grid_id"] ?? null), 19, $this->source)) . "-") . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "grid", [], "any", false, false, true, 19), 19, $this->source))) : (""))];
        // line 23
        $context["item_classes"] = [0 => (( !twig_get_attribute($this->env, $this->source,         // line 24
($context["settings"] ?? null), "unslick", [], "any", false, false, true, 24)) ? ("slide__grid") : ("")), 1 => "grid", 2 => ((twig_get_attribute($this->env, $this->source,         // line 26
($context["settings"] ?? null), "type", [], "any", false, false, true, 26)) ? (("grid--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "type", [], "any", false, false, true, 26), 26, $this->source)))) : ("")), 3 => ((twig_get_attribute($this->env, $this->source,         // line 27
($context["settings"] ?? null), "media_switch", [], "any", false, false, true, 27)) ? (("grid--" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "media_switch", [], "any", false, false, true, 27), 27, $this->source))) : ("")), 4 => (((twig_get_attribute($this->env, $this->source,         // line 28
($context["settings"] ?? null), "media_switch", [], "any", false, false, true, 28) && twig_in_filter("box", twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "media_switch", [], "any", false, false, true, 28)))) ? ("grid--litebox") : (""))];
        // line 31
        echo "
<ul";
        // line 32
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 32), 32, $this->source), "html", null, true));
        echo ">
  ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["delta"] => $context["item"]) {
            // line 34
            echo "    <li";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 34), "addClass", [0 => ($context["item_classes"] ?? null), 1 => ("grid--" . $this->sandbox->ensureToStringAllowed($context["delta"], 34, $this->source))], "method", false, false, true, 34), 34, $this->source), "html", null, true));
            echo ">
      <div class=\"grid__content\">
        ";
            // line 36
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "content", [], "any", false, false, true, 36), 36, $this->source), "html", null, true));
            echo "
      </div>
    </li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['delta'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "</ul>

";
    }

    public function getTemplateName()
    {
        return "modules/contrib/slick/templates/slick-grid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 40,  69 => 36,  63 => 34,  59 => 33,  55 => 32,  52 => 31,  50 => 28,  49 => 27,  48 => 26,  47 => 24,  46 => 23,  44 => 19,  43 => 18,  42 => 17,  41 => 16,  40 => 14,  39 => 13,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/slick/templates/slick-grid.html.twig", "/var/www/web/modules/contrib/slick/templates/slick-grid.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 13, "for" => 33);
        static $filters = array("clean_class" => 26, "escape" => 32);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for'],
                ['clean_class', 'escape'],
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
