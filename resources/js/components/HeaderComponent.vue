<template>
  <header class="header">
    <h1 class="header-title">MyBooks</h1>
    <form>
      <div class="header-search">
        <div class="header-search-box">
          <input
            type="text"
            class="header-search-text"
            v-model="searchWord"
          >
        </div>
        <button type="submit" @click.prevent="searchBooks()">
          <i class="fas fa-search header-search-icon"></i>
        </button>
      </div>
    </form>
  </header>
</template>

<script>
export default {
  data() {
    return {
      searchWord: '',
      books: []
    }
  },
  methods: {
    async searchBooks() {
      try {
        const response = await axios.get('/admin/book', {
            params:{
              searchWord: this.searchWord
            }
          }
        );
        this.books = response.data
        this.$emit("searchBooks", this.books)
        this.$emit("searchWord", this.searchWord)
      } catch (error) {
        console.log(error)
      }
    }
  },
}
</script>