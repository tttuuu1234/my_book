<template>
  <form>
    <v-select
      class="book-category-select"
      :options="categories"
      v-model="category"
      label="name"
      placeholder="カテゴリーの選択をしてください"
    ></v-select>
    <BookLists
      v-if="dataBooks === ''" :books = books
      @bookInfo="bookInfos = $event"
    ></BookLists>
    <BookLists
      v-else-if="dataBooks != ''" :books = dataBooks
      @bookInfo="bookInfos = $event"
    ></BookLists>
    <paginate
      :page-count="getPageCpunt"
      :page-range="3"
      :margin-pages="2"
      :prev-text="'<'"
      :next-text="'>'"
      :container-class="'pagination'"
      :page-class="'page-item'"
      :page-link-class="'page-link'"
      :prev-class="'page-item'"
      :prev-link-class="'page-link'"
      :next-class="'page-item'"
      :next-link-class="'page-link'"
      class="justify-content-center"
      :click-handler="getPageItem"
    ></paginate>
    <div class="text-right">
      <v-btn class="text-white" color="#64B5F6" @click="registerBooks">登録</v-btn>
    </div>
  </form>
</template>

<script>
import BookLists from './BookListsComponent.vue'

export default {
  props: [
    "books",
    "searchWord"
  ],
  data() {
    return {
      category: "",
      categories: [],
      parPage: 30,
      currentPage: 1,
      dataBooks: "",
      bookInfos: []
    }
  },
  components: {
    BookLists
  },
  created() {
    this.getSelectCategories()
  },
  computed: {
    getPageCpunt() {
      return Math.ceil(this.books.totalItems / this.parPage)
    }
  },
  methods: {
    async getSelectCategories() {
      try {
        const response =  await axios.get('/admin/categoryList')
        this.categories = response.data
      } catch (error) {
        console.log(error)
      }
    },
    async registerBooks() {
      try {
        const response = await axios.post('/admin/book', {
          params: {
            category: this.category,
            bookInfos: this.bookInfos
          }
        })
        this.$emit("changeMode", "index")
      } catch (error) {
        console.log(error)
      }
    },
    async getPageItem(pageNum) {
      this.currentPage = Number(pageNum)
      try {
        const response = await axios.get('/admin/book', {
          params:{
              searchWord: this.searchWord,
              page: this.currentPage
          }
        });
        this.dataBooks = response.data
      } catch (error) {
        console.log(error)
      }
    }
  },
}
</script>