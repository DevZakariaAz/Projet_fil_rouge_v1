# Rapport de Projet fil rouge : Premier Pas vers un Développement Web Efficace





---
{% assign pages = site.pages | sort: "order" %}
{% for page in pages %}
 {% if page.chapitre %}
    {{- page.content | markdownify -}}
  {% endif %}
{% endfor %}