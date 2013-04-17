<?php

/* PHPWSocialBundle:Default:index.html.twig */
class __TwigTemplate_28603c64e46e02610c309e086d7a2bb3 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <!-- Bootstrap -->
    <link rel=\"stylesheet\" href=\"/bootstrap/css/bootstrap.css\">
  </head>
  <body>
    <p class=\"alert\">Hello ";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "!</p>
    <table class=\"table table-bordered\">
      <tr><th>Hello</th><th>Toi</th></tr>
    </table>
   <script src=\"/bootstrap/js/jquery.js\"><\\/script>
   <script src=\"/bootstrap/js/bootstrap.js\"></script>
  </body>
</html>
";
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
        return array (  29 => 9,  19 => 1,);
    }
}
