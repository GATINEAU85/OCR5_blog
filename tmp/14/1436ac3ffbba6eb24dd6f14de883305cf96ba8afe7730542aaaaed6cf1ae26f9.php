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

/* base.html.twig */
class __TwigTemplate_76a5582f329fd0d79451e146f795ca76de2d8fb1c002bcedca88a6e885ba65c4 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'body' => [$this, 'block_body'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>

  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  <meta name=\"description\" content=\"\">
  <meta name=\"author\" content=\"\">

  <title>Adrien GATINEAU - Blog</title>

  <!-- Font Awesome Icons -->
  <link href=\"../vendor/fontawesome-free/css/all.min.css\" rel=\"stylesheet\" type=\"text/css\">

  <!-- Google Fonts -->
  <link href=\"https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700\" rel=\"stylesheet\">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href=\"../vendor/magnific-popup/magnific-popup.css\" rel=\"stylesheet\">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href=\"../css/creative.css\" rel=\"stylesheet\">

</head>
    

<!-- Navigation -->
<nav class=\"navbar navbar-expand-lg navbar-light fixed-top py-3\" id=\"mainNav\">
<div class=\"container\">
  <a class=\"navbar-brand js-scroll-trigger\" href=\"#page-top\">Adrien GATINEAU</a>
  <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
    <span class=\"navbar-toggler-icon\"></span>
  </button>
  <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
    <ul class=\"navbar-nav ml-auto my-2 my-lg-0\">
      <li class=\"nav-item\">
        <a class=\"nav-link js-scroll-trigger\" href=\"index.php\">Home</a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link js-scroll-trigger\" href=\"blog.php\">Blog Post</a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link js-scroll-trigger\" href=\"perso.php\">Qui suis-je ?</a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link js-scroll-trigger\" href=\"contact.php\">Contact</a>
      </li>
    </ul>
  </div>
</div>
</nav>
    
";
        // line 55
        $this->displayBlock('body', $context, $blocks);
        // line 56
        $this->displayBlock('footer', $context, $blocks);
        // line 57
        echo "    
  <!-- Bootstrap core JavaScript -->
  <script src=\"../vendor/jquery/jquery.min.js\"></script>
  <script src=\"../vendor/bootstrap/js/bootstrap.bundle.min.js\"></script>

  <!-- Plugin JavaScript -->
  <script src=\"../vendor/jquery-easing/jquery.easing.min.js\"></script>
  <script src=\"../vendor/magnific-popup/jquery.magnific-popup.min.js\"></script>

  <!-- Custom scripts for this template -->
  <script src=\"../js/creative.min.js\"></script>
</html>
";
    }

    // line 55
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 56
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  121 => 56,  115 => 55,  99 => 57,  97 => 56,  95 => 55,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html.twig", "C:\\wamp64\\www\\projet5\\templates\\base.html.twig");
    }
}
