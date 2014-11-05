<?php

/* WebCompanyBundle:Home:directorio.html.twig */
class __TwigTemplate_5ce80d9a24a191fd9161cbd32d3f418e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::frontend.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'id' => array($this, 'block_id'),
            'nav' => array($this, 'block_nav'),
            'article' => array($this, 'block_article'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::frontend.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo " ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Directorio", array(), "messages");
    }

    // line 7
    public function block_id($context, array $blocks = array())
    {
        echo "directorio";
    }

    // line 8
    public function block_nav($context, array $blocks = array())
    {
        // line 9
        $this->env->loadTemplate(":includes:destacada.html.twig")->display($context);
    }

    // line 11
    public function block_article($context, array $blocks = array())
    {
        // line 12
        echo "<div class=\"portada\">
   <h1>";
        // line 13
        echo $this->env->getExtension('translator')->getTranslator()->trans("Directorio", array(), "messages");
        echo "</h1>
\t
       ";
        // line 15
        $this->env->loadTemplate(":includes:buscador.html.twig")->display($context);
        // line 16
        echo "        <br/>
   <h4>";
        // line 17
        echo $this->env->getExtension('translator')->getTranslator()->trans("Por Pais", array(), "messages");
        echo "</h4>
";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "pais"));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 19
            echo "<a style=\"color:#0055cc; font-size: 14px;\"  href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("WebCompanyBundle_search_pais", array("id" => $this->getAttribute($this->getContext($context, "country"), "id"))), "html", null, true);
            echo "\"> 
    ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "country"), "name"), "html", null, true);
            echo "</a> 
<br/>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 23
        echo "</div>   
";
    }

    public function getTemplateName()
    {
        return "WebCompanyBundle:Home:directorio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 23,  78 => 20,  73 => 19,  69 => 18,  65 => 17,  62 => 16,  60 => 15,  55 => 13,  52 => 12,  49 => 11,  45 => 9,  42 => 8,  36 => 7,  29 => 5,);
    }
}
