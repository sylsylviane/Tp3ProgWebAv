{{include('layouts/header.php', {title: 'Films'})}}

<header>
    <h1>Table</h1>
</header>
<h2>Journal de bord</h2>
<table class="table">
    <thead>
        <tr>
            <th>Adresse IP</th>
            <th>Nom d'utilisateur</th>
            <th>Page visitée</th>
            <th>Date de création</th>
        </tr>
    </thead>
    <tbody>
        {% for journal in journal_de_bord %}
        <tr>
            <td>{{journal.adresse_ip}}</td>
            <td>{{journal.nom_utilisateur}}</td>
            <td>{{journal.page_visitee}}</td>
            <td>{{journal.created_at}}</td>
        </tr>
        {% endfor %}
    </tbody>
</table>


{{include('layouts/footer.php')}}