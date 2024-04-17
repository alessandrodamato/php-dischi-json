const { createApp } = Vue;

createApp({
  
  data(){
    return{
      apiUrl: 'server.php',
      isAlbumOpen: false,
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
    },

    toggleAlbum(){
      this.isAlbumOpen = !this.isAlbumOpen;
      if (this.isAlbumOpen) {
        document.body.classList.remove('overflow-auto');
        document.body.classList.add('overflow-hidden');
      } else {
        document.body.classList.add('overflow-auto');
        document.body.classList.remove('overflow-hidden');
      }
    }
  },

  mounted(){
    this.getApi()
  }

}).mount('#app')