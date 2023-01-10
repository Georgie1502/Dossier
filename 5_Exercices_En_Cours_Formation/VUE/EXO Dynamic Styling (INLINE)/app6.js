Vue.createApp({
    data(){
        return {
            selectCard1: false,
            selectCard2: false,
            
        };        
    },
    methods: {  
        selectCard(uneCard){
            if (uneCard === 1){
                return selectCard1 = true
            }else if (uneCard === 2){
                return selectCard2= true
            }
        }

       

    }
}).mount('#monApp');