<template>
  <header class="header">
    <h1 class="header-title"> MyBooks</h1>
    <form>
      <div class="header-search">
        <div class="header-search-box">
          <input
            type="text"
            class="header-search-text"
            v-model="searchWord"
          >
        </div>
        <v-btn class="text-white" color="#64B5F6" @click="searchBooks()">検索</v-btn>
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
        this.$emit("searchResult", "searchResult")
      } catch (error) {
        console.log(error)
      }
    }
  },
}
</script>