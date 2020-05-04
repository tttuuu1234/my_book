<template>
  <div>
    <Header
      v-on:searchBooks="books = $event"
      v-on:searchWord="searchWord = $event"
    ></Header>
    <Category></Category>
    <BookLists
      :books = books
      :searchWord = searchWord
    ></BookLists>
  </div>
</template>

<script>
import Header from "./HeaderComponent.vue"
import Category from "./CategoryComponent.vue"
import BookLists from "./BookListsComponent.vue"

export default {
  data() {
    return {
      books: [],
      searchWord: ''
    }
  },
  components: {
    Header,
    Category,
    BookLists
  },
  methods: {
  },
}

</script>