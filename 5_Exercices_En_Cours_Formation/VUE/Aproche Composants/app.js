const app = Vue.createApp({
data() {
    return {
    detailsVisibles: false,
    lesAmis: [
        {
            id: 'lasticot',
            name: 'COCO L ASTICOT',
            phone: '01234 5678 991',
            email: 'coco@lasticot.com',
        },
        {
            id: 'janine',
            name: 'Janine DeLavega',
            phone: '09876 543 221',
            email: 'janine@delavega.com',
        },
    ],
    };
},
methods: {
    toggleDetails() {
    this.detailsVisibles = !this.detailsVisibles;
    }
}
});
app.mount('#app');

