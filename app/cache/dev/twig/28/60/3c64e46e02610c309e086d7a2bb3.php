<?php

/* PHPWSocialBundle:Default:index.html.twig */
class __TwigTemplate_28603c64e46e02610c309e086d7a2bb3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base2sn.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base2sn.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Accueil";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        if ((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"))) {
            // line 7
            echo "<table class=\"table table-bordered\">
\t<tr>
\t\t<th>Hello</th><th>";
            // line 9
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
            echo "</th>
\t</tr>
</table>
";
        } else {
            // line 13
            echo "\t<p>Pas trouvé</p>
\t";
        }
    }

    public function getTemplateName()
    {
        return "PHPWSocialBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 13,  44 => 9,  40 => 7,  38 => 6,  35 => 5,  29 => 3,);
    }
}
