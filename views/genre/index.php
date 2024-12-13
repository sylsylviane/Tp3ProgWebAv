{{include('layouts/header.php', {title: 'Genres'})}}

<header>
    <h1>Table</h1>
</header>
<h2>Genres</h2>
<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
        </tr>
    </thead>
    <tbody>
        {% for genre in genres %}
        <tr>
            <td><a href="{{base}}/genre/show?id={{genre.id}}">{{genre.nom}}</a></td>

        </tr>
        {% endfor %}
    </tbody>
</table>
<br><br>

{{include('layouts/footer.php')}}