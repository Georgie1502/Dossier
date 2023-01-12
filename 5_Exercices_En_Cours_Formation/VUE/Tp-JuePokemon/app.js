Vue.createApp({
    data(){
        return {
            // viePlayer: 100,
            // vieAdversaire: 100,
            // leWinner: false,
            currentround:0,

        };        
    },
    methods: {
        

        attackPlayer(){
            this.vieAdversaire = this.vieAdversaire - 25;
        },

        attackAdversaire(){
                this.viePlayer = this.viePlayer - 25;
            },

        attackPlayerSpecial(){
            this.vieAdversaire = this.vieAdversaire - 40;
        },

        attackAdversaireSpecial(){
            this.viePlayer = this.viePlayer - 20;
        },

        drawWinner(){
            this.leWinner = !this.leWinner;
        },
        round(round) {
            this.currentround = round;
        }
    },

    computed: {

                isRoundThree() {
                  return this.currentround === 3;
                }
    },

    watch: {
        seSoignerPlayer(){
                if(this.viePlayer < 100){
                    this.viePlayer = this.viePlayer + 30;
                }else if(this.viePlayer >100){
                   this.viePlayer = 100; 
                }
            },
            
    },

}).mount('#monApp');