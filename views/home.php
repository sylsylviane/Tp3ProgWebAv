{{ include('layouts/header.php', {title: 'Dashboard'}) }}

<h1>Tableau de bord</h1>
<h2>Nouveaux Films</h2>
<table class="table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Synopsis</th>
            <th>Date de sortie</th>
            <th>Durée</th>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
        {% for film in films %}
        <tr>
            <td><a href="{{base}}/film/show?id={{film.id}}">{{film.titre}}</a></td>
            <td>{{film.synopsis}}</td>
            <td>{{film.date_sortie}}</td>
            <td>{{film.duree}}</td>
            <td>
                {% for genre in genres %}
                {% if genre.id == film.genre_id %}
                {{genre.nom}}
                {% endif %}
                {% endfor %}
            </td>
        </tr>
        {% endfor %}
    </tbody>
</table>
<br><br>
<a href="{{base}}/film" class="btn">Voir tous les films</a>
</section>

{{ include('layouts/footer.php') }}