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

/* session/pdfSession.html.twig */
class __TwigTemplate_5dab48f76b21c1aa468d84732f6f778eb6f63440c67aee9eb787b8a9cf1ebacf extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "session/pdfSession.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "session/pdfSession.html.twig"));

        // line 1
        echo "<h1>Liste des Sessions PDF</h1>

<table class=\"table datatable\">
    <thead>
    <tr>
        <th>Id</th>
        <th>Duree</th>
        <th>Date</th>
        <th>Jeu</th>
        <th>Categorie</th>
        <th>Prix</th>
        <th>Nom</th>
        <th>actions</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["sessions"]) || array_key_exists("sessions", $context) ? $context["sessions"] : (function () { throw new RuntimeError('Variable "sessions" does not exist.', 17, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["session"]) {
            // line 18
            echo "        <tr>
            <td>";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["session"], "id", [], "any", false, false, false, 19), "html", null, true);
            echo "</td>
            <td>";
            // line 20
            ((twig_get_attribute($this->env, $this->source, $context["session"], "duree", [], "any", false, false, false, 20)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["session"], "duree", [], "any", false, false, false, 20), "H:i:s"), "html", null, true))) : (print ("")));
            echo "</td>
            <td>";
            // line 21
            ((twig_get_attribute($this->env, $this->source, $context["session"], "date", [], "any", false, false, false, 21)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["session"], "date", [], "any", false, false, false, 21), "Y-m-d"), "html", null, true))) : (print ("")));
            echo "</td>
            <td>";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["session"], "jeu", [], "any", false, false, false, 22), "html", null, true);
            echo "</td>
            <td>";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["session"], "categorie", [], "any", false, false, false, 23), "html", null, true);
            echo "</td>
            <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["session"], "prix", [], "any", false, false, false, 24), "html", null, true);
            echo "</td>
            <td>";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["session"], "nom", [], "any", false, false, false, 25), "html", null, true);
            echo "</td>

            <td>
                <a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_session_show", ["id" => twig_get_attribute($this->env, $this->source, $context["session"], "id", [], "any", false, false, false, 28)]), "html", null, true);
            echo "\" class=\" btn btn-outline-primary bi bi-eye-fill\"></a>
                <a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_session_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["session"], "id", [], "any", false, false, false, 29)]), "html", null, true);
            echo "\"  class=\" btn btn-outline-primary bi bi-pencil-square\"></a>
            </td>

        </tr>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 34
            echo "        <tr>
            <td colspan=\"8\">no records found</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['session'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "    </tbody>
</table>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "session/pdfSession.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 38,  113 => 34,  103 => 29,  99 => 28,  93 => 25,  89 => 24,  85 => 23,  81 => 22,  77 => 21,  73 => 20,  69 => 19,  66 => 18,  61 => 17,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<h1>Liste des Sessions PDF</h1>

<table class=\"table datatable\">
    <thead>
    <tr>
        <th>Id</th>
        <th>Duree</th>
        <th>Date</th>
        <th>Jeu</th>
        <th>Categorie</th>
        <th>Prix</th>
        <th>Nom</th>
        <th>actions</th>
    </tr>
    </thead>
    <tbody>
    {% for session in sessions %}
        <tr>
            <td>{{ session.id }}</td>
            <td>{{ session.duree ? session.duree|date('H:i:s') : '' }}</td>
            <td>{{ session.date ? session.date|date('Y-m-d') : '' }}</td>
            <td>{{ session.jeu }}</td>
            <td>{{ session.categorie }}</td>
            <td>{{ session.prix }}</td>
            <td>{{ session.nom }}</td>

            <td>
                <a href=\"{{ path('app_session_show', {'id': session.id}) }}\" class=\" btn btn-outline-primary bi bi-eye-fill\"></a>
                <a href=\"{{ path('app_session_edit', {'id': session.id}) }}\"  class=\" btn btn-outline-primary bi bi-pencil-square\"></a>
            </td>

        </tr>
    {% else %}
        <tr>
            <td colspan=\"8\">no records found</td>
        </tr>
    {% endfor %}
    </tbody>
</table>", "session/pdfSession.html.twig", "C:\\Users\\skon1\\Documents\\3A\\Semestre2\\PIDEV\\Sprint 2\\gamybetter\\templates\\session\\pdfSession.html.twig");
    }
}
