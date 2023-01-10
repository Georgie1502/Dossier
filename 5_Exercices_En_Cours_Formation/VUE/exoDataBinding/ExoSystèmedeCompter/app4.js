Vue.createApp({
    
       data() {
        return{
        leNombre: 0,
        nameUser: "",
          
         },
         
        },
        methods: {
            afficherName(){
                console.log('fonction exécutée')
            if (nameUser=""){ 
                    return "test";
                }else {return"une autre test"
            },
          
            },
             augmenter(){
                this.leNombre ++;  
            },
            reduir(){
                this.leNombre --;
            },
            }
         
    
    }).mount('#monApp');
    
    
    