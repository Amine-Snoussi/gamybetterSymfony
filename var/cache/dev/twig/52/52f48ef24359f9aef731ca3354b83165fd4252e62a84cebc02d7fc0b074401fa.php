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

/* base-back.html.twig */
class __TwigTemplate_6459dd97a8569cf2686a510daaeace7ac9e2f336871a18cb591411634ad41be5 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'header' => [$this, 'block_header'],
            'sidebar' => [$this, 'block_sidebar'],
            'body' => [$this, 'block_body'],
            'footer' => [$this, 'block_footer'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base-back.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base-back.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">

    <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 8
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 34
        echo "
</head>
<body>
";
        // line 37
        $this->displayBlock('header', $context, $blocks);
        // line 277
        echo "
";
        // line 278
        $this->displayBlock('sidebar', $context, $blocks);
        // line 447
        echo "
<main id=\"main\" class=\"main\">
    ";
        // line 449
        $this->displayBlock('body', $context, $blocks);
        // line 450
        echo "</main><!-- End #main -->
";
        // line 451
        $this->displayBlock('footer', $context, $blocks);
        // line 462
        echo "
";
        // line 463
        $this->displayBlock('javascripts', $context, $blocks);
        // line 517
        echo "</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 7
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome to Gamybetter";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 8
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 9
        echo "        <!-- Favicons -->
        <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/favicon.png"), "html", null, true);
        echo "\" rel=\"icon\">
        <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/apple-touch-icon.png"), "html", null, true);
        echo "\" rel=\"apple-touch-icon\">

        <!-- Google Fonts -->
        <link href=\"https://fonts.gstatic.com\" rel=\"preconnect\">
        <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i\"
              rel=\"stylesheet\">

        <!-- Vendor CSS Files -->
        <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/vendor/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/vendor/bootstrap-icons/bootstrap-icons.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/vendor/boxicons/css/boxicons.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/vendor/quill/quill.snow.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/vendor/quill/quill.bubble.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/vendor/remixicon/remixicon.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/vendor/simple-datatables/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">ù

        <!-- Template Main CSS File -->
        <link href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <!-- Calendar css -->
        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.1.0/main.min.css\">
        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.1.0/main.min.css\">
        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@4.1.0/main.min.css\">
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 37
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        // line 38
        echo "
    <!-- ======= Header ======= -->
    <header id=\"header\" class=\"header fixed-top d-flex align-items-center\">

        <!-- Logo -->
        <div class=\"d-flex align-items-center justify-content-between\">
            <a href=\"";
        // line 44
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_default");
        echo "\" class=\"logo d-flex align-items-center\">
                <img src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/img/logo.png"), "html", null, true);
        echo "\" alt=\"\">
                <span class=\"d-none d-lg-block\">Gamybetter-Admin</span>
            </a>
            <i class=\"bi bi-list toggle-sidebar-btn\"></i>
        </div><!-- End Logo -->

        <!-- Search Bar -->
        <div class=\"search-bar\">
            <form class=\"search-form d-flex align-items-center\" method=\"POST\" action=\"#\">
                <input type=\"text\" name=\"query\" placeholder=\"Search\" title=\"Enter search keyword\">
                <button type=\"submit\" title=\"Search\"><i class=\"bi bi-search\"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <!-- End Icons Navigation -->
        <nav class=\"header-nav ms-auto\">
            <ul class=\"d-flex align-items-center\">

                <!-- Search Icon-->
                <li class=\"nav-item d-block d-lg-none\">
                    <a class=\"nav-link nav-icon search-bar-toggle \" href=\"#\">
                        <i class=\"bi bi-search\"></i>
                    </a>
                </li><!-- End Search Icon-->

                <!-- Notification Dropdown Items -->
                <li class=\"nav-item dropdown\">

                    <!-- End Notification Icon -->
                    <a class=\"nav-link nav-icon\" href=\"#\" data-bs-toggle=\"dropdown\">
                        <i class=\"bi bi-bell\"></i>
                        <span class=\"badge bg-primary badge-number\">4</span>
                    </a><!-- End Notification Icon -->

                    <!-- Notification Dropdown Items -->
                    <ul class=\"dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications\">
                        <li class=\"dropdown-header\">
                            You have 4 new notifications
                            <a href=\"#\"><span class=\"badge rounded-pill bg-primary p-2 ms-2\">View all</span></a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"notification-item\">
                            <i class=\"bi bi-exclamation-circle text-warning\"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"notification-item\">
                            <i class=\"bi bi-x-circle text-danger\"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"notification-item\">
                            <i class=\"bi bi-check-circle text-success\"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"notification-item\">
                            <i class=\"bi bi-info-circle text-primary\"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>
                        <li class=\"dropdown-footer\">
                            <a href=\"#\">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <!-- Messages Nav -->
                <li class=\"nav-item dropdown\">

                    <!-- Messages Icon -->
                    <a class=\"nav-link nav-icon\" href=\"#\" data-bs-toggle=\"dropdown\">
                        <i class=\"bi bi-chat-left-text\"></i>
                        <span class=\"badge bg-success badge-number\">3</span>
                    </a><!-- End Messages Icon -->

                    <!-- Messages Dropdown Items -->
                    <ul class=\"dropdown-menu dropdown-menu-end dropdown-menu-arrow messages\">
                        <li class=\"dropdown-header\">
                            You have 3 new messages
                            <a href=\"#\"><span class=\"badge rounded-pill bg-primary p-2 ms-2\">View all</span></a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"message-item\">
                            <a href=\"#\">
                                <img src=\"/public/assets-back/img/messages-1.jpg\" alt=\"\" class=\"rounded-circle\">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"message-item\">
                            <a href=\"#\">
                                <img src=\"/public/assets-back/img/messages-2.jpg\" alt=\"\" class=\"rounded-circle\">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"message-item\">
                            <a href=\"#\">
                                <img src=\"/public/assets-back/img/messages-3.jpg\" alt=\"\" class=\"rounded-circle\">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"dropdown-footer\">
                            <a href=\"#\">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <!-- Profile Nav -->
                <li class=\"nav-item dropdown pe-3\">
                    <!-- Profile Image Icon -->
                    <a class=\"nav-link nav-profile d-flex align-items-center pe-0\" href=\"#\" data-bs-toggle=\"dropdown\">
                        <img src=\"";
        // line 221
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/img/profile-img.jpg"), "html", null, true);
        echo "\" alt=\"Profile\" class=\"rounded-circle\">
                        <span class=\"d-none d-md-block dropdown-toggle ps-2\">K. Anderson</span>
                    </a><!-- End Profile Image Icon -->

                    <!-- Profile Dropdown Items -->
                    <ul class=\"dropdown-menu dropdown-menu-end dropdown-menu-arrow profile\">
                        <li class=\"dropdown-header\">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>
                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                                <i class=\"bi bi-person\"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>
                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                                <i class=\"bi bi-gear\"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>
                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                                <i class=\"bi bi-question-circle\"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>
                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                                <i class=\"bi bi-box-arrow-right\"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 278
    public function block_sidebar($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sidebar"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sidebar"));

        // line 279
        echo "    <!-- Sidebar-->
    <aside id=\"sidebar\" class=\"sidebar\">

        <ul class=\"sidebar-nav\" id=\"sidebar-nav\">
            <!-- Dashboard Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link \" href=\"";
        // line 285
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_default");
        echo "\">
                    <i class=\"bi bi-grid\"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <!-- Utilisateurs Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" data-bs-target=\"#utilisateurs-nav\" data-bs-toggle=\"collapse\" href=\"#\">
                    <i class=\"bi bi-journal-text\"></i><span>Gestion d'utilisateurs</span><i
                            class=\"bi bi-chevron-down ms-auto\"></i>
                </a>
                <ul id=\"utilisateurs-nav\" class=\"nav-content collapse \" data-bs-parent=\"#sidebar-nav\">
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Nouveau utilisateur</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Consulter liste utilisateurs</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Utilisateurs Nav -->

            <!-- Cours Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" data-bs-target=\"#cours-nav\" data-bs-toggle=\"collapse\" href=\"#\">
                    <i class=\"bi bi-menu-button-wide\"></i><span>Gestion cours</span><i
                            class=\"bi bi-chevron-down ms-auto\"></i>
                </a>
                <ul id=\"cours-nav\" class=\"nav-content collapse \" data-bs-parent=\"#sidebar-nav\">
                    <li>
                        <a href=\"";
        // line 319
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cours.create");
        echo "\">
                            <i class=\"bi bi-circle\"></i><span>Nouveau cours</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"";
        // line 324
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cours.list");
        echo "\">
                            <i class=\"bi bi-circle\"></i><span>Consulter liste cours</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Cours Nav -->

            <!-- Session Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" data-bs-target=\"#session-nav\" data-bs-toggle=\"collapse\" href=\"#\">
                    <i class=\"bi bi-menu-button-wide\"></i><span>Gestion session</span><i
                            class=\"bi bi-chevron-down ms-auto\"></i>
                </a>
                <ul id=\"session-nav\" class=\"nav-content collapse \" data-bs-parent=\"#sidebar-nav\">
                    <li>
                        <a href=\"";
        // line 340
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_session_new");
        echo "\">
                            <i class=\"bi bi-circle\"></i><span>Nouvelle session</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"";
        // line 345
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_session_index");
        echo "\">
                            <i class=\"bi bi-circle\"></i><span>Consulter liste sessions</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Session Nav -->

            <!-- Interactions Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" data-bs-target=\"#interactions-nav\" data-bs-toggle=\"collapse\" href=\"#\">
                    <i class=\"bi bi-layout-text-window-reverse\"></i><span>Gestion d'interactions</span><i
                            class=\"bi bi-chevron-down ms-auto\"></i>
                </a>
                <ul id=\"interactions-nav\" class=\"nav-content collapse \" data-bs-parent=\"#sidebar-nav\">
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Créer un blog</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Consulter forum</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Consulter statistques</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Interactions Nav -->

            <!-- Tournois Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" data-bs-target=\"#tournois-nav\" data-bs-toggle=\"collapse\" href=\"#\">
                    <i class=\"bi bi-bar-chart\"></i><span>Gestion Tournois</span><i
                            class=\"bi bi-chevron-down ms-auto\"></i>
                </a>
                <ul id=\"tournois-nav\" class=\"nav-content collapse \" data-bs-parent=\"#sidebar-nav\">
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Créer tournoi</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Consulter liste tournois</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Consulter liste demandes</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tournois Nav -->

            <!-- Actualité Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" data-bs-target=\"#actualite-nav\" data-bs-toggle=\"collapse\"
                   href=\"#\">
                    <i class=\"bi bi-gem\"></i><span>Gestion actualité</span><i
                            class=\"bi bi-chevron-down ms-auto\"></i>
                </a>
                <ul id=\"actualite-nav\" class=\"nav-content collapse \" data-bs-parent=\"#sidebar-nav\">
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Créer actualité</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Consulter statistiques</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Actualité Nav -->

            <li class=\"nav-heading\">Les coachs</li>

            <!-- Coach Personnel Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" href=\"#\">
                    <i class=\"bi bi-person\"></i>
                    <span>Liste des coachs personnels</span>
                </a>
            </li><!-- End Coach Personnel Nav -->

            <!-- Coach d'équipe Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" href=\"#\">
                    <i class=\"bi bi-question-circle\"></i>
                    <span>Liste des coachs d'équipe</span>
                </a>
            </li><!-- End Coach d'équipe Nav -->
        </ul>
    </aside><!-- End Sidebar-->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 449
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 451
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        // line 452
        echo "    <!-- ======= Footer ======= -->
    <footer id=\"footer\" class=\"footer\" style=\"margin-top: 30px\">
        <div class=\"copyright\">
            &copy; Copyright <strong><span>Gamybetter-team</span></strong>. All Rights Reserved
        </div>
        <div class=\"credits\">
            Realised by <a href=\"https://bootstrapmade.com/\">Gamybetter-team</a>
        </div>
    </footer><!-- End Footer -->
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 463
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 464
        echo "
    <!-- Vendor JS Files -->
    <script src=\"";
        // line 466
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/vendor/apexcharts/apexcharts.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 467
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/vendor/bootstrap/js/bootstrap.bundle.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 468
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/vendor/chart.js/chart.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 469
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/vendor/echarts/echarts.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 470
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/vendor/quill/quill.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 471
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/vendor/simple-datatables/simple-datatables.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 472
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/vendor/tinymce/tinymce.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 473
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/vendor/php-email-form/validate.js"), "html", null, true);
        echo "\"></script>

    <!-- Template Main JS File -->
    <script src=\"";
        // line 476
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets-back/js/main.js"), "html", null, true);
        echo "\"></script>

    <!-- Calendar JS -->
    <script src=\"https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.1.0/main.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@4.1.0/main.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.1.0/main.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@4.1.0/main.min.js\"></script>

    <script type=\"text/javascript\">
        document.addEventListener('DOMContentLoaded', () => {
            var calendarEl = document.getElementById('calendar-holder');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                defaultView: 'dayGridMonth',
                editable: true,
                eventSources: [
                    {
                        url: \"";
        // line 493
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("fc_load_events");
        echo "\",
                        method: \"POST\",
                        extraParams: {
                            filters: JSON.stringify({})
                        },
                        failure: () => {
                            // alert(\"There was an error while fetching FullCalendar!\");
                        },
                    },
                ],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay',
                },
                plugins: [ 'interaction', 'dayGrid', 'timeGrid' ], // https://fullcalendar.io/docs/plugin-index
                timeZone: 'UTC',
            });
            calendar.render();
        });
    </script>
    <!-- end Calendar JS -->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "base-back.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  781 => 493,  761 => 476,  755 => 473,  751 => 472,  747 => 471,  743 => 470,  739 => 469,  735 => 468,  731 => 467,  727 => 466,  723 => 464,  713 => 463,  694 => 452,  684 => 451,  666 => 449,  554 => 345,  546 => 340,  527 => 324,  519 => 319,  482 => 285,  474 => 279,  464 => 278,  398 => 221,  219 => 45,  215 => 44,  207 => 38,  197 => 37,  181 => 28,  175 => 25,  171 => 24,  167 => 23,  163 => 22,  159 => 21,  155 => 20,  151 => 19,  140 => 11,  136 => 10,  133 => 9,  123 => 8,  104 => 7,  92 => 517,  90 => 463,  87 => 462,  85 => 451,  82 => 450,  80 => 449,  76 => 447,  74 => 278,  71 => 277,  69 => 37,  64 => 34,  62 => 8,  58 => 7,  50 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">

    <title>{% block title %}Welcome to Gamybetter{% endblock %}</title>
    {% block stylesheets %}
        <!-- Favicons -->
        <link href=\"{{ asset('img/favicon.png') }}\" rel=\"icon\">
        <link href=\"{{ asset('img/apple-touch-icon.png') }}\" rel=\"apple-touch-icon\">

        <!-- Google Fonts -->
        <link href=\"https://fonts.gstatic.com\" rel=\"preconnect\">
        <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i\"
              rel=\"stylesheet\">

        <!-- Vendor CSS Files -->
        <link href=\"{{ asset('assets-back/vendor/bootstrap/css/bootstrap.min.css') }}\" rel=\"stylesheet\">
        <link href=\"{{ asset('assets-back/vendor/bootstrap-icons/bootstrap-icons.css') }}\" rel=\"stylesheet\">
        <link href=\"{{ asset('assets-back/vendor/boxicons/css/boxicons.min.css') }}\" rel=\"stylesheet\">
        <link href=\"{{ asset('assets-back/vendor/quill/quill.snow.css') }}\" rel=\"stylesheet\">
        <link href=\"{{ asset('assets-back/vendor/quill/quill.bubble.css') }}\" rel=\"stylesheet\">
        <link href=\"{{ asset('assets-back/vendor/remixicon/remixicon.css') }}\" rel=\"stylesheet\">
        <link href=\"{{ asset('assets-back/vendor/simple-datatables/style.css') }}\" rel=\"stylesheet\">ù

        <!-- Template Main CSS File -->
        <link href=\"{{ asset('assets-back/css/style.css') }}\" rel=\"stylesheet\">
        <!-- Calendar css -->
        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.1.0/main.min.css\">
        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.1.0/main.min.css\">
        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@4.1.0/main.min.css\">
    {% endblock %}

</head>
<body>
{% block header %}

    <!-- ======= Header ======= -->
    <header id=\"header\" class=\"header fixed-top d-flex align-items-center\">

        <!-- Logo -->
        <div class=\"d-flex align-items-center justify-content-between\">
            <a href=\"{{ path('app_default') }}\" class=\"logo d-flex align-items-center\">
                <img src=\"{{ asset('assets-back/img/logo.png') }}\" alt=\"\">
                <span class=\"d-none d-lg-block\">Gamybetter-Admin</span>
            </a>
            <i class=\"bi bi-list toggle-sidebar-btn\"></i>
        </div><!-- End Logo -->

        <!-- Search Bar -->
        <div class=\"search-bar\">
            <form class=\"search-form d-flex align-items-center\" method=\"POST\" action=\"#\">
                <input type=\"text\" name=\"query\" placeholder=\"Search\" title=\"Enter search keyword\">
                <button type=\"submit\" title=\"Search\"><i class=\"bi bi-search\"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <!-- End Icons Navigation -->
        <nav class=\"header-nav ms-auto\">
            <ul class=\"d-flex align-items-center\">

                <!-- Search Icon-->
                <li class=\"nav-item d-block d-lg-none\">
                    <a class=\"nav-link nav-icon search-bar-toggle \" href=\"#\">
                        <i class=\"bi bi-search\"></i>
                    </a>
                </li><!-- End Search Icon-->

                <!-- Notification Dropdown Items -->
                <li class=\"nav-item dropdown\">

                    <!-- End Notification Icon -->
                    <a class=\"nav-link nav-icon\" href=\"#\" data-bs-toggle=\"dropdown\">
                        <i class=\"bi bi-bell\"></i>
                        <span class=\"badge bg-primary badge-number\">4</span>
                    </a><!-- End Notification Icon -->

                    <!-- Notification Dropdown Items -->
                    <ul class=\"dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications\">
                        <li class=\"dropdown-header\">
                            You have 4 new notifications
                            <a href=\"#\"><span class=\"badge rounded-pill bg-primary p-2 ms-2\">View all</span></a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"notification-item\">
                            <i class=\"bi bi-exclamation-circle text-warning\"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"notification-item\">
                            <i class=\"bi bi-x-circle text-danger\"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"notification-item\">
                            <i class=\"bi bi-check-circle text-success\"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"notification-item\">
                            <i class=\"bi bi-info-circle text-primary\"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>
                        <li class=\"dropdown-footer\">
                            <a href=\"#\">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <!-- Messages Nav -->
                <li class=\"nav-item dropdown\">

                    <!-- Messages Icon -->
                    <a class=\"nav-link nav-icon\" href=\"#\" data-bs-toggle=\"dropdown\">
                        <i class=\"bi bi-chat-left-text\"></i>
                        <span class=\"badge bg-success badge-number\">3</span>
                    </a><!-- End Messages Icon -->

                    <!-- Messages Dropdown Items -->
                    <ul class=\"dropdown-menu dropdown-menu-end dropdown-menu-arrow messages\">
                        <li class=\"dropdown-header\">
                            You have 3 new messages
                            <a href=\"#\"><span class=\"badge rounded-pill bg-primary p-2 ms-2\">View all</span></a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"message-item\">
                            <a href=\"#\">
                                <img src=\"/public/assets-back/img/messages-1.jpg\" alt=\"\" class=\"rounded-circle\">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"message-item\">
                            <a href=\"#\">
                                <img src=\"/public/assets-back/img/messages-2.jpg\" alt=\"\" class=\"rounded-circle\">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"message-item\">
                            <a href=\"#\">
                                <img src=\"/public/assets-back/img/messages-3.jpg\" alt=\"\" class=\"rounded-circle\">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>

                        <li class=\"dropdown-footer\">
                            <a href=\"#\">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <!-- Profile Nav -->
                <li class=\"nav-item dropdown pe-3\">
                    <!-- Profile Image Icon -->
                    <a class=\"nav-link nav-profile d-flex align-items-center pe-0\" href=\"#\" data-bs-toggle=\"dropdown\">
                        <img src=\"{{ asset('assets-back/img/profile-img.jpg') }}\" alt=\"Profile\" class=\"rounded-circle\">
                        <span class=\"d-none d-md-block dropdown-toggle ps-2\">K. Anderson</span>
                    </a><!-- End Profile Image Icon -->

                    <!-- Profile Dropdown Items -->
                    <ul class=\"dropdown-menu dropdown-menu-end dropdown-menu-arrow profile\">
                        <li class=\"dropdown-header\">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>
                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                                <i class=\"bi bi-person\"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>
                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                                <i class=\"bi bi-gear\"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>
                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                                <i class=\"bi bi-question-circle\"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class=\"dropdown-divider\">
                        </li>
                        <li>
                            <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                                <i class=\"bi bi-box-arrow-right\"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

{% endblock %}

{% block sidebar %}
    <!-- Sidebar-->
    <aside id=\"sidebar\" class=\"sidebar\">

        <ul class=\"sidebar-nav\" id=\"sidebar-nav\">
            <!-- Dashboard Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link \" href=\"{{ path('app_default') }}\">
                    <i class=\"bi bi-grid\"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <!-- Utilisateurs Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" data-bs-target=\"#utilisateurs-nav\" data-bs-toggle=\"collapse\" href=\"#\">
                    <i class=\"bi bi-journal-text\"></i><span>Gestion d'utilisateurs</span><i
                            class=\"bi bi-chevron-down ms-auto\"></i>
                </a>
                <ul id=\"utilisateurs-nav\" class=\"nav-content collapse \" data-bs-parent=\"#sidebar-nav\">
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Nouveau utilisateur</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Consulter liste utilisateurs</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Utilisateurs Nav -->

            <!-- Cours Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" data-bs-target=\"#cours-nav\" data-bs-toggle=\"collapse\" href=\"#\">
                    <i class=\"bi bi-menu-button-wide\"></i><span>Gestion cours</span><i
                            class=\"bi bi-chevron-down ms-auto\"></i>
                </a>
                <ul id=\"cours-nav\" class=\"nav-content collapse \" data-bs-parent=\"#sidebar-nav\">
                    <li>
                        <a href=\"{{ path('cours.create') }}\">
                            <i class=\"bi bi-circle\"></i><span>Nouveau cours</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"{{ path('cours.list') }}\">
                            <i class=\"bi bi-circle\"></i><span>Consulter liste cours</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Cours Nav -->

            <!-- Session Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" data-bs-target=\"#session-nav\" data-bs-toggle=\"collapse\" href=\"#\">
                    <i class=\"bi bi-menu-button-wide\"></i><span>Gestion session</span><i
                            class=\"bi bi-chevron-down ms-auto\"></i>
                </a>
                <ul id=\"session-nav\" class=\"nav-content collapse \" data-bs-parent=\"#sidebar-nav\">
                    <li>
                        <a href=\"{{ path('app_session_new') }}\">
                            <i class=\"bi bi-circle\"></i><span>Nouvelle session</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"{{ path('app_session_index') }}\">
                            <i class=\"bi bi-circle\"></i><span>Consulter liste sessions</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Session Nav -->

            <!-- Interactions Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" data-bs-target=\"#interactions-nav\" data-bs-toggle=\"collapse\" href=\"#\">
                    <i class=\"bi bi-layout-text-window-reverse\"></i><span>Gestion d'interactions</span><i
                            class=\"bi bi-chevron-down ms-auto\"></i>
                </a>
                <ul id=\"interactions-nav\" class=\"nav-content collapse \" data-bs-parent=\"#sidebar-nav\">
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Créer un blog</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Consulter forum</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Consulter statistques</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Interactions Nav -->

            <!-- Tournois Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" data-bs-target=\"#tournois-nav\" data-bs-toggle=\"collapse\" href=\"#\">
                    <i class=\"bi bi-bar-chart\"></i><span>Gestion Tournois</span><i
                            class=\"bi bi-chevron-down ms-auto\"></i>
                </a>
                <ul id=\"tournois-nav\" class=\"nav-content collapse \" data-bs-parent=\"#sidebar-nav\">
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Créer tournoi</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Consulter liste tournois</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Consulter liste demandes</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tournois Nav -->

            <!-- Actualité Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" data-bs-target=\"#actualite-nav\" data-bs-toggle=\"collapse\"
                   href=\"#\">
                    <i class=\"bi bi-gem\"></i><span>Gestion actualité</span><i
                            class=\"bi bi-chevron-down ms-auto\"></i>
                </a>
                <ul id=\"actualite-nav\" class=\"nav-content collapse \" data-bs-parent=\"#sidebar-nav\">
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Créer actualité</span>
                        </a>
                    </li>
                    <li>
                        <a href=\"#\">
                            <i class=\"bi bi-circle\"></i><span>Consulter statistiques</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Actualité Nav -->

            <li class=\"nav-heading\">Les coachs</li>

            <!-- Coach Personnel Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" href=\"#\">
                    <i class=\"bi bi-person\"></i>
                    <span>Liste des coachs personnels</span>
                </a>
            </li><!-- End Coach Personnel Nav -->

            <!-- Coach d'équipe Nav -->
            <li class=\"nav-item\">
                <a class=\"nav-link collapsed\" href=\"#\">
                    <i class=\"bi bi-question-circle\"></i>
                    <span>Liste des coachs d'équipe</span>
                </a>
            </li><!-- End Coach d'équipe Nav -->
        </ul>
    </aside><!-- End Sidebar-->

{% endblock %}

<main id=\"main\" class=\"main\">
    {% block body %}{% endblock %}
</main><!-- End #main -->
{% block footer %}
    <!-- ======= Footer ======= -->
    <footer id=\"footer\" class=\"footer\" style=\"margin-top: 30px\">
        <div class=\"copyright\">
            &copy; Copyright <strong><span>Gamybetter-team</span></strong>. All Rights Reserved
        </div>
        <div class=\"credits\">
            Realised by <a href=\"https://bootstrapmade.com/\">Gamybetter-team</a>
        </div>
    </footer><!-- End Footer -->
{% endblock %}

{% block javascripts %}

    <!-- Vendor JS Files -->
    <script src=\"{{ asset('assets-back/vendor/apexcharts/apexcharts.min.js') }}\"></script>
    <script src=\"{{ asset('assets-back/vendor/bootstrap/js/bootstrap.bundle.min.js') }}\"></script>
    <script src=\"{{ asset('assets-back/vendor/chart.js/chart.min.js') }}\"></script>
    <script src=\"{{ asset('assets-back/vendor/echarts/echarts.min.js') }}\"></script>
    <script src=\"{{ asset('assets-back/vendor/quill/quill.min.js') }}\"></script>
    <script src=\"{{ asset('assets-back/vendor/simple-datatables/simple-datatables.js') }}\"></script>
    <script src=\"{{ asset('assets-back/vendor/tinymce/tinymce.min.js') }}\"></script>
    <script src=\"{{ asset('assets-back/vendor/php-email-form/validate.js') }}\"></script>

    <!-- Template Main JS File -->
    <script src=\"{{ asset('assets-back/js/main.js') }}\"></script>

    <!-- Calendar JS -->
    <script src=\"https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.1.0/main.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@4.1.0/main.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.1.0/main.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@4.1.0/main.min.js\"></script>

    <script type=\"text/javascript\">
        document.addEventListener('DOMContentLoaded', () => {
            var calendarEl = document.getElementById('calendar-holder');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                defaultView: 'dayGridMonth',
                editable: true,
                eventSources: [
                    {
                        url: \"{{ path('fc_load_events') }}\",
                        method: \"POST\",
                        extraParams: {
                            filters: JSON.stringify({})
                        },
                        failure: () => {
                            // alert(\"There was an error while fetching FullCalendar!\");
                        },
                    },
                ],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay',
                },
                plugins: [ 'interaction', 'dayGrid', 'timeGrid' ], // https://fullcalendar.io/docs/plugin-index
                timeZone: 'UTC',
            });
            calendar.render();
        });
    </script>
    <!-- end Calendar JS -->

{% endblock %}
</body>
</html>
", "base-back.html.twig", "C:\\Users\\skon1\\Documents\\3A\\Semestre2\\PIDEV\\Sprint 2\\gamybetter\\templates\\base-back.html.twig");
    }
}
