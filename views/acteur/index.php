{{include('layouts/header.php', {title: 'Acteurs'})}}

<header>
    <h1>Table</h1>
</header>
<h2>Acteurs</h2>
<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Pays d'origine</th>
            <th>Date de naissance</th>
        </tr>
    </thead>
    <tbody>
        {% for acteur in acteurs %}
        <tr>
            <td><a href="{{base}}/acteur/show?id={{acteur.id}}">{{acteur.nom}}</a></td>
            <td>{{acteur.pays_origine}}</td>
            <td>{{acteur.date_naissance}}</td>
        </tr>
        {% endfor %}
    </tbody>
</table>

{{include('layouts/footer.php')}}