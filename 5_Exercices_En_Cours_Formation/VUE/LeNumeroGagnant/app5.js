const app = Vue.createApp({
    data() {
        return { 
        leNombre:0,
        };    
    },
    methods: {
        plusCinq(num){
            this.leNombre += num;
    },
   
   },
    computed:{
        indice() {
       if(this.leNombre ==7){
            return 'Bingo'
       }
        else
            return 'Essaie encore!'
        }
           
     },
     watch:{
        leNombre(){
            setTimeout(() => {
                this.leNombre=0;
            }, 5000);
        }
     }
    });
    app.mount('#monApp');