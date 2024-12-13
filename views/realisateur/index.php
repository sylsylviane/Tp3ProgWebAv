{{include('layouts/header.php', {title: 'Realisateur'})}}

<header>
    <h1>Table</h1>
</header>
<h2>Realisateurs</h2>
<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Pays d'origine</th>
            <th>Date de naissance</th>
        </tr>
    </thead>
    <tbody>
        {% for realisateur in realisateurs %}
        <tr>
            <td><a href="{{base}}/realisateur/show?id={{realisateur.id}}">{{realisateur.nom}}</a></td>
            <td>{{realisateur.pays_origine}}</td>
            <td>{{realisateur.date_naissance}}</td>
        </tr>
        {% endfor %}
    </tbody>
</table>
<br><br>

{{include('layouts/footer.php')}}