<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="{{asset}}css/main.css">

</head>

<body>
    <nav class="nav-top">
        <a href="{{base}}/home">Cinéma Paradiso</a>
        <div>
            <form action="#">
                <label aria-label="search">
                    <input type="search" placeholder="Search" name="search">
                </label>
            </form>
            {% if session.privilege_id == 1 %}
            <a href="{{base}}/journal">Journal de bord</a>
            {% endif %}
            {% if guest %}
            <a href="{{base}}/login">Connexion</a>
            {% else %}
            <a href="{{base}}/logout">Déconnexion</a>
            {% endif %}
        </div>

    </nav>
    <div id="region-container">
        <nav class="side-nav">
            <ul>
                <li><a href="{{base}}/home">Tableau de bord</a></li>

                <li class="menu-deroulant"><a href="#">Tables ▿</a>
                    <ul>
                        <li><a href="{{base}}/film">Films</a></li>
                        <li><a href="{{base}}/genre">Genres</a></li>
                        <li><a href="{{base}}/acteur">Acteurs</a></li>
                        <li><a href="{{base}}/realisateur">Réalisateurs</a></li>
                    </ul>
                </li>
            </ul>
            <ul>
                {% if session.privilege_id == 1 %}
                <li><a href="{{base}}/user/create">Créer un profil</a></li>
                {% endif %}
                {% if guest %}
                <li><a href="">Connexion</a></li>
                {% else %}
                <li><a href="">Déconnexion</a></li>
                {% endif %}
            </ul>
        </nav>
        <main>
            {% if guest is empty %}
            <h1>Bonjour {{ session.user_name }}!</h1>
            {% endif %}