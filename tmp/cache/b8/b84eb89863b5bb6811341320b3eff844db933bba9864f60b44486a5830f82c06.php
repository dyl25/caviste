<?php

/* wines/index.twig */
class __TwigTemplate_6d5cf3fcad360598f0774c436912cfb17982ec6f06619c8399772338dadb65d2 extends Twig_Template
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
        echo "Affichage de tous les vins
";
    }

    public function getTemplateName()
    {
        return "wines/index.twig";
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
        return new Twig_Source("", "wines/index.twig", "D:\\serv\\UwAmp\\www\\caviste\\src\\views\\wines\\index.twig");
    }
}
