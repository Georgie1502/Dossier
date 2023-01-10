Vue.createApp({
    data(){
        return {
            nameUser: '',
            userName:'',
            
            
        };        
    },
    methods: {
       afficherUserName(event){
        this.nameUser= event.target.value
        },   
    },
}).mount('#monApp');