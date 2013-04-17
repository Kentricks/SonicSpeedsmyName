<?php

/* ::base2sn.html.twig */
class __TwigTemplate_0fcf9497a8886c6363ab2b32a3ef54ee extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'navbar' => array($this, 'block_navbar'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"stylesheet\" href=\"/bootstrap/css/bootstrap.css\">
    </head>
    <body>
        <h1>2SN</h1>
        <div id=\"navbar\">
            ";
        // line 11
        $this->displayBlock('navbar', $context, $blocks);
        // line 26
        echo "        </div>

        <div id=\"content\">
            ";
        // line 29
        $this->displayBlock('body', $context, $blocks);
        // line 30
        echo "        </div>

        <div id=\"footer\">
            ";
        // line 33
        $this->displayBlock('footer', $context, $blocks);
        // line 43
        echo "        </div>
        <script src=\"/bootstrap/js/jquery.js\"></script>
        <script src=\"/bootstrap/js/bootstrap.js\"></script>
    </body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Test Application";
    }

    // line 11
    public function block_navbar($context, array $blocks = array())
    {
        // line 12
        echo "            <div class=\"navbar navbar\">
                <div class=\"navbar-inner\">
                        <ul class=\"nav\">
                            <li><a  class=\"brand\" href=\"#\">Accueil</a></li>
                            <li class=\"active\"><a href=\"#\">Mon compte</a></li>
                            <li><a href=\"#\">Messages</a></li>
                            <li><a href=\"#\">Mes amis</a></li>
                        </ul>
                        <ul class=\"nav pull-right\">
                        <li><a href=\"#\"><i src='../images/glaphicons-halflings.png'class=\"icon-off\"></i>Deconnexion</a></li>
                        </ul>
                </div>
            </div>
            ";
    }

    // line 29
    public function block_body($context, array $blocks = array())
    {
    }

    // line 33
    public function block_footer($context, array $blocks = array())
    {
        // line 34
        echo "            <div class=\"navbar navbar\">
                <div class=\"navbar-inner\">
                        <ul class=\"nav\">
                            <li><a href=\"#\">A Propos</a></li>
                            <li><a href=\"#\">© Copyright 2013 </a></li>
                        </ul>
                </div>
            </div>
            ";
    }

    public function getTemplateName()
    {
        return "::base2sn.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  96 => 34,  93 => 33,  88 => 29,  71 => 12,  68 => 11,  62 => 5,  54 => 43,  52 => 33,  47 => 30,  45 => 29,  40 => 26,  38 => 11,  29 => 5,  23 => 1,);
    }
}
