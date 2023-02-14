<template>
    <div class="container list row">
      <h1>Articles LIST</h1>
      <div class="col-md-6">
        <ul class="list-group">
          <li v-for="(unArticle, index) in articles" :key="index" @click="setActiveArticle(unArticle, index)">
            {{ unArticle.title }}
          </li>
        </ul>
        <button class="m-3 btn btn-sm btn-danger" @click="removeAllArticles()">Tout Suppr.</button>
      </div>
      <div class="col-md-6">
        <div v-if="currentArticle">
          <article-details :article="currentArticle"></article-details>
        </div>
        <div v-else>
          <p>Veuillez selectionner un article.</p>
        </div>
      </div>
    </div>
  </template>
    

<script>


import ArticleDataService from '../services/ArticleDataServices.js';
import ArticleDetails from './ArticleDetails.vue';

export default {
    name:'articles-list',
    component: {ArticleDetails},

    data(){
      return {
      articles: [] ,
      currentArticle: null,
      currentIndex: -1
    };
  },
  methods: {
    onDataChange(items) {
      const _articles = []; 
      
      items.forEach((item) => { 
        const key = item.key;
        const data = item.val();

        _articles.push({ 
          key: key,
          title: data.title,
          description: data.description,
          published: data.published
        });
      });

      this.articles = _articles;
    },

    refreshList(){
        this.currentArticle=null;
        this.currentIndex=-1
    },

    setActiveArticle(article, index){
        this.currentArticle=article;
       this.currentIndex=index;
    },

    removeAllArticles() {
  ArticleDataService.deleteAll()
    .then(() => {
      this.refreshList();
    })
    .catch((e) => {
      console.log(e);
    });
},

  },
  mounted(){
    ArticleDataService.getAll().on(value,this.onDataChange);
  },
  BeforeUnmount(){
    ArticleDataService.getAll().off(value,this.onDataChange);
  }
};
</script>
