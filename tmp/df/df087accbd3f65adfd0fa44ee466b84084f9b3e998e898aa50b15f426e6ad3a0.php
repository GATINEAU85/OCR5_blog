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

/* index.html.twig */
class __TwigTemplate_e69873fa5a3e36433b4192c42d61a3fa074b830b6b863a398aefd2bb9c1ff19b extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html.twig", "index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<body id=\"page-top\">
  <!-- Masthead -->
  <header class=\"masthead\">
    <div class=\"container h-100\">
      <div class=\"row h-100 align-items-center justify-content-center text-center\">
        <div class=\"col-lg-10 align-self-end\">
          <h1 class=\"text-uppercase font-weight-bold\">Adrien GATINEAU</h1>
          <hr class=\"divider my-4\">
        </div>
        <div class=\"col-lg-8 align-self-baseline\">
          <p class=\"text-white-75 font-weight-light mb-5\">Le développeur SIG qu'il vous faut !</p>
          <a class=\"btn btn-primary btn-xl js-scroll-trigger\" href=\"#about\">Qui suis-je ?</a>
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class=\"page-section bg-primary\" id=\"about\">
    <div class=\"container\">
      <div class=\"row justify-content-center\">
        <div class=\"col-lg-8 text-center\">
          <h2 class=\"text-white mt-0\">Apprendre</h2>
          <hr class=\"divider light my-4\">
          <p class=\"text-white-50 mb-4\">Cela fait maintenant, plus de 6 mois que j'apprends le développement web ! Allant du Front au Back, j'essaye d'apprendre et de me professionnaliser le mieux et le plus vite possible ! Pour cela, quoi de mieux que de créer un blog :</p>
          <a class=\"btn btn-light btn-xl js-scroll-trigger\" href=\"#services\">Post Blog</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class=\"page-section\" id=\"services\">
    <div class=\"container\">
      <h2 class=\"text-center mt-0\">Qui suis-je</h2>
      <hr class=\"divider my-4\">
      <div class=\"row\">
        <div class=\"col-lg-3 col-md-6 text-center\">
          <div class=\"mt-5\">
            <i class=\"fas fa-4x fa-gem text-primary mb-4\"></i>
            <h3 class=\"h4 mb-2\">Géomaticien</h3>
            <p class=\"text-muted mb-0\">De formation géographique, j'ai étudié plus de 3 ans les Systèmes d'Informations Géographiques (SIG) et particulièrement le géomarketing.</p>
          </div>
        </div>
        <div class=\"col-lg-3 col-md-6 text-center\">
          <div class=\"mt-5\">
            <i class=\"fas fa-4x fa-laptop-code text-primary mb-4\"></i>
            <h3 class=\"h4 mb-2\">Développeur</h3>
            <p class=\"text-muted mb-0\">Essayant de coupler mes compétences en géomatique avec le développement, je me spécialise aujourd'hui dans le Back End.</p>
          </div>
        </div>
        <div class=\"col-lg-3 col-md-6 text-center\">
          <div class=\"mt-5\">
            <i class=\"fas fa-4x fa-globe text-primary mb-4\"></i>
            <h3 class=\"h4 mb-2\">Apprenti</h3>
            <p class=\"text-muted mb-0\">Je suis en alternance en développement web dans une société de prestation de service en informatique.</p>
          </div>
        </div>
        <div class=\"col-lg-3 col-md-6 text-center\">
          <div class=\"mt-5\">
            <i class=\"fas fa-4x fa-heart text-primary mb-4\"></i>
            <h3 class=\"h4 mb-2\">Etudiant</h3>
            <p class=\"text-muted mb-0\">Dans ma vie personnelle, bien d'autres passions m'animent et d'autres domaines m'interesse.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section id=\"portfolio\">
    <div class=\"container-fluid p-0\">
      <div class=\"row no-gutters\">
        <div class=\"col-lg-4 col-sm-6\">
          <a class=\"portfolio-box\" href=\"../img/portfolio/fullsize/1.jpg\">
            <img class=\"img-fluid\" src=\"../img/portfolio/thumbnails/1.jpg\" alt=\"\">
            <div class=\"portfolio-box-caption\">
              <div class=\"project-category text-white-50\">
                Category
              </div>
              <div class=\"project-name\">
                In'Vast
              </div>
            </div>
          </a>
        </div>
        <div class=\"col-lg-4 col-sm-6\">
          <a class=\"portfolio-box\" href=\"../img/portfolio/fullsize/2.jpg\">
            <img class=\"img-fluid\" src=\"../img/portfolio/thumbnails/2.jpg\" alt=\"\">
            <div class=\"portfolio-box-caption\">
              <div class=\"project-category text-white-50\">
                Category
              </div>
              <div class=\"project-name\">
                Pelagis
              </div>
            </div>
          </a>
        </div>
        <div class=\"col-lg-4 col-sm-6\">
          <a class=\"portfolio-box\" href=\"../img/portfolio/fullsize/3.jpg\">
            <img class=\"img-fluid\" src=\"../img/portfolio/thumbnails/3.jpg\" alt=\"\">
            <div class=\"portfolio-box-caption\">
              <div class=\"project-category text-white-50\">
                Category
              </div>
              <div class=\"project-name\">
                POPP
              </div>
            </div>
          </a>
        </div>
        <div class=\"col-lg-4 col-sm-6\">
          <a class=\"portfolio-box\" href=\"../img/portfolio/fullsize/4.jpg\">
            <img class=\"img-fluid\" src=\"../img/portfolio/thumbnails/4.jpg\" alt=\"\">
            <div class=\"portfolio-box-caption\">
              <div class=\"project-category text-white-50\">
                Category
              </div>
              <div class=\"project-name\">
                Cartographie
              </div>
            </div>
          </a>
        </div>
        <div class=\"col-lg-4 col-sm-6\">
          <a class=\"portfolio-box\" href=\"../img/portfolio/fullsize/5.jpg\">
            <img class=\"img-fluid\" src=\"../img/portfolio/thumbnails/5.jpg\" alt=\"\">
            <div class=\"portfolio-box-caption\">
              <div class=\"project-category text-white-50\">
                Category
              </div>
              <div class=\"project-name\">
                Express Food
              </div>
            </div>
          </a>
        </div>
        <div class=\"col-lg-4 col-sm-6\">
          <a class=\"portfolio-box\" href=\"../img/portfolio/fullsize/6.jpg\">
            <img class=\"img-fluid\" src=\"../img/portfolio/thumbnails/6.jpg\" alt=\"\">
            <div class=\"portfolio-box-caption p-3\">
              <div class=\"project-category text-white-50\">
                Category
              </div>
              <div class=\"project-name\">
                Pro FIT
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class=\"page-section bg-dark text-white\">
    <div class=\"container text-center\">
      <h2 class=\"mb-4\">Découvrez mon blog</h2>
      <a class=\"btn btn-light btn-xl\" href=\"https://startbootstrap.com/themes/creative/\">Blog Post !</a>
    </div>
  </section>

  <!-- Contact Section -->
    <section class=\"page-section\" id=\"contact\">
        <div class=\"container\">
          <div class=\"row justify-content-center\">
            <div class=\"col-lg-8 text-center\">
              <h2 class=\"mt-0\">Contactez-moi !</h2>
              <hr class=\"divider my-4\">
              <p class=\"text-muted mb-5\">N'hésitez pas à me contacter pour tout renseignement ! </p>
            </div>
          </div>
          <div class=\"row\">
              <div class=\"col-6 offset-3\" text-center>
                  <form name=\"sentMessage\" id=\"contactForm\" novalidate>
                  <div class=\"control-group\">
                    <div class=\"form-group floating-label-form-group controls\">
                      <input type=\"text\" class=\"form-control\" placeholder=\"Nom\" id=\"name\" required data-validation-required-message=\"Entrez votre nom.\">
                      <p class=\"help-block text-danger\"></p>
                    </div>
                  </div>
                  <div class=\"control-group\">
                    <div class=\"form-group floating-label-form-group controls\">
                      <input type=\"email\" class=\"form-control\" placeholder=\"Mail\" id=\"email\" required data-validation-required-message=\"Entrez votre adresse mail\">
                      <p class=\"help-block text-danger\"></p>
                    </div>
                  </div>
                  <div class=\"control-group\">
                    <div class=\"form-group col-xs-12 floating-label-form-group controls\">
                      <input type=\"tel\" class=\"form-control\" placeholder=\"Portable\" id=\"phone\" required data-validation-required-message=\"Entrez votre numéro de téléphone\">
                      <p class=\"help-block text-danger\"></p>
                    </div>
                  </div>
                  <div class=\"control-group\">
                    <div class=\"form-group floating-label-form-group controls\">
                      <textarea rows=\"5\" class=\"form-control\" placeholder=\"Message\" id=\"message\" required data-validation-required-message=\"Entrez un message\"></textarea>
                      <p class=\"help-block text-danger\"></p>
                    </div>
                  </div>
                  <br>
                  <div id=\"success\"></div>
                  <div class=\"form-group text-center\">
                    <button type=\"submit\" class=\"btn btn-primary  btn-xl\" id=\"sendMessageButton\">Envoyer</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
   </section>
</body>
";
    }

    // line 217
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 218
        echo "  <!-- Footer -->
<footer class=\"bg-light\" style=\"padding-top:10px;\">
    <div class=\"container\">
      <div class=\"row\">
        <div class=\"col-lg-8 col-md-10 mx-auto\">
          <ul class=\"list-inline text-center\">
            <li class=\"list-inline-item\">
              <a href=\"#\">
                <span class=\"fa-stack fa-lg\">
                  <i class=\"fas fa-circle fa-stack-2x\"></i>
                  <i class=\"fab fa-twitter fa-stack-1x fa-inverse\"></i>
                </span>
              </a>
            </li>
            <li class=\"list-inline-item\">
              <a href=\"#\">
                <span class=\"fa-stack fa-lg\">
                  <i class=\"fas fa-circle fa-stack-2x\"></i>
                  <i class=\"fab fa-facebook-f fa-stack-1x fa-inverse\"></i>
                </span>
              </a>
            </li>
            <li class=\"list-inline-item\">
              <a href=\"#\">
                <span class=\"fa-stack fa-lg\">
                  <i class=\"fas fa-circle fa-stack-2x\"></i>
                  <i class=\"fab fa-github fa-stack-1x fa-inverse\"></i>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  270 => 218,  266 => 217,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index.html.twig", "C:\\wamp64\\www\\projet5\\templates\\index.html.twig");
    }
}
