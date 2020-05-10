<template>
  <div>
    <div v-if="mode === 'index'" class="d-flex flex-wrap justify-center aligin-center" three-line>
      <template v-for="book in books">
        <v-card class="book-image-container text-center" :key="book.id">
          <a :href="book.link_url" target="_blank">
            <img class="book-image" :src="book.image_url">
          </a>
          <p class="h6">{{ book.title }}</p>
        </v-card>
      </template>
    </div>
    <div v-else-if="mode === 'categorySearched'" class="d-flex flex-wrap justify-center aligin-center" three-line>
      <template v-for="book in categoryBooks">
        <v-card class="book-image-container text-center" :key="book.id">
          <a :href="book.link_url" target="_blank">
            <img class="book-image" :src="book.image_url">
          </a>
          <p class="h6">{{ book.volumeInfo.title }}</p>
        </v-card>
      </template>
    </div>
  </div>
</template>

<script>
export default {
  props: ['categoryBooks', "mode"],
  data() {
    return {
      books: [],
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