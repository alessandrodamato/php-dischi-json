const { createApp } = Vue;

createApp({
  
  data(){
    return{
      apiUrl: 'server.php',
      list: []
    }
  },

  methods:{
    getApi(){
      axios.get(this.apiUrl)
      .then(res =>{
        this.list = res.data;
        console.log(this.list);
      })
      .catch(err =>{
        console.log(err);
      }) 
    }
  },

  mounted(){
    this.getApi()
  }

}).mount('#app')