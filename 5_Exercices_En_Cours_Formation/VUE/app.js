// //! Création d'une instance Vue c'est notre application
// Vue.createApp({
//     //! Dans une fonction data on va retourner un objet qui contiendra les variables de l'application
//     //! Toutes les data seront contenues dans this
//     data() {
//         return {
//         tasks: [],
//         valeurDeInput: '',
//     };
//     },
//     //! Dans cet Object methods, on va écrire nos fonctions
//     methods: {
//         ajouterTask() {
//         this.tasks.push(this.valeurDeInput);
//         this.valeurDeInput = '';
//         },
//     },
//     //! L'application est montée sur la balise HTML qui possède l'id app
//     }).mount('#app');


//     //Création d'une instance Vue c'est notre application
// Vue.createApp({
//     //Dans une fonction data on va retourner un objet qui contiendra les variables de l'application
//         data(){
//             return {
//                 unLivre : "Les mémoires de Steven Seagal",
//                 uneChanson : "Bohemian Rhapsody",
//                 unTableau: ['du text',999],


//             }
//         }
//     // L'application est montée sur la balise HTML qui possède l'id bookListApp
//     }).mount('#bookListApp');


// //! Création d'une instance Vue c'est notre application
 Vue.createApp({
//     //! Dans une fonction data on va retourner un objet qui contiendra les variables de l'application
//     //! Toutes les data seront contenues dans this
   data() {
       
     },
     
//     //! Dans cet Object methods, on va écrire nos fonctions
     methods: {
        superFonction(){
            const billiJean = Math.random();
            if (billiJean>0.5){ 
                return "Chanson";
            }else {return"Chanteur";
        }
      
         }
        }
     
//     //! L'application est montée sur la balise HTML qui possède l'id app
}).mount('#bookListApp');









    