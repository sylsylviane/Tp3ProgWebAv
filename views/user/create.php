{{ include('layouts/header.php', {title:'User Create'})}}
<div class="container">
        <form method="post" class="formulaire">
            <h2>Créer un profil</h2>
            <label>Nom
                <input type="text" name="name" value="{{ inputs.name }}">
            </label>
             {% if errors.name is defined %}                   
             <span class="error">{{ errors.name }}</span>
            {% endif %}
             <label>Nom d'utilisateur
                <input type="email" name="username" value="{{ inputs.username }}">
            </label>
            {% if errors.username is defined %}                   
             <span class="error">{{ errors.username }}</span>
            {% endif %}
            <label>Mot de passe
                <input type="password" name="password">
            </label>
            {% if errors.password is defined %}                   
             <span class="error">{{ errors.password }}</span>
             {% endif %}
            <label>Privilege
                <select name="privilege_id">
                    <option value="">Select</option>
                    {% for privilege in privileges %}
                        <option value="{{privilege.id}}" {% if(privilege.id == inputs.privilege_id) %} selected {%endif%}>{{ privilege.privilege}}</option>
                    {% endfor %}privilege_id
                </select>
            </label>
            {% if errors.privilege_id is defined %}                   
             <span class="error">{{ errors.privilege_id }}</span>
            {% endif %}
            <input type="submit" class="btn" value="Sauvegarder">
        </form>
    </div>
{{ include('layouts/footer.php')}}