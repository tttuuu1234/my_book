<template>
  <div class="d-flex flex-wrap justify-center aligin-center" three-line>
    <template v-for="book in books.items">
      <v-card class="book-image-container text-center" :key="book.id">
        <div>
          <input type="checkbox" :value="book" v-model="bookInfo">
        </div>
        <a :href="book.volumeInfo.infoLink" target="_blank">
          <img class="book-image" :src="book.volumeInfo.imageLinks.thumbnail">
        </a>
      </v-card>
    </template>
  </div>
</template>

<script>
export default {
  props: [
    'books'
  ],
  data() {
    return {
      bookInfo: [],
    }
  },
  watch: {
    bookInfo() {
      this.sendBookInfo()
    }
  },
  methods: {
    sendBookInfo() {
      this.$emit("bookInfo", this.bookInfo)
    }
  },
}
</script>