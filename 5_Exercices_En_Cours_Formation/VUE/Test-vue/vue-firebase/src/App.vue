<template>
  <div id="app">
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <!--! le logo sera une route ici on utilise <router-link></router-link> pour entourer un lien -->
      <router-link to="/"><a class="navbar-brand" href="#">VUE 🔥 Firebase 🔥</a></router-link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <!--! ici on a remplacer la balise du lien <a></a> par router-link mais en gardant la class bootstrap -->
        <router-link to="/articles" class="nav-link active" aria-current="page" href="#">Articles</router-link>
        <router-link to="/add" class="nav-link" href="#">Ajouter</router-link>
        </div>
      </div>
    </div>
  </nav>
  <!--! La vue du router , là ou vont être affiché les composant que l'on appelle via les routes -->
  <router-view/>
  </div>
  
</template>

<script>
export default {
  name: "app"
};
</script>

<style scoped>
.container h2 {
  text-align: center;
  margin: 25px auto;
}
</style>