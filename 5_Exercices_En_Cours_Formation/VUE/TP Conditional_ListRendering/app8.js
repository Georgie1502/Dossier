// //! Création d'une instance Vue c'est notre application
Vue.createApp({
    data() {
        return {
        mesProduits: [],
        nomProduit: "",
        masqueListe: true,
        };
    },
        methods: {
            addProduit() {
                this.mesProduits.push(this.nomProduit);
              },
            supprimer(unIndex){
                
                this.mesProduits.splice(unIndex, 1);
                  }
            
            }       
   
}).mount('#app');
    