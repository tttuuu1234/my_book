<template>
  <div class="d-flex flex-wrap justify-center aligin-center" three-line>
    <template v-for="book in books">
      <v-card class="book-image-container text-center" :key="book.id">
        <a :href="book.link_url" target="_blank">
          <img class="book-image" :src="book.image_url">
        </a>
      </v-card>
    </template>
  </div>
</template>

<script>
export default {
  data() {
    return {
      books: []
    }
  },
  created() {
    this.getBooks()
  },
  methods: {
    async getBooks() {
      try {
        const response = await axios.get('/admin/books')
        this.books = response.data
      } catch (error) {
        console.log(error)
      }

    }
  },
}
</script>