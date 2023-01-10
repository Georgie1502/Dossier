Vue.createApp({
    data(){
        return {
            mot: '',
            copie:''
            
        };        
    },
    methods: {
       capterEventInput(event){
        this.mot = event.target.value
        },
        alerte() {
            window.alert("¡Alerta generale!");
        },
        capterEventInputEsc(event){
            this.copie = event.target.value
        },
        
    }
}).mount('body');
