{{include('layouts/header.php', {title: 'Films'})}}

<div class="container">
    <h1>Film</h1>
    <p><strong>Titre: </strong>{{ film.titre }}</p>
    <p><strong>Genre: </strong>
        {% for genre in genres %}
        {% if genre.id == film.genre_id %}
        {{genre.nom}}
        {% endif %}
        {% endfor %}
    </p>
    <p><strong>Synopsis: </strong>{{ film.synopsis }}</p>
    <p><strong>Date de sortie: </strong>{{ film.date_sortie }}</p>
    <p><strong>Durée: </strong>{{ film.duree }}</p>
    <div class="flex">
        <a href="{{ base }}/film/edit?id={{film.id}}" class="btn block">Modifier</a>
        <form action="{{ base }}/film/delete" method="post">
            <input type="hidden" name="id" value="{{ film.id }}">
            <button type="submit" class="btn btn_red">Supprimer</button>
            <a href="{{base}}/film" class="btn retour">Retour</a>
        </form>
    </div>
</div>

{{include('layouts/footer.php')}}