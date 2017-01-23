<?php

/* wines/search.twig */
class __TwigTemplate_6d127188280425979920a507e4edd4af47c6a6c06c5ed2ee4680346f6342dae6 extends Twig_Template
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
        echo "Affichage du vin ";
        echo twig_escape_filter($this->env, (isset($context["args"]) ? $context["args"] : null), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "wines/search.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "wines/search.twig", "D:\\serv\\UwAmp\\www\\caviste\\src\\views\\wines\\search.twig");
    }
}
