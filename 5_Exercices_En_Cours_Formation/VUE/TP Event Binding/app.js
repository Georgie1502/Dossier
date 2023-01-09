Vue.createApp({
    data(){
        return {
            leNombre : 0
        };        
    },
    methods: {
        incre(){
            this.leNombre ++;  
        },
        desin(){
            this.leNombre --;
        }

    }
}).mount('#monApp');