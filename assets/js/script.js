const { createApp } = Vue;

createApp({
  
  data(){
    return{
      apiUrl: 'server.php',
      isAlbumOpen: false,
      isEditing: false,
      list: [],
      album: {},
      author: {},
      dataToAdd:{
        poster: '',
        title: '',
        author: {
          name: '',
          href: ''
        },
        year: '',
        genre: '',
        bio: '',
        href: ''
      }
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

    toggleAlbum(i){
      this.album = this.list[i];
      this.author = this.album.author;
      this.isAlbumOpen = !this.isAlbumOpen;
      if (this.isAlbumOpen) {
        document.body.classList.remove('overflow-auto');
        document.body.classList.add('overflow-hidden');
      } else {
        document.body.classList.add('overflow-auto');
        document.body.classList.remove('overflow-hidden');
      }
    },

    addAlbum(){

      this.isEditing = false;

      const data = new FormData();
      data.append('newAlbumTitle', this.dataToAdd.title);
      data.append('newAlbumPoster', this.dataToAdd.poster);
      data.append('newAlbumAuthorName', this.dataToAdd.author.name);
      data.append('newAlbumAuthorHref', this.dataToAdd.author.href);
      data.append('newAlbumYear', this.dataToAdd.year);
      data.append('newAlbumGenre', this.dataToAdd.genre);
      data.append('newAlbumBio', this.dataToAdd.bio);
      data.append('newAlbumHref', this.dataToAdd.href);

      axios.post(this.apiUrl, data)
      .then(res => {
        this.list = res.data;
        this.dataToAdd = {
          poster: '',
          title: '',
          author: {
            name: '',
            href: ''
          },
          year: '',
          genre: '',
          bio: '',
          href: ''
        }
      })
    }

  },

  mounted(){
    this.getApi()
  }

}).mount('#app')