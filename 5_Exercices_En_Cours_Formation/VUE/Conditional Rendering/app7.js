// //! Création d'une instance Vue c'est notre application
Vue.createApp({
    data() {
        return {
        mesFilms: [],
        nomFilms: "",
        };
    },
        methods: {
            addFilm() {
                this.mesFilms.push(this.nomFilms);
              },
            supprimer(unIndex){
                
                this.mesFilms.splice(unIndex, 1);
                  }
            }       
   
}).mount('#app');
    
    