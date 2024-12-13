{{include('layouts/header.php', {title: 'Film Create'})}}

<div class="container">
    <form method="post" class="formulaire">
        <h2>Créer un film</h2>

        <label>Titre
            <input type="text" name="titre" value="{{ inputs.titre }}">
        </label>
        {% if errors.titre is defined %}
        <span class="error">{{ errors.titre }}</span>
        {% endif %}

        <label>Synopsis
            <textarea name="synopsis" rows="20">{{ inputs.synopsis }}</textarea>
        </label>
        {% if errors.synopsis is defined %}
        <span class="error">{{ errors.synopsis }}</span>
        {% endif %}

        <label>Année de parution
            <input type="date" name="date_sortie" value="{{ inputs.date_sortie }}">
        </label>
        {% if errors.date_sortie is defined %}
        <span class="error">{{ errors.date_sortie }}</span>
        {% endif %}

        <label>Durée
            <input type="text" name="duree" value="{{ inputs.duree }}">
        </label>
        {% if errors.duree is defined %}
        <span class="error">{{ errors.duree }}</span>
        {% endif %}

        <label>Genre
            <select name="genre_id">
                <option value="">Select</option>
                {% for genre in genres %}
                <option value="{{genre.id}}" {% if(genre.id == inputs.genre_id) %} selected {%endif%}>{{ genre.nom }}</option>
                {% endfor %}
            </select>
        </label>
        {% if errors.genre_id is defined %}
        <span class="error">{{ errors.genre_id }}</span>
        {% endif %}

        <input type="submit" class="btn" value="Sauvegarder">
    </form>
</div>

{{include('layouts/footer.php')}}