const app = Vue.createApp({
    data() {
        return {
        selectCard1: false,
        selectCard2: false,
        
     
    
        };
    },
    methods: {
        selectionCard(uneCard) {
        if (uneCard === 1) {
            // this.selectCard1=true;
            this.selectCard1 = !this.selectCard1;
        }
        if (uneCard === 2) {
            // this.selectCard2=true;
            this.selectCard2 = !this.selectCard2;
        }
        },
    },
    });
    app.mount('#monApp');