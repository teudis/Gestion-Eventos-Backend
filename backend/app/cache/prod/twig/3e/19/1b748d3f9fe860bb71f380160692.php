<?php

/* :includes:buscador.html.twig */
class __TwigTemplate_3e191b748d3f9fe860bb71f380160692 extends Twig_Template
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
        echo "<form class=\"well form-search\" action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("WebCompanyBundle_search_name"), "html", null, true);
        echo "\" method=\"post\">
    <label>";
        // line 2
        echo $this->env->getExtension('translator')->getTranslator()->trans("Nombre de Empresa", array(), "messages");
        echo " </label>
    <input type=\"text\" class=\"input-medium search-query\" name=\"nombre\">
  <button type=\"submit\" class=\"btn\">";
        // line 4
        echo $this->env->getExtension('translator')->getTranslator()->trans("Buscar", array(), "messages");
        echo " </button>
</form>
<br/>
<h4>";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Orden Alfabetico", array(), "messages");
        echo "</h4>
";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range("A", "Z"));
        foreach ($context['_seq'] as $context["_key"] => $context["letras"]) {
            // line 9
            echo "<a style=\"color:#0055cc; font-size: 20px;\"  href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("WebCompanyBundle_search_letra", array("letter" => $this->getContext($context, "letras"))), "html", null, true);
            echo "\">
 ";
            // line 10
            echo twig_escape_filter($this->env, $this->getContext($context, "letras"), "html", null, true);
            echo "</a> &nbsp;
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['letras'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    public function getTemplateName()
    {
        return ":includes:buscador.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 10,  41 => 9,  37 => 8,  33 => 7,  27 => 4,  22 => 2,  17 => 1,  87 => 23,  78 => 20,  73 => 19,  69 => 18,  65 => 17,  62 => 16,  60 => 15,  55 => 13,  52 => 12,  49 => 11,  45 => 9,  42 => 8,  36 => 7,  29 => 5,);
    }
}
