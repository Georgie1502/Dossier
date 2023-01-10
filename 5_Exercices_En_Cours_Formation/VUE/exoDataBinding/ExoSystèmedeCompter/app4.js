const app = Vue.createApp({
    data() {
        return { 
        leNombre:0,
        nameUser: ''};
    },
    methods: {
        augmenter(){
        this.leNombre ++;
    },
    reduire(){
        this.leNombre --;
    },
    },
    computed:{
            afficherNameUser() {
        console.log('fonction executée');
        if(this.nameUser ===''){
            return 'test'
        }
        else{
            return 'autre Test';
        }
        },
    }
    });
    app.mount('#monApp');
    
    
    