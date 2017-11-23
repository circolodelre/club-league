<?php

/* home.twig */
class __TwigTemplate_077473d47e64179052fe9f62d4c39d2e1e63fa5d4cc5d8f5222b0adf07bf27b7 extends Twig_Template
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
        echo "<html>
<head>
    <meta charset=\"utf-8\"/>
    <title>Slim 3</title>
    <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <link href='";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->baseUrl(), "html", null, true);
        echo "/css/style.css' rel='stylesheet' type='text/css'>
</head>
<body>
<h1>Slim</h1>
<div>a microframework for PHP</div>
<div>a microframework for PHP</div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 6,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<html>
<head>
    <meta charset=\"utf-8\"/>
    <title>Slim 3</title>
    <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <link href='{{ base_url() }}/css/style.css' rel='stylesheet' type='text/css'>
</head>
<body>
<h1>Slim</h1>
<div>a microframework for PHP</div>
<div>a microframework for PHP</div>
</body>
</html>", "home.twig", "/var/www/html/view/home.twig");
    }
}
