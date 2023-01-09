 Vue.createApp({
//     //Dans une fonction data on va retourner un objet qui contiendra les variables de l'application
      data(){
          return {
                unNom : "Mario",
                age : 45,
                img : "./face.jpg"
              
            }
        },
        methods: {
            newAge(){
                return this.age + 10;   
            }, 
            Fetiche(){
                const nomF = Math.random();
                if (nomF < 0.5){
                    return "Camilo"
                }else{
                    return"Ruben"
                }

            }
          
             }
            }
//     // L'application est montée sur la balise HTML qui possède l'id bookListApp
     ).mount('#app');

// CORRECTION
    //  Vue.createApp({
    //     data() {
    //         return {
    //         nameUser: 'Dr.Mario',
    //         ageUser: 45,
    //         imageUser:'https://s3.amazonaws.com/medium.cosplay.com/77883/2111288.jpg',
    //         };
    //     },
    //     methods: {
    //         augmenterAge() {
    //         return this.ageUser + 10;
    //         },
    //         nombreRandom() {
    //         return Math.random();
    //         },
    //     },
    //     }).mount('#bookListApp');