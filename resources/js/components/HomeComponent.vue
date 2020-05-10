<template>
  <div>
    <Header
      @searchBooks="books = $event"
      @searchWord="searchWord = $event"
      @searchResult="mode = $event"
    ></Header>
    <Category
      @categoryMatchBooks="books = $event"
      @mode="mode = $event"
    ></Category>
    <Top
      v-if="mode === 'index'"
      :mode = mode
      :categoryBooks= books
    ></Top>
    <Top
      v-else-if="mode === 'categorySearched'"
      :mode = mode
      :categoryBooks = books
    ></Top>
    <SearchResult
      v-else-if="mode === 'searchResult'"
      :books = books
      :searchWord = searchWord
      @changeMode="mode = $event"
    ></SearchResult>
  </div>
</template>

<script>
import Header from "./HeaderComponent.vue"
import Category from "./CategoryComponent.vue"
import Top from "./TopComponent.vue"
import SearchResult from "./SearchResultComponent"

export default {
  data() {
    return {
      books: [],
      searchWord: '',
      mode: 'index',
    }
  },
  components: {
    Header,
    Category,
    Top,
    SearchResult
  }
}

</script>