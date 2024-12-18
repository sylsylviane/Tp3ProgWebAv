{{ include('layouts/header.php', {title:'Login'})}}
<div class="container">
        <form method="post" class="formulaire">
            <h2>Login</h2>
             <label>Username
                <input type="email" name="username" value="{{ inputs.username }}">
            </label>
            {% if errors.username is defined %}                   
             <span class="error">{{ errors.username }}</span>
            {% endif %}
            <label>Password
                <input type="password" name="password">
            </label>
            {% if errors.password is defined %}                   
             <span class="error">{{ errors.password }}</span>
             {% endif %}
            <input type="submit" class="btn" value="Login">
        </form>
    </div>
{{ include('layouts/footer.php')}}